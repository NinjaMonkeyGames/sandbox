# Use Node.js version 22.9.0
FROM node:22.9.0

# Set the working directory
WORKDIR /app

# Copy the CommitLint configuration file into the working directory
COPY .config/commitlint.config.js ./

# Install CommitLint globally
RUN npm install -g @commitlint/{config-conventional,cli} --save-dev

# Default command to run CommitLint
CMD ["commitlint", "--from=HEAD~1", "--to=HEAD"]
