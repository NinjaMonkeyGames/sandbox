# README #

## What is this repository for? ##

The purpose of this repository is to serve as a template for full-stack web development projects. This project contains
various configurations for linters and settings for the VSC workspace environment. This allows for uniformity across
projects and allows for smoother development and CD/CI integration.

---

## Useful links ##
  
  - **Project links:**
  
    - **Project Docker pull address:**  docker pull monkeyknuckles/markdownlint-cli2

    - **Project clone address:**        <https://github.com/NinjaMonkeyGames/full-stack-template.git>
    - **Project landing page:**         <https://github.com/NinjaMonkeyGames/full-stack-template>
    - **Project wiki page:**            <https://github.com/NinjaMonkeyGames/full-stack-template/wiki>

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
| .gitignore                                   | List of files and folders that should be excluded the repository.     |
| package-lock.json                            | Locks node package versions.                                          |
| package.json                                 | List of packages to be included. (Run npm install).                   |
| README.md                                    | This file contains various pieces of information about the project.   |
|                                              |                                                                       |
| **TOTAL OF 75 FILES**                        |                                                                       |

## Commit and workflow information ##

### Golden rules ###

  - Commit subject line must be no longer than 72 characters
  - There should be a changelog entry for every single version
  - The latest version comes first
  - All commits must be prefixed with a type feat, fix, etc.

### Commit instructions ###

  - one

## Version history ##

This project uses a sequential versioning system.

| Version No:    | Description Of Update                                                                               |
|----------------|-----------------------------------------------------------------------------------------------------|
| 0.0.0.0        | Base files included. (markdownlint-cli2 setup with config file).                                    |

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

Any bugs should be raised as an [issue](https://github.com/NinjaMonkeyGames/full-stack-template/issues) on GitHub.

---

## Copyright ##

*Ninja Monkey Games Copyright © 2024 All rights reserved.*
