FROM node:24-slim

RUN npm install -g @gamemaker/gm-cli

# Update to match the actual filename: gm-cli
ENTRYPOINT ["/usr/local/bin/gm-cli"]

CMD ["--help"]