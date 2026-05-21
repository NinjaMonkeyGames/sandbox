# Stage 1: Build Stage
FROM dhi.io/alpine-base:3.23-alpine3.23-dev AS builder

# Switch to root to install packages
USER 0

# Install Node.js 25 and npm
# Note: nodejs-current is used for v25 on Alpine 3.23
RUN apk add --no-cache \
    nodejs-current=25.8.1-r0 \
    npm=11.11.0-r0

# Set the global prefix to ensure everything lands in /usr/local
ENV NPM_CONFIG_PREFIX=/usr/local
WORKDIR /build-fix

# Force-install the patched minimatch and the tool
RUN npm init -y && \
    npm pkg set overrides.minimatch="10.2.3" && \
    npm install -g markdownlint-cli2@0.21.0 --omit=dev

# ---

# Stage 2: Production Stage
FROM dhi.io/alpine-base:3.23

# Switch to root to configure the system
USER 0

# 1. CREATE THE NODE USER (This fixes your "no matching entries" error)
# -S creates a system user/group
RUN addgroup -S node && adduser -S node -G node

# 2. Copy the Node.js runtime and essential system libraries
COPY --from=builder /usr/bin/node /usr/bin/node
COPY --from=builder /usr/lib/libgcc_s.so* /usr/lib/
COPY --from=builder /usr/lib/libstdc++.so* /usr/lib/

# 3. Copy the global npm modules and binaries
COPY --from=builder /usr/local /usr/local

# 4. Ensure the node user owns the work directory
WORKDIR /work
RUN chown -R node:node /work

# 5. FINAL USER SWITCH
# Dropping root privileges for security
USER node

# Set the entrypoint to the markdownlint-cli2 binary
ENTRYPOINT ["node", "/usr/local/bin/markdownlint-cli2"]