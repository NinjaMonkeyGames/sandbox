# Use official Node.js 22.9.0 image as the base image
FROM node:22.9.0

# Set the working directory inside the container
WORKDIR /app

# Copy the commitlint configuration file to the working directory
COPY .config/commitlint.config.js /app/

# Install commitlint version 19.5.0 globally
RUN npm install -g @commitlint/cli@19.5.0

# Default command (if needed) - This can be customized if you want the container to execute specific commands
CMD ["tail", "-f", "/dev/null"]
