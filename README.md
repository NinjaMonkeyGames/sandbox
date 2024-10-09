# README #

## What is this repository for? ##

The purpose of this repository is to maintain control over versions of markdownlint-cli2. This maintains uniformity-
when enforcing coding standards and formatting rules. This allows for easier upgrades and prevents newer versions from
breaking the pipeline.

---

## Configuration information ##

There is a '.markdownlint-cli2.yaml' file containing the markdown configuration in the root of the project directory.
You can use the following YAML line to copy this into your project directory.

```shell
cp /app/.markdownlint-cli2.yaml $GITHUB_WORKSPACE
```

Alternately you can use the following command to use your own configuration file.

```shell
markdownlint-cli2 '**/*.md' --config .\.markdownlint-cli2.yaml
```

See links below for more information about Markdownlint-cli2 and Alpine Linux.

---

## Build docker instructions ##

  - docker build -t markdownlint-cli2 .
  - docker tag markdownlint-cli2 monkeyknuckles/markdownlint-cli2:latest
  - docker push monkeyknuckles/markdownlint-cli2:latest

  To check the container is working execute: docker run -it markdownlint-cli2

## Useful links ##
  
  - **Project links:**
  
    - **Project Docker pull address:**  docker pull monkeyknuckles/markdownlint-cli2

    - **Project Docker landing page:**  <https://hub.docker.com/r/monkeyknuckles/markdownlint-cli2>
    - **Project clone address:**        <https://github.com/NinjaMonkeyGames/markdownlint-cli2-docker.git>
    - **Project landing page:**         <https://github.com/NinjaMonkeyGames/markdownlint-cli2-docker>
    - **Project wiki page:**            <https://github.com/NinjaMonkeyGames/markdownlint-cli2-docker/wiki>

  - **3rd Party links:**

    - **Alpine source pull address:**   docker pull alpine:3.20.0

    - **Alpine source landing page:**   <https://hub.docker.com/_/alpine>
    - **Markdownlint-cli2:**            <https://github.com/DavidAnson/markdownlint-cli2.git>
    - **Markdownlint:**                 <https://github.com/DavidAnson/markdownlint>
    - **NPM:**                          <https://www.npmjs.com/package/markdownlint-cli2>
    - **VSC Plugin:**                   <https://github.com/DavidAnson/vscode-markdownlint>

---

## Includes ##

  - Debian Linux        v12.4+deb12u7
  - Node                v22.9.0
  - NPM                 v10.8.3
  - Markdownlint-cli2   v0.14.0
  - Markdownlint        v0.35.0

---

## Files ##

| File Or Folder Name:                  | Files | Description Of File Or Folder Contents                               |
|---------------------------------------|-------|----------------------------------------------------------------------|

---

## Version history ##

This project uses a sequential versioning system.

| Version No:    | Description Of Update                                                                               |
|----------------|-----------------------------------------------------------------------------------------------------|
| 0.0.0.0        | Base files included.                                                                                |

---

## Contact information ##

Author: Daniel Mallett (Monkey Knuckles)

![Ninja Monkey Games](logo.png "Logo")
![Monkey Knuckles](avatar.png "Avatar")

If you have any problems with the repository or have any suggestions please contact us at <info@ninjamonkeygames.com>.

You may also contact us via our [website](https://ninjamonkeygames.com).

Any bugs should be raised as an [issue](https://github.com/NinjaMonkeyGames/markdownlint-cli2-docker/issues) on GitHub.

---

## Copyright ##

*Ninja Monkey Games Copyright © 2024 All rights reserved.*
