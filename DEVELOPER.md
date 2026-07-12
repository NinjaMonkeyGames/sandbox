# 2D Grid Utility

This document is a reference guide for programmers. It provides a comprehensive list of all assets contained within the
project.

This includes detailed API descriptions and the structure of project assets.

This reference manual focuses on the project structure and logic.

This document does not cover documentation style guidelines or contribution policies. See, **`CONTRIBUTING.md`**.

ℹ Please review **`CONTRIBUTING.md`** carefully, as it contains important information on how to contribute to this
repository and how to update the documentation correctly.

<!-- markdownlint-disable MD013 -->

[![Common Changelog](https://common-changelog.org/badge.svg)](https://common-changelog.org)
![Signed Commits](https://img.shields.io/badge/commits-signed-blue.svg)
![Conventional Commits](https://img.shields.io/badge/Conventional%20Commits-1.0.0-yellow.svg)
![Conventional Commits](https://img.shields.io/badge/commits-conventional-brightgreen.svg)
![GitHub Pre-Release](https://img.shields.io/github/v/release/ninjamonkeygames/palette-controller?include_prereleases)

---

## Table of Contents

- [2D Grid Utility](#2d-grid-utility)
  - [Table of Contents](#table-of-contents)
  - [Target Audience](#target-audience)
  - [Project Purpose](#project-purpose)
  - [Project Assets](#project-assets)
    - [CONFIGURATION FILES \[.CONFIG\] 📁](#configuration-files-config-)
      - [Attribute Table — \[.config\]](#attribute-table--config)
      - [Asset Purpose — \[.config\]](#asset-purpose--config)
      - [Asset Contents Description — \[.config\]](#asset-contents-description--config)
    - [MARKDOWNLINT CONFIGURATION FILE \[.HADOLINT.YAML\] 📄](#markdownlint-configuration-file-hadolintyaml-)
      - [Attribute Table — \[.hadolint.yaml\]](#attribute-table--hadolintyaml)
      - [Asset Purpose — \[.hadolint.yaml\]](#asset-purpose--hadolintyaml)
      - [Asset Contents Description — \[.hadolint\]](#asset-contents-description--hadolint)
    - [MARKDOWNLINT CONFIGURATION FILE \[.MARKDOWNLINT-CLI2.JSONC\] 📄](#markdownlint-configuration-file-markdownlint-cli2jsonc-)
      - [Attribute Table — \[.markdownlint-cli2.jsonc\]](#attribute-table--markdownlint-cli2jsonc)
      - [Asset Purpose — \[.markdownlint-cli2.jsonc\]](#asset-purpose--markdownlint-cli2jsonc)
      - [Asset Contents Description — \[.markdownlint-cli2.jsonc\]](#asset-contents-description--markdownlint-cli2jsonc)
    - [MARKDOWNLINT CONFIGURATION FILE \[COMMITLINT-CLI2.JSONC\] 📄](#markdownlint-configuration-file-commitlint-cli2jsonc-)
      - [Attribute Table — \[commitlint.jsonc\]](#attribute-table--commitlintjsonc)
      - [Asset Purpose — \[commitlint.jsonc\]](#asset-purpose--commitlintjsonc)
      - [Asset Contents Description — \[commitlint.jsonc\]](#asset-contents-description--commitlintjsonc)
    - [CSPELL CONFIGURATION FILE \[CSPELL.JSON\] 📄](#cspell-configuration-file-cspelljson-)
      - [Attribute Table — \[cspell.json\]](#attribute-table--cspelljson)
      - [Asset Purpose — \[cspell.json\]](#asset-purpose--cspelljson)
      - [Asset Contents Description — \[cspell.json\]](#asset-contents-description--cspelljson)
    - [CHECK COMMIT SIGNATURE \[SIGNED-OFF-BY-REGEX.JS\] 📄](#check-commit-signature-signed-off-by-regexjs-)
      - [Attribute Table — \[signed-off-by-regex.js\]](#attribute-table--signed-off-by-regexjs)
      - [Asset Purpose — \[signed-off-by-regex.js\]](#asset-purpose--signed-off-by-regexjs)
      - [Asset Contents Description — \[signed-off-by-regex.js\]](#asset-contents-description--signed-off-by-regexjs)
    - [GIT CONFIGURATION FILES \[.GIT\] 📁](#git-configuration-files-git-)
      - [Attribute Table — \[.git\]](#attribute-table--git)
      - [Asset Purpose — \[.git\]](#asset-purpose--git)
      - [Asset Contents Description — \[.git\]](#asset-contents-description--git)
    - [GIT CONFIGURATION FILES \[.GITHUB\] 📁](#git-configuration-files-github-)
      - [Attribute Table — \[.gitHUB\]](#attribute-table--github)
      - [Asset Purpose — \[.github\]](#asset-purpose--github)
      - [Asset Contents Description — \[.github\]](#asset-contents-description--github)
    - [GIT CONFIGURATION FILES \[ISSUE\_TEMPLATE\] 📁](#git-configuration-files-issue_template-)
      - [Attribute Table — \[ISSUE\_TEMPLATE\]](#attribute-table--issue_template)
      - [Asset Purpose — \[ISSUE\_TEMPLATE\]](#asset-purpose--issue_template)
      - [Asset Contents Description — \[ISSUE\_TEMPLATE\]](#asset-contents-description--issue_template)
    - [BUG REPORT GITHUB ISSUE YAML TEMPLATE \[BUG-REPORT-TEMPLATE.YAML\] 📄](#bug-report-github-issue-yaml-template-bug-report-templateyaml-)
      - [Attribute Table — \[bug-report-template.yaml\]](#attribute-table--bug-report-templateyaml)
      - [Asset Purpose — \[bug-report-template.yaml\]](#asset-purpose--bug-report-templateyaml)
      - [Asset Contents Description — \[bug-report-template.yaml\]](#asset-contents-description--bug-report-templateyaml)
    - [GITHUB ISSUE YAML TEMPLATE CONFIG \[CONFIG.YAML\] 📄](#github-issue-yaml-template-config-configyaml-)
      - [Attribute Table — \[config.yaml\]](#attribute-table--configyaml)
      - [Asset Purpose — \[config.yaml\]](#asset-purpose--configyaml)
      - [Asset Contents Description — \[config.yaml\]](#asset-contents-description--configyaml)
    - [FEATURE REQUEST GITHUB ISSUE YAML TEMPLATE \[FEATURE-REQUEST-TEMPLATE.YAML\] 📄](#feature-request-github-issue-yaml-template-feature-request-templateyaml-)
      - [Attribute Table — \[feature-request-template.yaml\]](#attribute-table--feature-request-templateyaml)
      - [Asset Purpose — \[feature-request-template.yaml\]](#asset-purpose--feature-request-templateyaml)
      - [Asset Contents Description — \[feature-request-template.yaml\]](#asset-contents-description--feature-request-templateyaml)
    - [TASK REQUEST GITHUB ISSUE YAML TEMPLATE \[TASK-REQUEST-TEMPLATE.YAML\] 📄](#task-request-github-issue-yaml-template-task-request-templateyaml-)
      - [Attribute Table — \[task-request-template.yaml\]](#attribute-table--task-request-templateyaml)
      - [Asset Purpose — \[task-request-template.yaml\]](#asset-purpose--task-request-templateyaml)
      - [Asset Contents Description — \[task-request-template.yaml\]](#asset-contents-description--task-request-templateyaml)
    - [Visual Studio Code Settings \[.VSCODE\] 📁](#visual-studio-code-settings-vscode-)
      - [Attribute Table — \[.vscode\]](#attribute-table--vscode)
      - [Asset Purpose — \[.vscode\]](#asset-purpose--vscode)
      - [Asset Contents Description — \[.vscode\]](#asset-contents-description--vscode)
    - [VSC EXTENSIONS \[EXTENSIONS\] 📄](#vsc-extensions-extensions-)
      - [Attribute Table — \[extensions.json\]](#attribute-table--extensionsjson)
      - [Asset Purpose — \[extensions.json\]](#asset-purpose--extensionsjson)
      - [Asset Contents Description — \[extension.json\]](#asset-contents-description--extensionjson)
    - [VSC SETTINGS \[SETTINGS.JSON\] 📄](#vsc-settings-settingsjson-)
      - [Attribute Table — \[settings.json\]](#attribute-table--settingsjson)
      - [Asset Purpose — \[settings.json\]](#asset-purpose--settingsjson)
      - [Asset Contents Description — \[settings.json\]](#asset-contents-description--settingsjson)
    - [GIT IGNORE \[.GITIGNORE\] 📄](#git-ignore-gitignore-)
      - [Attribute Table - \[.gitignore\]](#attribute-table---gitignore)
      - [Asset Purpose - \[.gitignore\]](#asset-purpose---gitignore)
      - [Asset Contents Description - \[.gitignore\]](#asset-contents-description---gitignore)
    - [CONTRIBUTING DOCUMENT \[CONTRIBUTING\] 📄](#contributing-document-contributing-)
      - [Attribute Table — \[CONTRIBUTING.md\]](#attribute-table--contributingmd)
      - [Asset Purpose — \[CONTRIBUTING.md\]](#asset-purpose--contributingmd)
      - [Asset Contents Description — \[CONTRIBUTING.md\]](#asset-contents-description--contributingmd)
    - [DEVELOPER DOCUMENT \[DEVELOPER.MD\] 📄](#developer-document-developermd-)
      - [Attribute Table — \[DEVELOPER.md\]](#attribute-table--developermd)
      - [Asset Purpose — \[DEVELOPER.md\]](#asset-purpose--developermd)
      - [Asset Contents Description — \[DEVELOPER.md\]](#asset-contents-description--developermd)
    - [LICENSE \[LICENSE\] 📄](#license-license-)
      - [Attribute Table — \[LICENSE\]](#attribute-table--license)
      - [Asset Purpose — \[LICENSE\]](#asset-purpose--license)
      - [Asset Contents Description — \[LICENSE\]](#asset-contents-description--license)
    - [README DOCUMENT \[README.MD\] 📄](#readme-document-readmemd-)
      - [Attribute Table — \[README.md\]](#attribute-table--readmemd)
      - [Asset Purpose — \[README\]](#asset-purpose--readme)
      - [Asset Contents Description — \[README\]](#asset-contents-description--readme)
  - [CODE STRUCTURE](#code-structure)
  - [CONTACT INFORMATION](#contact-information)
  - [COPYRIGHT](#copyright)

---

<!-- markdownlint-enable MD013 -->

## Target Audience

This repository contains a GameMaker Studio 2 project that generates a palette of interactive buttons that can be used
for many different projects.

---

## Project Purpose

This project is a part of a larger set of tools designed to speed up building GameMaker projects. It prevents the need
to re-invent the wheel for each project.

## Project Assets

This section of the document lists every asset in the project. Each asset contains the following:

- Attributes table
- Purpose
- Description

---

### CONFIGURATION FILES [.CONFIG] 📁

#### Attribute Table — [.config]

| Attribute             | Value   |
| --------------------- | ------- |
| Asset Name            | .config |
| Relative Path         | .config |
| Asset Type            | FOLDER  |
| CI Type               | chore   |
| CI Scope              | config  |

#### Asset Purpose — [.config]

Contain all CI configuration in one place.

#### Asset Contents Description — [.config]

Configuration files related to workflow tools such as linters.

- cSpell config.
- Markdownlint config.

---

[Back to top](#Palette Controller Object)

---

### MARKDOWNLINT CONFIGURATION FILE [.HADOLINT.YAML] 📄

#### Attribute Table — [.hadolint.yaml]

| Attribute               | Value                             |
|-------------------------|-----------------------------------|
| Asset Name              | .hadolint.yaml                    |
| Relative Path           | .config/.hadolint.yaml            |
| Asset Type              | YAML                              |
| CI Type                 | chore                             |
| CI Scope                | config                            |

#### Asset Purpose — [.hadolint.yaml]

To ensure quality and consistency within Dockerfiles.

#### Asset Contents Description — [.hadolint]

A configuration file containing instructions for linting Docker files.

ℹ️ **The file contains no settings but is there as a placeholder. The default is all rules are active**

---

[Back to top](#Palette Controller Object)

---

### MARKDOWNLINT CONFIGURATION FILE [.MARKDOWNLINT-CLI2.JSONC] 📄

#### Attribute Table — [.markdownlint-cli2.jsonc]

| Attribute               | Value                             |
|-------------------------|-----------------------------------|
| Asset Name              | .markdownlint-cli2.jsonc          |
| Relative Path           | .config/.markdownlint-cli2.jsonc  |
| Asset Type              | JSONC                             |
| CI Type                 | chore                             |
| CI Scope                | config                            |

#### Asset Purpose — [.markdownlint-cli2.jsonc]

Defines project-specific linting rules, formatting preferences, and exclusions for Markdown files ensuring consistency
and maintainability across documentation.

#### Asset Contents Description — [.markdownlint-cli2.jsonc]

Contains JSONC configuration for markdownlint-cli2, including enabled/disabled rules, rule options, custom rules, and
an ignore list for excluded files or directories. This file enforces uniform Markdown styling across the repository
during development and CI processes.

**See.** [Markdownlint rules](https://github.com/DavidAnson/markdownlint)

---

[Back to top](#Palette Controller Object)

---

### MARKDOWNLINT CONFIGURATION FILE [COMMITLINT-CLI2.JSONC] 📄

#### Attribute Table — [commitlint.jsonc]

| Attribute               | Value                             |
|-------------------------|-----------------------------------|
| Asset Name              | commitlint.jsonc                  |
| Relative Path           | .config/commitlint.jsonc          |
| Asset Type              | JSONC                             |
| CI Type                 | chore                             |
| CI Scope                | config                            |

#### Asset Purpose — [commitlint.jsonc]

Keep commit messages compliant with the conventional commit standard.

#### Asset Contents Description — [commitlint.jsonc]

Lints commit messages against the conventional commits standard.

**See.** [Markdownlint rules](https://github.com/DavidAnson/markdownlint)

---

[Back to top](#Palette Controller Object)

---

### CSPELL CONFIGURATION FILE [CSPELL.JSON] 📄

#### Attribute Table — [cspell.json]

| Attribute             | Value                       |
| --------------------- | --------------------------- |
| Asset Name            | cspell.json                 |
| Relative Path         | cspell.json                 |
| Asset Type            | JSON                        |
| CI Type               | chore                       |
| CI Scope              | config                      |

#### Asset Purpose — [cspell.json]

Ensure spell checking is consistent across environments.

#### Asset Contents Description — [cspell.json]

- Sets language to English-British.
- Array of spelling exceptions.
- List of excluded files and directories.

---

[Back to top](#Palette Controller Object)

---

### CHECK COMMIT SIGNATURE [SIGNED-OFF-BY-REGEX.JS] 📄

#### Attribute Table — [signed-off-by-regex.js]

| Attribute               | Value                           |
| ----------------------- | ------------------------------- |
| Asset Name              | signed-off-by-regex.js          |
| Relative Path           | .config/signed-off-by-regex.js  |
| Asset Type              | JavaScript                      |
| CI Type                 | ci                              |
| CI Scope                | config                          |

#### Asset Purpose — [signed-off-by-regex.js]

Ensure the commit message contains a signature.

#### Asset Contents Description — [signed-off-by-regex.js]

A script runs a RegEx pattern to check if the commit message contains a valid commit.

---

[Back to top](#Palette Controller Object)

---

### GIT CONFIGURATION FILES [.GIT] 📁

#### Attribute Table — [.git]

| Attribute             | Value  |
| --------------------- | ------ |
| Asset Name            | .git   |
| Relative Path         | .git   |
| Asset Type            | FOLDER |
| CI Type               | N/A    |
| CI Scope              | N/A    |

#### Asset Purpose — [.git]

Contains version control metadata required by Git.

#### Asset Contents Description — [.git]

Stores commit history, branches, and repository configuration. Created automatically by Git, not tracked in version
control.

ℹ️ **Files in this directory are not listed individually as they are managed largely by Git.**

---

[Back to top](#Palette Controller Object)

---

### GIT CONFIGURATION FILES [.GITHUB] 📁

#### Attribute Table — [.gitHUB]

| Attribute             | Value   |
| --------------------- | ------- |
| Asset Name            | .github |
| Relative Path         | .github |
| Asset Type            | FOLDER  |
| CI Type               | N/A     |
| CI Scope              | N/A     |

#### Asset Purpose — [.github]

Files related to GitHub interface must be stored in here in order for them to be picked up by GitHub.

#### Asset Contents Description — [.github]

- Issue templates
- CI workflows

---

[Back to top](#Palette Controller Object)

---

### GIT CONFIGURATION FILES [ISSUE_TEMPLATE] 📁

#### Attribute Table — [ISSUE_TEMPLATE]

| Attribute             | Value                  |
| --------------------- | ---------------------- |
| Asset Name            | .github                |
| Relative Path         | .github/ISSUE_TEMPLATE |
| Asset Type            | FOLDER                 |
| CI Type               | N/A                    |
| CI Scope              | N/A                    |

#### Asset Purpose — [ISSUE_TEMPLATE]

Too keep issue requests consistent in format. This makes them easier to read and parse.

#### Asset Contents Description — [ISSUE_TEMPLATE]

- Configuration file (contains link to report security issues separately and disables blank issues)
- Bug report template (For reporting bugs)
- Feature report template (For requesting new features)
- Task request template (For requesting a unit of work like a documentation update)

---

[Back to top](#Palette Controller Object)

---

### BUG REPORT GITHUB ISSUE YAML TEMPLATE [BUG-REPORT-TEMPLATE.YAML] 📄

#### Attribute Table — [bug-report-template.yaml]

| Attribute             | Value                                                 |
| --------------------- | ----------------------------------------------------- |
| Asset Name            | `bug-report-template.yaml`                            |
| Relative Path         | `.github\ISSUE_TEMPLATE\bug-report-template.yaml`     |
| Asset Type            | YAML                                                  |
| CI Type               | chore                                                 |
| CI Scope              | ui                                                    |

#### Asset Purpose — [bug-report-template.yaml]

Provide a standard template for consistent bug reporting.

#### Asset Contents Description — [bug-report-template.yaml]

A YAML template for bug reporting.

---

[Back to top](#Palette Controller Object)

---

### GITHUB ISSUE YAML TEMPLATE CONFIG [CONFIG.YAML] 📄

#### Attribute Table — [config.yaml]

| Attribute             | Value                                                 |
| --------------------- | ----------------------------------------------------- |
| Asset Name            | `config.yaml`                                         |
| Relative Path         | `.github\ISSUE_TEMPLATE\config.yaml`                  |
| Asset Type            | YAML                                                  |
| CI Type               | chore                                                 |
| CI Scope              | config                                                |

#### Asset Purpose — [config.yaml]

Prevent unstructured reporting templates from being used.

#### Asset Contents Description — [config.yaml]

Disables blank issues and provides a link to private bug reporting area.

---

[Back to top](#Palette Controller Object)

---

### FEATURE REQUEST GITHUB ISSUE YAML TEMPLATE [FEATURE-REQUEST-TEMPLATE.YAML] 📄

#### Attribute Table — [feature-request-template.yaml]

| Attribute             | Value                                                 |
| --------------------- | ----------------------------------------------------- |
| Asset Name            | `feature-request-template.yaml`                       |
| Relative Path         | `.github\ISSUE_TEMPLATE\feature-request-template.yaml`|
| Asset Type            | YAML                                                  |
| CI Type               | chore                                                 |
| CI Scope              | ui                                                    |

#### Asset Purpose — [feature-request-template.yaml]

Provide a standard template for consistent feature reporting.

#### Asset Contents Description — [feature-request-template.yaml]

A YAML template for feature reporting.

---

[Back to top](#Palette Controller Object)

---

### TASK REQUEST GITHUB ISSUE YAML TEMPLATE [TASK-REQUEST-TEMPLATE.YAML] 📄

#### Attribute Table — [task-request-template.yaml]

| Attribute             | Value                                                 |
| --------------------- | ----------------------------------------------------- |
| Asset Name            | `task-request-template.yaml`                          |
| Relative Path         | `.github\ISSUE_TEMPLATE\task-request-template.yaml`   |
| Asset Type            | YAML                                                  |
| CI Type               | chore                                                 |
| CI Scope              | ui                                                    |

#### Asset Purpose — [task-request-template.yaml]

Provide a standard template for consistent task requests.

#### Asset Contents Description — [task-request-template.yaml]

A YAML template for task requests.

---

[Back to top](#Palette Controller Object)

---

### Visual Studio Code Settings [.VSCODE] 📁

#### Attribute Table — [.vscode]

| Attribute             | Value     |
| :-------------------- | :-------- |
| Asset Name            | .vscode   |
| Relative Path         | .vscode   |
| Asset Type            | FOLDER    |
| CI Type               | chore     |
| CI Scope              | config    |

#### Asset Purpose — [.vscode]

Create a consistent IDE experience for all developers working on the project.

#### Asset Contents Description — [.vscode]

- extensions.json
- settings.json

---

[Back to top](#Palette Controller Object)

---

### VSC EXTENSIONS [EXTENSIONS] 📄

#### Attribute Table — [extensions.json]

| Attribute             | Value         |
| :-------------------- | :------------ |
| Asset Name            | extensions    |
| Relative Path         | .vscode       |
| Asset Type            | JSON          |
| CI Type               | chore         |
| CI Scope              | config        |

#### Asset Purpose — [extensions.json]

Provide developers with a consistent experience by popping up a dialogue reporting any VSC plugins that have not
 been installed.

#### Asset Contents Description — [extension.json]

A list of VSC plugins that are required for the project workflow to function correctly.

---

[Back to top](#Palette Controller Object)

---

### VSC SETTINGS [SETTINGS.JSON] 📄

#### Attribute Table — [settings.json]

| Attribute             | Value          |
| :-------------------- | :------------- |
| Asset Name            | settings.json  |
| Relative Path         | .vscode        |
| Asset Type            | JSON           |
| CI Type               | chore          |
| CI Scope              | config         |

#### Asset Purpose — [settings.json]

Provide a consistent development experience.

#### Asset Contents Description — [settings.json]

Contains a number of settings to make using VSC easier.

1. Automatic actions.
2. Add a visible ruler to the IDE.
3. Format settings.
4. Confirmation settings.
5. Markdown settings.
6. Include otherwise hidden folders in the file tree view.
7. Include otherwise excluded files in the project file search.
8. Start Terminal in Bash.
9. Automatically format JSON files on save.

---

[Back to top](#Palette Controller Object)

---

### GIT IGNORE [.GITIGNORE] 📄

#### Attribute Table - [.gitignore]

| Attribute             | Value        |
|-----------------------|--------------|
| Asset Name            | .gitignore   |
| Relative Path         | .gitignore   |
| Asset Type            | TEXT         |
| CI Type               | N/A          |
| CI Scope              | N/A          |

#### Asset Purpose - [.gitignore]

Specifies which files or directories Git should ignore.

#### Asset Contents Description - [.gitignore]

Lists temporary files, build outputs, IDE configuration, and OS-specific files. This has been geared towards GameMaker.

---

[Back to top](#Palette Controller Object)

---

### CONTRIBUTING DOCUMENT [CONTRIBUTING] 📄

#### Attribute Table — [CONTRIBUTING.md]

| Attribute             | Value           |
| --------------------- | --------------- |
| Asset Name            | CONTRIBUTING.md |
| Relative Path         | CONTRIBUTING.md |
| Asset Type            | MARKDOWN        |
| CI Type               | docs            |
| CI Scope              | core            |

#### Asset Purpose — [CONTRIBUTING.md]

Ensures quality and consistency across the project regardless of the developer.

#### Asset Contents Description — [CONTRIBUTING.md]

- GitFlow
- Contact information
- Copyright information

---

[Back to top](#Palette Controller Object)

---

### DEVELOPER DOCUMENT [DEVELOPER.MD] 📄

#### Attribute Table — [DEVELOPER.md]

| Attribute             | Value          |
| --------------------- | -------------- |
| Asset Name            | DEVELOPER.md   |
| Relative Path         | DEVELOPER.md   |
| Asset Type            | MARKDOWN       |
| CI Type               | docs           |
| CI Scope              | core           |

#### Asset Purpose — [DEVELOPER.md]

Provides developers with all the information they need to work on the project effectively.

#### Asset Contents Description — [DEVELOPER.md]

Contains information for developers to work on the project.

---

[Back to top](#Palette Controller Object)

---

### LICENSE [LICENSE] 📄

#### Attribute Table — [LICENSE]

| Attribute             | Value        |
| --------------------- | ------------ |
| Asset Name            | LICENSE      |
| Relative Path         | LICENSE      |
| Asset Type            | TEXT         |
| CI Type               | docs         |
| CI Scope              | core         |

#### Asset Purpose — [LICENSE]

Provides the legal framework under which the project can be used, modified, and redistributed.

#### Asset Contents Description — [LICENSE]

By default, this template includes the **GNU General Public License v3.0**.

---

[Back to top](#Palette Controller Object)

---

### README DOCUMENT [README.MD] 📄

#### Attribute Table — [README.md]

| Attribute             | Value        |
| --------------------- | ------------ |
| Asset Name            | README.md    |
| Relative Path         | README.md    |
| Asset Type            | MARKDOWN     |
| CI Type               | docs         |
| CI Scope              | core         |

#### Asset Purpose — [README]

To provide a quick overview of the project scope.

#### Asset Contents Description — [README]

- Status badges
- Table of contents
- What is this repository for?
- Who is this repository for?
- Quick start
- ENVIRONMENT DEPENDENCY MANIFESTO
- Contact Information
- Copyright information

---

[Back to top](#Palette Controller Object)

---

## CODE STRUCTURE

TEXT HERE

## CONTACT INFORMATION

Author: Daniel Mallett (Monkey Knuckles)

If you have any problems with the repository or have any suggestions please contact us at <info@ninjamonkeygames.com>.

You may also contact us via our [website](https://ninjamonkeygames.com).

Any bugs should be raised as an [issue](https://github.com/NinjaMonkeyGames/markdownlint-cli2/issues) on GitHub.

---

## COPYRIGHT

*NinjaMonkeyGames™ Copyright © 2026 All rights reserved.*
