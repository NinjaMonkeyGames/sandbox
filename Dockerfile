# Change from node:24-slim to node:24
FROM node:24

# The standard node image already includes libicu, 
# so you do not need to install it manually.

RUN npm install -g @gamemaker/gm-cli

ENTRYPOINT ["/usr/local/bin/gm-cli"]
CMD ["--help"]