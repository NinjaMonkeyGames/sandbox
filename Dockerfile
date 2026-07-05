FROM node:latest

WORKDIR /app
ENV PATH="/usr/local/bin:${PATH}"

RUN apt-get update && apt-get install -y --no-install-recommends \
  ca-certificates git bash \
  && rm -rf /var/lib/apt/lists/*

RUN npm i -g @gamemaker/gm-cli@latest \
 && command -v gm-cli \
 && gm-cli --help >/dev/null

COPY . .

CMD ["bash", "-lc", "gm-cli --help"]
