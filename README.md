# READMEx

x

## CONTENTS

- [What is this repository for?](#what-is-this-repository-for)
- [Who is this repository for?](#who-is-this-repository-for)
- [Environment configuration information](#environment-configuration-information)
  - [IDE setup instructions](#ide-setup-instructions)
  - [Configuration files](#configuration-files)
- [Testing](#testing)
  - [Configuration file validation test](#configuration-file-validation-test)
  - [Build and test docker instructions](#build-and-test-docker-instructions)
    - [Build container](#build-container)
    - [Tag container](#tag-container)
    - [Push container](#push-container)
    - [Push container with credentials](#push-container-with-credentials)
    - [Connect to container directly](#connect-to-container-directly)
  - [Check file count](#check-file-count)
- [Useful links](#useful-links)
- [Includes](#includes)
- [System Requirements](#system-requirements)
- [Document management](#document-management)
  - [Files](#files)
  - [Version history](#version-history)
- [Contact information](#contact-information)
- [Copyright](#copyright)

## WHAT IS THIS REPOSITORY FOR?

The purpose of this repository is to provide a markdownlint-cli2 container with the purpose of linting markdown files as
part of a CD/CI implementation.

## WHO IS THIS REPOSITORY FOR?

This document and repository is for use by NinjaMonkeyGames staff and contractors.

---

## ENVIRONMENT CONFIGURATION INFORMATION

### IDE SETUP INSTRUCTIONS

**Press:**

```shell
CTRL + SHIFT + B
```

This will install any plugins needed for the project by executing the contents of tasks.json located in the .vscode
folder.

### CONFIGURATION FILES

There is a '.markdownlint.yaml' file containing the markdown configuration located in the .config folder of the project
directory. This file stores rules as to how lint markdown files.

Type 'npm install' to download markdownlint-cli2 from 'package.json'.

You should also install the markdownlint [VSC plugin](#useful-links). You should be prompted to install the plugin
automatically. If not you can download and install it manually.

Please also keep the '.vscode' folder and the .git folder in tact as these contain crucial settings for the project and
the environment.

## TESTING

### CONFIGURATION FILE VALIDATION TEST

The markdown-fail folder contains every single possible markdownlint-cli2 linting error. This serves as a reference for
testing. Note that 'md0013.md' can be used to check the configuration file is being respected. The default rule is
a maximum of 80 characters per line. The config modifies this to 120 characters.

If the configuration file is working correctly you should be able to select 'md0013.md' from the 'markdown-fail folder'
and the problems pane in the VSC terminal should display "MD013/line-length: Line length [Expected: 120; Actual: 121]".
If the configuration file is not working it will either say "MD013/line-length: Line length [Expected: 80; Actual: 121]"
or it will say nothing at all.

### CHECK FILE COUNT

You can also run the command listed below to ensure that both the configuration file is correct and that the version of
markdownlint is also correct. The results should show:

Linting: 50 file(s)  
Summary: 100 error(s)

```shell
npx markdownlint-cli2 "**/*.md" "#node_modules" --config .config/.markdownlint.yaml
```

Please remember to check the output tab also. This should be free from errors.

'markdownlint-cli2.dockerfile' contains a script with instructions on how to build the docker container. The build
instructions can be seen below.

### BUILD AND TEST DOCKER INSTRUCTIONS

These are list of commands you can execute in order to build, tag, upload/push and test the project directly from the
terminal.

#### BUILD CONTAINER

```shell
docker build -t "markdownlint-cli2" -f "Dockerfile" .
```

#### TAG CONTAINER

```shell
docker tag markdownlint-cli2 monkeyknuckles/markdownlint-cli2:latest
```

#### PUSH CONTAINER

```shell
docker push monkeyknuckles/markdownlint-cli2:latest
```

#### PUSH CONTAINER WITH CREDENTIALS

```shell
docker buildx build --sbom=true --provenance=true --tag monkeyknuckles/'markdownlint-cli2' --push .
```

#### CONNECT TO CONTAINER DIRECTLY

```shell
docker run -it markdownlint-cli2
```

## USEFUL LINKS

- **Project links:**

  - **Project Docker pull address:**  docker pull **monkeyknuckles/markdownlint-cli2**

  - **Project Docker landing page:**  <https://hub.docker.com/r/monkeyknuckles/markdownlint-cli2>
  - **Project clone address:**        <https://github.com/NinjaMonkeyGames/markdownlint-cli2.git>
  - **Project landing page:**         <https://github.com/NinjaMonkeyGames/markdownlint-cli2>
  - **Project wiki page:**            [coming soon...]

- **3rd Party links:**

  - **Node source pull address:**     docker pull node:22.9.0

  - **Markdownlint-cli2:**            <https://github.com/DavidAnson/markdownlint-cli2.git>
  - **Markdownlint:**                 <https://github.com/DavidAnson/markdownlint>
  - **NPM:**                          <https://www.npmjs.com/package/markdownlint-cli2>
  - **VSC plugin:**                   <https://github.com/DavidAnson/vscode-markdownlint>
  - **CommonMark standard**           <https://commonmark.org/>

---

## INCLUDES

- Alpine Linux        Alpine Linux v3.20.3
- NodeJS              v22.12.0
- NPM                 v10.9.1
- Markdownlint-cli2   v0.17.2
- Markdownlint        v0.37.4

---

## SYSTEM REQUIREMENTS

You must install all of the plugins in extensions.json. You must all install the following on your system:

- NodeJS (23.3.0)
- Microsoft Visual Studio Code (1.94.2)
- Dockerhub Desktop (4.34.3 (170107))
- Microsoft Windows 11

---

## DOCUMENT MANAGEMENT

Update this section every single time a file has either moved, renamed, deleted, created or modified.

### FILES

| Folder / File Name                           | Description Of File Or Folder Contents                                |
|----------------------------------------------|-----------------------------------------------------------------------|
| .artefact                                    | Stores data that may be needed throughout the CD/CI pipeline.         |
| .artefact/monkey-knuckles-avatar.png         | Monkey Knuckles (Daniel Mallett) Avatar.                              |
| .artefact/logo.png                           | Ninja Monkey Games  Avatar.                                           |
| .config                                      | Stores environment configuration files.                               |
| ~~.config/.markdownlint.yaml~~               | ~~Contains rules for markdownlint-cli2.~~                             |
| .github                                      | Stores GitHub CD/CI workflow files.                                   |
| ISSUE_TEMPLATE                               | Templates used on GitHub for reporting issues.                        |
| ISSUE_TEMPLATE/bug-report-template.yaml      | Bug report issue template.                                            |
| ISSUE_TEMPLATE/feature-report-template.yaml  | Feature request issue template.                                       |
| .github/workflows                            | Stores GitHub CD/CI pipeline YAML files.                              |
| .github/workflows/build-docker.yaml          | Build and push Docker image with SBOM and Provenance.                 |
| .github/workflows/lint-markdownlint.yaml     | pipeline-markdownlint-cli2.yaml.                                      |
| CODE_OF_CONDUCT.md                           | Contains community guidelines for contributing.                       |
| .vscode                                      | Stores VSC IDE settings.                                              |
| .vscode/extensions.json                      | List of plugins to install.                                           |
| .vscode/keybindings.json                     | Stores a list of key bindings for common IDE actions.                 |
| .vscode/settings.json                        | Stores VSC IDE settings. (This is actually a jsonc file).             |
| .vscode/tasks.json                           | This file will setup node_modules folder with required npm packages.  |
| markdown-fail                                | Contains a file to test each markdownlint-cli2 rule.                  |
| .gitignore                                   | List of files, folders and patterns to ignore.                        |
| CONTRIBUTING.md                              | Information for developers regarding the proper use of the repository.|
| DEVELOPER.md                                 | Detailed developers manual describing the entire project.             |
| markdown-fail/md0001 - md0056                | Markdown rule test files. Excludes md:2, 6, 8, 14, 15, 16 and 17.     |
| Dockerfile                                   | Contains a script to build markdownlint-cli2 docker file.             |
| package.json                                 | List of NPM packages to be installed as part of the project.          |
| README.md                                    | This file contains various pieces of information about the project.   |
| ~~sbom.json~~                                | ~~Software bill of materials.~~                                       |

### VERSION HISTORY

This project uses a sequential versioning system. Please update this with every single commit.

| Version No:    | Description Of Update                                                                               |
|----------------|-----------------------------------------------------------------------------------------------------|
| 0.0.0.0        | Base files included. (markdownlint-cli2 setup with config file).                                    |

## CONTACT INFORMATION

Author: Daniel Mallett (Monkey Knuckles)

If you have any problems with the repository or have any suggestions please contact us at <info@ninjamonkeygames.com>.

You may also contact us via our [website](https://ninjamonkeygames.com).

Any bugs should be raised as an [issue](https://github.com/NinjaMonkeyGames/markdownlint-cli2/issues) on GitHub.

---

## COPYRIGHT

*Ninja Monkey Games Copyright © 2024 All rights reserved.*
