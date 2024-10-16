# Use the official Node.js image
FROM node:22.9.0

# Set the working directory to app
WORKDIR /app

# INCLUDE .commitlintrc.js IN DOCKER BUILD
COPY .config/commitlint.config.js ./commitlint.config.js

# Install commitlint and husky globally
RUN npm install -g @commitlint/config-conventional @commitlint/cli husky

# Command to run commitlint (adjust as needed)
CMD ["bash"]
