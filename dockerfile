# Use the official Node.js image

FROM node:22.9.0

# Set the working directory to app

WORKDIR /app

# INCLUDE .markdownlint.yml IN DOCKER BUILD

COPY .config/.markdownlint-cli2.yaml ./.markdownlint-cli2.yaml

# Install markdownlint-cli2 globally

RUN npm install -g markdownlint-cli2@0.14.0

# Command to run markdownlint-cli2 (adjust as needed)

CMD ["bash"]
