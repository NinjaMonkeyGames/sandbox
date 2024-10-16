# Use the official Node.js image
FROM node:22.9.0

# Set the working directory to app
WORKDIR /app

# Include commitlint configuration file
COPY .config/commitlint.config.js ./.commitlint.config.js

# Install commitlint and husky globally
RUN npm i @commitlint/cli -g

# Command to run commitlint (adjust as needed)
CMD ["bash"]
