# README

<!-- markdownlint-disable MD013 -->

[![Common Changelog](https://common-changelog.org/badge.svg)](https://common-changelog.org)
![Signed Commits](https://img.shields.io/badge/commits-signed-blue.svg)
![Conventional Commits](https://img.shields.io/badge/Conventional%20Commits-1.0.0-yellow.svg)
![Conventional Commits](https://img.shields.io/badge/commits-conventional-brightgreen.svg)
![GitHub Pre-Release](https://img.shields.io/github/v/release/ninjamonkeygames/markdownlint-cli2-ci-workflow-docker-container?include_prereleases)
![Docker Automated build](https://img.shields.io/docker/automated/monkeyknuckles/markdownlint-cli2-ci)
![GitHub commit check runs](https://img.shields.io/github/check-runs/ninjamonkeygames/markdownlint-cli2-ci-workflow-docker-container/master)

---

## TABLE OF CONTENTS

- [README](#readme)
  - [TABLE OF CONTENTS](#table-of-contents)
  - [WHAT IS THIS REPOSITORY FOR ?](#what-is-this-repository-for-)
  - [WHAT IS THE PURPOSE OF THIS PROJECT ?](#what-is-the-purpose-of-this-project-)
  - [WHO IS THIS REPOSITORY FOR ?](#who-is-this-repository-for-)
  - [QUICKSTART](#quickstart)
  - [ENVIRONMENT DEPENDENCY MANIFESTO](#environment-dependency-manifesto)
    - [OS](#os)
    - [IDE](#ide)
      - [VSC](#vsc)
        - [VSC EXTENSIONS](#vsc-extensions)
    - [CI TOOLS](#ci-tools)
    - [SUPPORTING TOOLS](#supporting-tools)
  - [CONTACT INFORMATION](#contact-information)
  - [COPYRIGHT](#copyright)

---

<!-- markdownlint-enable MD013 -->

---

## WHAT IS THIS REPOSITORY FOR ?

This repository contains a Docker source file which when compiled runs a CI workflow endpoint for markdownlint-cli2.
This allows for linting of Markdown files.

---

## WHAT IS THE PURPOSE OF THIS PROJECT ?

- Lint Markdown files.
- To maintain consistent versioning across CI workflows.
- Added workflow resilience.

---

## WHO IS THIS REPOSITORY FOR ?

Anyone who wishes to lint Markdown as part of their CI pipeline.

---

## QUICKSTART

```bash
docker pull monkeyknuckles/markdownlint-cli2-ci
```

## ENVIRONMENT DEPENDENCY MANIFESTO

### OS

| Component            | Version                     |
|----------------------|-----------------------------|
| OS                   | LMDE 7 - Cinnamon 64-bit    |
| Linux Kernel Version | 6.12.69+deb13-amd64         |

### IDE

#### VSC

Version: 1.109.3
Commit: b6a47e94e326b5c209d118cf0f994d6065585705
Date: 2026-02-12T17:54:48.470Z
Electron: 39.3.0
ElectronBuildId: 13168319
Chromium: 142.0.7444.265
Node.js: 22.21.1
V8: 14.2.231.22-electron.0
OS: Linux x64 6.12.69+deb13-amd64

##### VSC EXTENSIONS

| Extension Name                                                    | Version   |
| ----------------------------------------------------------------- | --------- |
| streetsidesoftware.code-spell-checker                             | 4.5.6     |
| streetsidesoftware.code-spell-checker-cspell-bundled-dictionaries | 2.0.14    |
| github.vscode-github-actions                                      | 0.31.0    |
| yzhang.markdown-all-in-one                                        | 3.6.3     |
| davidanson.vscode-markdownlint                                    | 0.61.1    |
| redhat.vscode-yaml                                                | 1.21.0    |
| joshbolduc.commitlint                                             | 2.6.3     |
| dbaeumer.vscode-eslinT                                            | 3.0.24    |
| fnando.linter                                                     | 0.0.19    |

### CI TOOLS

Tools versions used by CI and by extension the Dockerfile.

| Tool                                  | Version                           |
|---------------------------------------|-----------------------------------|
| npm                                   | 11.11.0                           |
| cSpell                                | 11.6.2                            |
| Markdownlint-Cli2                     | 0.21.0                            |
| Markdownlint                          | 0.40.0                            |
| Commitlint                            | 20.4.3                            |
| Commitlint config-conventional        | 20.3.0                            |
| ESLint                                | 9.35.0                            |
| eslint-plugin-jsdoc                   | 55.0.0                            |
| eslint-plugin-json-schema-validator   | 5.4.1                             |
| eslint-plugin-jsonc                   | 2.20.1                            |
| eslint-plugin-node                    | 11.1.0                            |
| typescript-eslint                     | 8.41.0                            |
| Hadolint                              | 2.14.0                            |
| Docker Scout                          | 1.20.2 (go1.25.5 - linux/amd64)   |

### SUPPORTING TOOLS

Local tool versions.

| Tool                           | Version               |
|--------------------------------|-----------------------|
| Docker                         | 29.2.1, build a5c7197 |
| Node                           | 24.11.1               |
| GitHub Desktop                 | 3.4.9-linux1 (x64)    |
| Git                            | 2.47.3                |

## CONTACT INFORMATION

Author: Daniel Mallett (Monkey Knuckles)

If you have any problems with the repository or have any suggestions please contact us at <info@ninjamonkeygames.com>.

You may also contact us via our [website](https://ninjamonkeygames.com).

Any bugs should be raised as an [issue](https://github.com/NinjaMonkeyGames/markdownlint-cli2/issues) on GitHub.

---

## COPYRIGHT

*NinjaMonkeyGames™ Copyright © 2026 All rights reserved.*
