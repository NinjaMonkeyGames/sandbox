# Use the official Node.js image

FROM node:22.9.0

# Set the working directory to app

WORKDIR /app

# INCLUDE .markdownlint.yml IN DOCKER BUILD

COPY .config/commitlint.config.js ./commitlint.config.js

# Install markdownlint-cli2 globally

RUN npm install -g commitlint@19.5.0

# Command to run markdownlint-cli2 (adjust as needed)

CMD ["bash"]