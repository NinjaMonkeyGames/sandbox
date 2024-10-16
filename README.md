# README #

## What is this repository for? ##

The purpose of this repository is to serve as a template for full-stack web development projects. This project contains
various configurations for linters and settings for the VSC workspace environment. This allows for uniformity across
projects and allows for smoother development and CD/CI integration.

---

## Pipeline YAML configuration information ##

There is a 'commitlint.config.js' file containing the markdown configuration located in the .config folder of the project
directory. You can use the following YAML line to copy this into your project directory.

```shell
cp /app/.commitlint.yaml $GITHUB_WORKSPACE
```

Alternately you can use the following command to use your own configuration file.

```shell
markdownlint-cli2 '**/*.md' --config .\.commitlint.config.js
```

See links below for more information about Markdownlint-cli2 and Debian Linux.

---

## Build docker instructions ##

Build container

```shell
docker build -t commitlint .
```

Tag container

```shell
docker tag commitlint monkeyknuckles/commitlint:latest
```

Push container

```shell
docker push monkeyknuckles/commitlint:latest
```

Connect to container directly

```shell
docker run -it commitlint
```

## Useful links ##
  
- **Project links:**
  
  - **Project Docker pull address:**  docker pull monkeyknuckles/markdownlint-cli2

  - **Project Docker landing page:**  <https://hub.docker.com/r/monkeyknuckles/markdownlint-cli2>
  - **Project clone address:**        <https://github.com/NinjaMonkeyGames/markdownlint-cli2-docker.git>
  - **Project landing page:**         <https://github.com/NinjaMonkeyGames/markdownlint-cli2-docker>
  - **Project wiki page:**            <https://github.com/NinjaMonkeyGames/markdownlint-cli2-docker/wiki>

- **3rd Party links:**

  - **Node source pull address:**     docker pull node:22.9.0

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

| Folder / File Name                           | Description Of File Or Folder Contents                                |
|----------------------------------------------|-----------------------------------------------------------------------|
| .artifacts                                   | Stores data that may be needed throughout the CD/CI pipeline.         |
| .artifacts/avatar.png                        | Monkey Knuckles (Daniel Mallett) Avatar.                              |
| .artifacts/logo.png                          | Ninja Monkey Games  Avatar.                                           |
| .config                                      | Stores environment configuration files.                               |
| .config/.markdownlint.yaml                   | Contains rules for markdownlint-cli2.                                 |
| .github                                      | Stores GitHub CD/CI workflow files.                                   |
| .github/workflows                            | Stores GitHub CD/CI pipeline YAML files.                              |
| .github/workflows                            | pipeline-markdownlint-cli2.yaml.                                      |
| .vscode                                      | Stores VSC IDE settings.                                              |
| .vscode/extensions.json                      | List of plugins to install.                                           |
| .vscode/settings.json                        | Stores VSC IDE settings. (This is actually a jsonc file).             |
| markdown-fail                                | Contains a file to test each markdownlint-cli2 rule.                  |
| markdown-fail/md0001 - md0056                | Markdown rule test files. Excludes md:2, 6, 8, 14, 15, 16 and 17.     |
| markdownlint-cli2.dockerfile                 | Contains a script to build markdownlint-cli2 docker file.             |
| README.md                                    | This file contains various pieces of information about the project.   |
|                                              |                                                                       |
| **TOTAL OF 76 FILES**                        |                                                                       |

## Version history ##

**This project uses a sequential versioning system.**

| Version No:    | Description Of Update                                                                               |
|----------------|-----------------------------------------------------------------------------------------------------|
| 0.0.0.0        | Base files included. (markdownlint-cli2 setup with config file).                                    |
| 0.0.0.1        | Changed Linux distribution reference from Alpine to Debian. Modified Configuration information text.|
| 0.0.0.2        | Fixed spelling mistake 'uniformaty' to 'uniformity' in 'README.md'.                                 |

---

## Requirements ##

You must install all of the plugins in extensions.json. You must all install the following on your system:
  
- NodeJS (22.9.0)
- Microsoft Visual Studio Code (1.94.2)
- Microsoft Windows 11

---

## Contact information ##

Author: Daniel Mallett (Monkey Knuckles)

If you have any problems with the repository or have any suggestions please contact us at <info@ninjamonkeygames.com>.

You may also contact us via our [website](https://ninjamonkeygames.com).

Any bugs should be raised as an [issue](https://github.com/NinjaMonkeyGames/markdownlint-cli2/issues) on GitHub.

---

## Copyright ##

*Ninja Monkey Games Copyright © 2024 All rights reserved.*
