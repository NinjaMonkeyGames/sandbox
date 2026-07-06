FROM dhi.io/node:26-dev AS tools
WORKDIR /app
RUN ["npm","i","-g","@gamemaker/gm-cli@latest"]