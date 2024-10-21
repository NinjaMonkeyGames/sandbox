# README #

## Contents ##

  - [What is this repository for?](#what-is-this-repository-for)
  - [Environment configuration information](#environment-configuration-information)
    - [IDE setup instructions](#ide-setup-instructions)
    - [Configuration files](#configuration-files)
  - [Testing](#testing)
    - [Build and test docker instructions](#build-and-test-docker-instructions)
  - [Useful links](#useful-links)
  - [Includes](#includes)
  - [System Requirements](#system-requirements)
  - [Document management](#document-management)
    - [Files](#files)
    - [Version history](#version-history)
  - [Contact information](#contact-information)
  - [Copyright](#copyright)

## What is this repository for? ##

The purpose of this repository is to provide a markdownlint-cli2 container with the purpose of linting markdown files as
part of a CD/CI implementation.

---

## Environment configuration information ##

### IDE setup instructions ###

Press:

```shell
CTRL + SHIFT + B
```

This will install any plugins needed for the project by executing the contents of tasks.json located in the .vscode
folder.

### Configuration files ###

There is a '.markdownlint.yaml' file containing the markdown configuration located in the .config folder of the project
directory. This file stores rules as to how lint markdown files.

Type 'npm install' to download markdownlint-cli2 from 'package.json'.

You should also install the markdownlint [VSC plugin](#useful-links). You should be prompted to install the plugin
automatically. If not you can download and install it manually.

Please also keep the '.vscode' folder and the .git folder in tact as these contain crucial settings for the project and
the environment.

## Testing ##

The markdown-fail folder contains every single possible markdownlint-cli2 linting error. This serves as a reference for
testing. Note that 'md0013.md' can be used to check the configuration file is being respected. The default rule is
a maximum of 80 characters per line. The config modifies this to 120 characters.

If the configuration file is working correctly you should be able to select 'md0013.md' from the 'markdown-fail folder'
and the problems pane in the VSC terminal should display "MD013/line-length: Line length [Expected: 120; Actual: 121]".
If the configuration file is not working it will either say "MD013/line-length: Line length [Expected: 80; Actual: 121]"
or it will say nothing at all.

You can also run the following line to ensure that both the configuration file is correct and that the version of
markdownlint is also correct. The results should show:

Linting: 50 file(s)  
Summary: 100 error(s)

```shell
npx markdownlint-cli2 "**/*.md" "#node_modules" --config .config/.markdownlint.yaml
```

Please remember to check the output tab also. This should be free from errors.

'markdownlint-cli2.dockerfile' contains a script with instructions on how to build the docker container. The build
instructions can be seen below.

## Build and test docker instructions ##

These are list of commands you can execute in order to build, tag, upload/push and test the project directly from the
terminal.

Build container

```shelldocker build -t "package_name" -f "name of docker file" .
```

Tag container

```shell
docker tag markdownlint-cli2 monkeyknuckles/markdownlint-cli2:latest
```

Push container

```shell
docker push monkeyknuckles/markdownlint-cli2:latest
```

Connect to container directly

```shell
docker run -it markdownlint-cli2
```

## Useful links ##
  
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
    - **Commonmark standard**           <https://commonmark.org/>

---

## Includes ##

  - Alpine Linux        Alpine Linux v3.20.3
  - NPM                 v10.8.3
  - Markdownlint-cli2   v0.14.0
  - Markdownlint        v0.35.0

---

## System Requirements ##

You must install all of the plugins in extensions.json. You must all install the following on your system:
  
  - NodeJS (22.9.0)
  - Microsoft Visual Studio Code (1.94.2)
  - Dockerhub Desktop (4.34.3 (170107))
  - Microsoft Windows 11

---

## Document management ##

Update this section every single time a file has either moved, renamed, deleted or created.

### Files ###

| Folder / File Name                           | Description Of File Or Folder Contents                                |
|----------------------------------------------|-----------------------------------------------------------------------|
| .artifacts                                   | Stores data that may be needed throughout the CD/CI pipeline.         |
| .artifacts/avatar.png                        | Monkey Knuckles (Daniel Mallett) Avatar.                              |
| .artifacts/logo.png                          | Ninja Monkey Games  Avatar.                                           |
| .config                                      | Stores environment configuration files.                               |
| .config/.markdownlint.yaml                   | Contains rules for markdownlint-cli2.                                 |
| .config/build-docker.yaml                    | Build and push Docker image with SBOM and Provenance.                 |
| .github                                      | Stores GitHub CD/CI workflow files.                                   |
| .github/workflows                            | Stores GitHub CD/CI pipeline YAML files.                              |
| .github/workflows                            | pipeline-markdownlint-cli2.yaml.                                      |
| .vscode                                      | Stores VSC IDE settings.                                              |
| .vscode/extensions.json                      | List of plugins to install.                                           |
| .vscode/settings.json                        | Stores VSC IDE settings. (This is actually a jsonc file).             |
| .vscode/tasks.json                           | his file will setup the workspace with required plugins and packages. |
| markdown-fail                                | Contains a file to test each markdownlint-cli2 rule.                  |
| .gitignore                                   | List of files, folders and patterns to ignore.                        |
| markdown-fail/md0001 - md0056                | Markdown rule test files. Excludes md:2, 6, 8, 14, 15, 16 and 17.     |
| Dockerfile                                   | Contains a script to build markdownlint-cli2 docker file.             |
| package-lock.json                            | Locks package versions.                                               |
| package.json                                 | List of NPM packages to be installed as part of the project.          |
| README.md                                    | This file contains various pieces of information about the project.   |
| ~~sbom.json~~                                | ~~Software bill of materials.~~                                       |

### Version history ###

This project uses a sequential versioning system. Please update this with every single commit.

| Version No:    | Description Of Update                                                                               |
|----------------|-----------------------------------------------------------------------------------------------------|
| 0.0.0.0        | Base files included. (markdownlint-cli2 setup with config file).                                    |
| 0.0.0.1        | Changed Linux distribution reference from Alpine to Debian. Modified Configuration information text.|
| 0.0.0.2        | Fixed spelling mistake 'uniformaty' to 'uniformity' in 'README.md'.                                 |
| 0.0.0.3        | Added markdownlint-cli2 to packages.json. Added .gitignore file.                                    |
| 0.0.0.4        | Modified project purpose text at the top of 'README.md'.                                            |
| 0.0.0.5        | Removed file count from files table in 'README.md'.                                                 |
| 0.0.0.6        | Updated README documentation.                                                                       |
| 0.0.0.7        | More 'README.md' documentation update.                                                              |
| 0.0.0.8        | Renamed 'markdownlint-cli2' to 'Dockerfile' because the Dockerhub CI requires it.                   |
| 0.0.0.9        | Docker latest tag test.                                                                             |
| 0.0.1.0        | Added sbom.json which contains the software bill of materials.                                      |
| 0.0.1.1        | Updated documentation and changed docker O/S from Debian to Alpine for security reasons.            |
| 0.0.1.2        | Removed 'SBOM.json'. Modified Dockerfile to remove bash.                                            |
| 0.0.1.3        | Now logs in as a non-root user in order to satisfy Dockerhub security policy.                       |
| 0.0.1.4        | Testing provenance.                                                                                 |
| 0.0.1.5        | Added 'build-docker.yaml'. Build and push Docker image with SBOM and Provenance.                    |
| 0.0.1.6        | Moved 'build-docker.yaml' to it's proper location '.config/'. Was not moved in last commit.         |
| 0.0.1.7        | Added concurrency to all YAML files so they are run independently.                                  |

## Contact information ##

Author: Daniel Mallett (Monkey Knuckles)

If you have any problems with the repository or have any suggestions please contact us at <info@ninjamonkeygames.com>.

You may also contact us via our [website](https://ninjamonkeygames.com).

Any bugs should be raised as an [issue](https://github.com/NinjaMonkeyGames/markdownlint-cli2/issues) on GitHub.

---

## Copyright ##

*Ninja Monkey Games Copyright © 2024 All rights reserved.*
