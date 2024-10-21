# Use the official Node.js Alpine image

FROM node:23-alpine3.19

# Set the working directory to /app

WORKDIR /app

# Create a non-root user and group

RUN addgroup -S appgroup && adduser -S appuser -G appgroup

# Include .markdownlint.yml in Docker build

COPY .config/.markdownlint.yaml ./.markdownlint.yaml

# Install dash and markdownlint-cli2 globally

RUN apk add --no-cache dash && npm install -g markdownlint-cli2@0.14.0

# Remove bash binary if present

RUN rm -f /bin/bash

# Install Syft for SBOM generation

RUN wget -qO- https://raw.githubusercontent.com/anchore/syft/main/install.sh | sh -s -- -b /usr/local/bin

# Generate the SBOM and output it to /app/sbom.json

RUN syft . -o json > /app/sbom.json

# Switch to the non-root user

USER appuser

# Command to run markdownlint-cli2

CMD ["markdownlint-cli2"]