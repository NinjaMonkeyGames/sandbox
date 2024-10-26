# Use the latest Alpine image with Node.js 20

FROM node:20-alpine

# Set up the working directory for your app

WORKDIR /app

# Install markdownlint-cli2 globally

RUN npm install -g markdownlint-cli2

# Create a non-root user and group

RUN addgroup -S appgroup && adduser -S appuser -G appgroup

# Switch to the non-root user (appuser)

USER appuser

# Start a shell when the container is run

CMD ["/bin/sh"]
