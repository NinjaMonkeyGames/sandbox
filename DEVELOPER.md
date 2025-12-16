# Grid Utility Project Programmers' Manual

This document is a reference guide for programmers. It provides a comprehensive list of all assets contained within
the project.

This includes detailed API descriptions and the structure of project assets.

This reference manual focuses on the project structure and logic.

This document does not cover documentation style guidelines or contribution policies. See, **`CONTRIBUTING.md`**.

ℹ Please review **`CONTRIBUTING.md`** carefully, as it
contains important information on how to contribute to this repository and how to update the documentation correctly.

---

<!-- markdownlint-disable MD013 -->

## Table of Contents

- [Grid Utility Project Programmers' Manual](#grid-utility-project-programmers-manual)
  - [Table of Contents](#table-of-contents)
  - [Target Audience](#target-audience)
  - [Project Purpose](#project-purpose)
  - [Project Assets](#project-assets)
    - [GIT CONFIGURATION FILES \[.GIT\] 📁](#git-configuration-files-git-)
      - [Attribute Table — \[.git\]](#attribute-table--git)
      - [Asset Purpose — \[.git\]](#asset-purpose--git)
      - [Asset Contents Description — \[.git\]](#asset-contents-description--git)
    - [GITHUB FILES \[.GITHUB\] 📁](#github-files-github-)
      - [Attribute Table — \[.github\]](#attribute-table--github)
      - [Asset Purpose — \[.github\]](#asset-purpose--github)
      - [Asset Contents Description — \[.github\]](#asset-contents-description--github)
    - [GITHUB CI WORKFLOW FILES \[WORKFLOWS\] 📁](#github-ci-workflow-files-workflows-)
      - [Attribute Table — \[workflows\]](#attribute-table--workflows)
      - [Asset Purpose — \[workflows\]](#asset-purpose--workflows)
      - [Asset Contents Description — \[workflows\]](#asset-contents-description--workflows)
    - [CI CONTROLLER \[CI.YAML\] 📄](#ci-controller-ciyaml-)
      - [Attribute Table — \[ci.yaml\]](#attribute-table--ciyaml)
      - [Asset Purpose — \[ci.yaml\]](#asset-purpose--ciyaml)
      - [Asset Contents Description — \[ci.yaml\]](#asset-contents-description--ciyaml)
    - [EXECUTE COMMITLINT \[COMMITLINT.YAML\] 📄](#execute-commitlint-commitlintyaml-)
      - [Attribute Table — \[commitlint.yaml\]](#attribute-table--commitlintyaml)
      - [Asset Purpose — \[commitlint.yaml\]](#asset-purpose--commitlintyaml)
      - [Asset Contents Description — \[commitlint.yaml\]](#asset-contents-description--commitlintyaml)
    - [RUN DEVELOPMENT WORKFLOW \[DEVELOPMENT.YAML\] 📄](#run-development-workflow-developmentyaml-)
      - [Attribute Table — \[development.yaml\]](#attribute-table--developmentyaml)
      - [Asset Purpose — \[development.yaml\]](#asset-purpose--developmentyaml)
      - [Asset Contents Description — \[development.yaml\]](#asset-contents-description--developmentyaml)
    - [EXECUTE MARKDOWNLINT \[MARKDOWNLINT.YAML\] 📄](#execute-markdownlint-markdownlintyaml-)
      - [Attribute Table — \[markdownlint.yaml\]](#attribute-table--markdownlintyaml)
      - [Asset Purpose — \[markdownlint.yaml\]](#asset-purpose--markdownlintyaml)
      - [Asset Contents Description — \[markdownlint.yaml\]](#asset-contents-description--markdownlintyaml)
    - [RUN PRODUCTION WORKFLOW \[PRODUCTION.YAML\] 📄](#run-production-workflow-productionyaml-)
      - [Attribute Table — \[production.yaml\]](#attribute-table--productionyaml)
      - [Asset Purpose — \[production.yaml\]](#asset-purpose--productionyaml)
      - [Asset Contents Description — \[production.yaml\]](#asset-contents-description--productionyaml)
    - [RUN RELEASE WORKFLOW \[RELEASE.YAML\] 📄](#run-release-workflow-releaseyaml-)
      - [Attribute Table — \[release.yaml\]](#attribute-table--releaseyaml)
      - [Asset Purpose — \[release.yaml\]](#asset-purpose--releaseyaml)
      - [Asset Contents Description — \[release.yaml\]](#asset-contents-description--releaseyaml)
    - [RUN STAGING WORKFLOW \[STAGING.YAML\] 📄](#run-staging-workflow-stagingyaml-)
      - [Attribute Table — \[staging.yaml\]](#attribute-table--stagingyaml)
      - [Asset Purpose — \[staging.yaml\]](#asset-purpose--stagingyaml)
      - [Asset Contents Description — \[staging.yaml\]](#asset-contents-description--stagingyaml)
    - [VISUAL STUDIO CODE CONFIGURATION \[.VSCODE\] 📁](#visual-studio-code-configuration-vscode-)
      - [Attribute Table — \[.vscode\]](#attribute-table--vscode)
      - [Asset Purpose — \[.vscode\]](#asset-purpose--vscode)
      - [Asset Contents Description — \[.vscode\]](#asset-contents-description--vscode)
    - [VS CODE SETTINGS \[SETTINGS.JSON\] 📄](#vs-code-settings-settingsjson-)
      - [Attribute Table — \[settings.json\]](#attribute-table--settingsjson)
      - [Asset Purpose — \[settings.json\]](#asset-purpose--settingsjson)
      - [Asset Contents Description — \[settings.json\]](#asset-contents-description--settingsjson)
    - [GIT ATTRIBUTES \[.GITATTRIBUTES\] 📄](#git-attributes-gitattributes-)
      - [Attribute Table - \[.gitattributes\]](#attribute-table---gitattributes)
      - [Asset Purpose - \[.gitattributes\]](#asset-purpose---gitattributes)
      - [Asset Contents Description - \[.gitattributes\]](#asset-contents-description---gitattributes)
    - [GIT IGNORE \[.GITIGNORE\] 📄](#git-ignore-gitignore-)
      - [Attribute Table - \[.gitignore\]](#attribute-table---gitignore)
      - [Asset Purpose - \[.gitignore\]](#asset-purpose---gitignore)
      - [Asset Contents Description - \[.gitignore\]](#asset-contents-description---gitignore)
    - [MARKDOWNLINT-CLI2 CONFIGURATION FILE \[.MARKDOWNLINT-CLI2.JSONC\] 📄](#markdownlint-cli2-configuration-file-markdownlint-cli2jsonc-)
      - [Attribute Table — \[.markdownlint-cli2.jsonc\]](#attribute-table--markdownlint-cli2jsonc)
      - [Asset Purpose — \[.markdownlint-cli2.jsonc\]](#asset-purpose--markdownlint-cli2jsonc)
      - [Asset Contents Description — \[.markdownlint-cli2.jsonc\]](#asset-contents-description--markdownlint-cli2jsonc)
    - [CODE OF CONDUCT \[CODE\_OF\_CONDUCT.MD\] 📄](#code-of-conduct-code_of_conductmd-)
      - [Attribute Table - \[code\_of\_conduct.md\]](#attribute-table---code_of_conductmd)
      - [Asset Purpose - \[code\_of\_conduct.md\]](#asset-purpose---code_of_conductmd)
      - [Asset Contents Description - \[code\_of\_conduct.md\]](#asset-contents-description---code_of_conductmd)
    - [COMMITLINT CONFIGURATION FILE \[COMMITLINT.CONFIG.JS\] 📄](#commitlint-configuration-file-commitlintconfigjs-)
      - [Attribute Table — \[commitlint.config.js\]](#attribute-table--commitlintconfigjs)
      - [Asset Purpose — \[commitlint.config.js\]](#asset-purpose--commitlintconfigjs)
      - [Asset Contents Description — \[commitlint.config.js\]](#asset-contents-description--commitlintconfigjs)
    - [DEVELOPER \[CONTRIBUTING.MD\] 📄](#developer-contributingmd-)
      - [Attribute Table - \[contributing.md\]](#attribute-table---contributingmd)
      - [Asset Purpose - \[contributing.md.md\]](#asset-purpose---contributingmdmd)
      - [Asset Contents Description - \[contributing.md\]](#asset-contents-description---contributingmd)
        - [Scope - \[contributing.md\]](#scope---contributingmd)
    - [DEVELOPER \[DEVELOPER.MD\] 📄](#developer-developermd-)
      - [Attribute Table - \[developer.md\]](#attribute-table---developermd)
      - [Asset Purpose - \[developer.md\]](#asset-purpose---developermd)
      - [Asset Contents Description - \[developer.md\]](#asset-contents-description---developermd)
        - [Scope - \[developer.md\]](#scope---developermd)
    - [GRID UTILITY \[GRID UTILITY.YYP\] 📄](#grid-utility-grid-utilityyyp-)
      - [Attribute Table - \[grid utility.yyp\]](#attribute-table---grid-utilityyyp)
      - [Asset Purpose - \[grid utility.yyp\]](#asset-purpose---grid-utilityyyp)
      - [Asset Contents Description - \[grid utility.yyp\]](#asset-contents-description---grid-utilityyyp)
    - [OBJECTS \[OBJECTS\] 📁](#objects-objects-)
      - [Attribute Table - \[objects\]](#attribute-table---objects)
      - [Asset Purpose - \[objects\]](#asset-purpose---objects)
      - [Asset Contents Description - \[objects\]](#asset-contents-description---objects)
    - [OBJ\_GRID \[OBJ\_GRID\] 📁](#obj_grid-obj_grid-)
      - [Attribute Table - \[obj\_grid\]](#attribute-table---obj_grid)
      - [Asset Purpose - \[obj\_grid\]](#asset-purpose---obj_grid)
      - [Asset Contents Description - \[obj\_grid\]](#asset-contents-description---obj_grid)
    - [OBJECT CLEANUP SCRIPT \[CLEANUP\_0.GML\] 📄](#object-cleanup-script-cleanup_0gml-)
      - [Attribute Table - \[cleanup\_0.gml\]](#attribute-table---cleanup_0gml)
      - [Asset Purpose - \[cleanup\_0.gml\]](#asset-purpose---cleanup_0gml)
      - [Asset Contents Description - \[cleanup\_0.gml\]](#asset-contents-description---cleanup_0gml)
    - [OBJECT CREATE SCRIPT \[CREATE\_0.GML\] 📄](#object-create-script-create_0gml-)
      - [Attribute Table - \[create\_0.gml\]](#attribute-table---create_0gml)
      - [Asset Purpose - \[create\_0.gml\]](#asset-purpose---create_0gml)
      - [Asset Contents Description - \[create\_0.gml\]](#asset-contents-description---create_0gml)
    - [OBJECT DRAW SCRIPT \[DRAW\_0.GML\] 📄](#object-draw-script-draw_0gml-)
      - [Attribute Table - \[draw\_0.gml\]](#attribute-table---draw_0gml)
      - [Asset Purpose - \[draw\_0.gml\]](#asset-purpose---draw_0gml)
      - [Asset Contents Description - \[draw\_0.gml\]](#asset-contents-description---draw_0gml)
    - [OBJECT DEFINITION \[OBJ\_GRID.YY\] 📄](#object-definition-obj_gridyy-)
      - [Attribute Table - \[obj\_grid.yy\]](#attribute-table---obj_gridyy)
      - [Asset Purpose - \[obj\_grid.yy\]](#asset-purpose---obj_gridyy)
      - [Asset Contents Description - \[obj\_grid.yy\]](#asset-contents-description---obj_gridyy)
    - [OBJECT STEP SCRIPT \[STEP\_0.GML\] 📄](#object-step-script-step_0gml-)
      - [Attribute Table - \[step\_0.gml\]](#attribute-table---step_0gml)
      - [Asset Purpose - \[step\_0.gml\]](#asset-purpose---step_0gml)
      - [Asset Contents Description - \[step\_0.gml\]](#asset-contents-description---step_0gml)
    - [PLATFORM SPECIFIC OPTIONS \[OPTIONS\] 📁](#platform-specific-options-options-)
      - [Attribute Table - \[options\]](#attribute-table---options)
      - [Asset Purpose - \[options\]](#asset-purpose---options)
      - [Asset Contents Description - \[options\]](#asset-contents-description---options)
    - [ANDROID PLATFORM SPECIFIC OPTIONS \[ANDROID\] 📁](#android-platform-specific-options-android-)
      - [Attribute Table - \[android\]](#attribute-table---android)
      - [Asset Purpose - \[android\]](#asset-purpose---android)
      - [Asset Contents Description - \[android\]](#asset-contents-description---android)
    - [ANDROID PLATFORM SPECIFIC OPTIONS \[OPTIONS\_ANDROID.YY\] 📄](#android-platform-specific-options-options_androidyy-)
      - [Attribute Table - \[options\_android.yy\]](#attribute-table---options_androidyy)
      - [Asset Purpose - \[options\_android.yy\]](#asset-purpose---options_androidyy)
      - [Asset Contents Description - \[options\_android.yy\]](#asset-contents-description---options_androidyy)
    - [HTML5 PLATFORM SPECIFIC OPTIONS \[HTML5\] 📁](#html5-platform-specific-options-html5-)
      - [Attribute Table - \[html5\]](#attribute-table---html5)
      - [Asset Purpose - \[html5\]](#asset-purpose---html5)
      - [Asset Contents Description - \[html5\]](#asset-contents-description---html5)
    - [HTML5 PLATFORM SPECIFIC OPTIONS \[OPTIONS\_HTML5.YY\] 📄](#html5-platform-specific-options-options_html5yy-)
      - [Attribute Table - \[options\_html5.yy\]](#attribute-table---options_html5yy)
      - [Asset Purpose - \[options\_html5.yy\]](#asset-purpose---options_html5yy)
      - [Asset Contents Description - \[options\_html5.yy\]](#asset-contents-description---options_html5yy)
    - [IOS PLATFORM SPECIFIC OPTIONS \[IOS\] 📁](#ios-platform-specific-options-ios-)
      - [Attribute Table - \[ios\]](#attribute-table---ios)
      - [Asset Purpose - \[ios\]](#asset-purpose---ios)
      - [Asset Contents Description - \[ios\]](#asset-contents-description---ios)
    - [IOS PLATFORM SPECIFIC OPTIONS \[OPTIONS\_IOS.YY\] 📄](#ios-platform-specific-options-options_iosyy-)
      - [Attribute Table - \[options\_ios.yy\]](#attribute-table---options_iosyy)
      - [Asset Purpose - \[options\_ios.yy\]](#asset-purpose---options_iosyy)
      - [Asset Contents Description - \[options\_ios.yy\]](#asset-contents-description---options_iosyy)
    - [LINUX PLATFORM SPECIFIC OPTIONS \[LINUX\] 📁](#linux-platform-specific-options-linux-)
      - [Attribute Table - \[linux\]](#attribute-table---linux)
      - [Asset Purpose - \[linux\]](#asset-purpose---linux)
      - [Asset Contents Description - \[linux\]](#asset-contents-description---linux)
    - [LINUX PLATFORM SPECIFIC OPTIONS \[OPTIONS\_LINUX.YY\] 📄](#linux-platform-specific-options-options_linuxyy-)
      - [Attribute Table - \[options\_linux.yy\]](#attribute-table---options_linuxyy)
      - [Asset Purpose - \[options\_linux.yy\]](#asset-purpose---options_linuxyy)
      - [Asset Contents Description - \[options\_linux.yy\]](#asset-contents-description---options_linuxyy)
    - [MAC PLATFORM SPECIFIC OPTIONS \[MAC\] 📁](#mac-platform-specific-options-mac-)
      - [Attribute Table - \[mac\]](#attribute-table---mac)
      - [Asset Purpose - \[mac\]](#asset-purpose---mac)
      - [Asset Contents Description - \[mac\]](#asset-contents-description---mac)
    - [MAC PLATFORM SPECIFIC OPTIONS \[OPTIONS\_MAC.YY\] 📄](#mac-platform-specific-options-options_macyy-)
      - [Attribute Table - \[options\_mac.yy\]](#attribute-table---options_macyy)
      - [Asset Purpose - \[options\_mac.yy\]](#asset-purpose---options_macyy)
      - [Asset Contents Description - \[options\_mac.yy\]](#asset-contents-description---options_macyy)
    - [GENERIC TARGET OPTIONS \[MAIN\] 📁](#generic-target-options-main-)
      - [Attribute Table - \[main\]](#attribute-table---main)
      - [Asset Purpose - \[main\]](#asset-purpose---main)
      - [Asset Contents Description - \[main\]](#asset-contents-description---main)
    - [GENERIC PLATFORM OPTIONS \[OPTIONS\_MAIN.YY\] 📄](#generic-platform-options-options_mainyy-)
      - [Attribute Table - \[options\_main.yy\]](#attribute-table---options_mainyy)
      - [Asset Purpose - \[options\_main.yy\]](#asset-purpose---options_mainyy)
      - [Asset Contents Description - \[options\_main.yy\]](#asset-contents-description---options_mainyy)
    - [OPERAGX PLATFORM SPECIFIC OPTIONS \[OPERAGX\] 📁](#operagx-platform-specific-options-operagx-)
      - [Attribute Table - \[operagx\]](#attribute-table---operagx)
      - [Asset Purpose - \[operagx\]](#asset-purpose---operagx)
      - [Asset Contents Description - \[operagx\]](#asset-contents-description---operagx)
    - [OPERAGX PLATFORM SPECIFIC OPTIONS \[OPTIONS\_OPERAGX.YY\] 📄](#operagx-platform-specific-options-options_operagxyy-)
      - [Attribute Table - \[options\_operagx.yy\]](#attribute-table---options_operagxyy)
      - [Asset Purpose - \[options\_operagx.yy\]](#asset-purpose---options_operagxyy)
      - [Asset Contents Description - \[options\_operagx.yy\]](#asset-contents-description---options_operagxyy)
    - [TVOS PLATFORM SPECIFIC OPTIONS \[TVOS\] 📁](#tvos-platform-specific-options-tvos-)
      - [Attribute Table - \[tvos\]](#attribute-table---tvos)
      - [Asset Purpose - \[tvos\]](#asset-purpose---tvos)
      - [Asset Contents Description - \[tvos\]](#asset-contents-description---tvos)
    - [TVOS PLATFORM SPECIFIC OPTIONS \[OPTIONS\_TVOS.YY\] 📄](#tvos-platform-specific-options-options_tvosyy-)
      - [Attribute Table - \[options\_tvos.yy\]](#attribute-table---options_tvosyy)
      - [Asset Purpose - \[options\_tvos.yy\]](#asset-purpose---options_tvosyy)
      - [Asset Contents Description - \[options\_tvos.yy\]](#asset-contents-description---options_tvosyy)
    - [WINDOWS PLATFORM SPECIFIC OPTIONS \[WINDOWS\] 📁](#windows-platform-specific-options-windows-)
      - [Attribute Table - \[windows\]](#attribute-table---windows)
      - [Asset Purpose - \[windows\]](#asset-purpose---windows)
      - [Asset Contents Description - \[windows\]](#asset-contents-description---windows)
    - [WINDOWS PLATFORM SPECIFIC ICONS \[ICONS\] 📁](#windows-platform-specific-icons-icons-)
      - [Attribute Table - \[icons\]](#attribute-table---icons)
      - [Asset Purpose - \[icons\]](#asset-purpose---icons)
      - [Asset Contents Description - \[icons\]](#asset-contents-description---icons)
    - [WINDOWS PLATFORM SPECIFIC ICON \[ICON.ICO\] 📄](#windows-platform-specific-icon-iconico-)
      - [Attribute Table - \[icon.ico\]](#attribute-table---iconico)
      - [Asset Purpose - \[icon.ico\]](#asset-purpose---iconico)
      - [Asset Contents Description - \[icon.ico\]](#asset-contents-description---iconico)
    - [WINDOWS PLATFORM SPECIFIC INSTALLER GRAPHICS \[INSTALLER\] 📁](#windows-platform-specific-installer-graphics-installer-)
      - [Attribute Table - \[installer\]](#attribute-table---installer)
      - [Asset Purpose - \[installer\]](#asset-purpose---installer)
      - [Asset Contents Description - \[installer\]](#asset-contents-description---installer)
    - [WINDOWS PLATFORM SPECIFIC INSTALLER HEADER IMAGE \[HEADER.BMP\] 📄](#windows-platform-specific-installer-header-image-headerbmp-)
      - [Attribute Table - \[header.bmp\]](#attribute-table---headerbmp)
      - [Asset Purpose - \[header.bmp\]](#asset-purpose---headerbmp)
      - [Asset Contents Description - \[header.bmp\]](#asset-contents-description---headerbmp)
    - [WINDOWS PLATFORM SPECIFIC OPTIONS \[OPTIONS\_WINDOWS.YY\] 📄](#windows-platform-specific-options-options_windowsyy-)
      - [Attribute Table - \[options\_windows.yy\]](#attribute-table---options_windowsyy)
      - [Asset Purpose - \[options\_windows.yy\]](#asset-purpose---options_windowsyy)
      - [Asset Contents Description - \[options\_windows.yy\]](#asset-contents-description---options_windowsyy)
    - [WINDOWS PLATFORM SPECIFIC SPLASH SCREEN GRAPHICS \[SPLASH\] 📁](#windows-platform-specific-splash-screen-graphics-splash-)
      - [Attribute Table - \[splash\]](#attribute-table---splash)
      - [Asset Purpose - \[splash\]](#asset-purpose---splash)
      - [Asset Contents Description - \[splash\]](#asset-contents-description---splash)
    - [WINDOWS PLATFORM SPECIFIC SPLASH IMAGE \[SPLASH.PNG\] 📄](#windows-platform-specific-splash-image-splashpng-)
      - [Attribute Table - \[splash.png\]](#attribute-table---splashpng)
      - [Asset Purpose - \[splash.png\]](#asset-purpose---splashpng)
      - [Asset Contents Description - \[splash.png\]](#asset-contents-description---splashpng)
    - [README DOCUMENTATION \[README.MD\] 📄](#readme-documentation-readmemd-)
      - [Attribute Table - \[readme.md\]](#attribute-table---readmemd)
      - [Asset Purpose - \[readme.md\]](#asset-purpose---readmemd)
      - [Asset Contents Description - \[readme.md\]](#asset-contents-description---readmemd)
    - [CHECK COMMIT SIGNATURE \[SIGNED-OFF-BY-REGEX.JS\] 📄](#check-commit-signature-signed-off-by-regexjs-)
      - [Attribute Table — \[signed-off-by-regex.js\]](#attribute-table--signed-off-by-regexjs)
      - [Asset Purpose — \[signed-off-by-regex.js\]](#asset-purpose--signed-off-by-regexjs)
      - [Asset Contents Description — \[signed-off-by-regex.js\]](#asset-contents-description--signed-off-by-regexjs)
    - [ROOMS \[ROOMS\] 📁](#rooms-rooms-)
      - [Attribute Table - \[rooms\]](#attribute-table---rooms)
      - [Asset Purpose - \[rooms\]](#asset-purpose---rooms)
      - [Asset Contents Description - \[rooms\]](#asset-contents-description---rooms)
    - [MAIN ROOM \[RM\_MAIN\] 📁](#main-room-rm_main-)
      - [Attribute Table - \[rm\_main\]](#attribute-table---rm_main)
      - [Asset Purpose - \[rm\_main\]](#asset-purpose---rm_main)
      - [Asset Contents Description - \[rm\_main\]](#asset-contents-description---rm_main)
    - [MAIN ROOM DEFINITION \[RM\_MAIN.YY\] 📄](#main-room-definition-rm_mainyy-)
      - [Attribute Table - \[rm\_main.yy\]](#attribute-table---rm_mainyy)
      - [Asset Purpose - \[rm\_main.yy\]](#asset-purpose---rm_mainyy)
      - [Asset Contents Description - \[rm\_main.yy\]](#asset-contents-description---rm_mainyy)
    - [SPRITES \[SPRITES\] 📁](#sprites-sprites-)
      - [Attribute Table - \[sprites\]](#attribute-table---sprites)
      - [Asset Purpose - \[sprites\]](#asset-purpose---sprites)
      - [Asset Contents Description - \[sprites\]](#asset-contents-description---sprites)
        - [PLACEHOLDER SPRITE EXAMPLE](#placeholder-sprite-example)

---

<!-- markdownlint-enable MD013 -->

## Target Audience

This document is for developers actively working on this project.

---

## Project Purpose

The purpose of this project is to provide a reuseable, modular grid utility using GML. This will be useful for a number
of different projects from world editors to RPGs.

---

## Project Assets

---

### GIT CONFIGURATION FILES [.GIT] 📁

#### Attribute Table — [.git]

| Attribute | Value |
| --- | --- |
| Asset Name | `.git` |
| Relative Path | `.git` |
| Include in Repository | No |
| Asset Type | FOLDER |
| CI Type | N/A |
| CI Scope | N/A |

#### Asset Purpose — [.git]

Contains version control metadata required by Git.

#### Asset Contents Description — [.git]

Stores commit history, branches, and repository configuration. Created automatically by Git, not tracked in version
control.

---

[Back to top](#grid-utility-project-programmers-manual)

---

### GITHUB FILES [.GITHUB] 📁

#### Attribute Table — [.github]

| Attribute | Value |
| --- | --- |
| Asset Name | `.github` |
| Relative Path | `.github` |
| Include in Repository | Yes |
| Asset Type | FOLDER |
| CI Type | N/A |
| CI Scope | N/A |

#### Asset Purpose — [.github]

Provide a space to store configuration files and CI scripts relating to the GitHub platform.

#### Asset Contents Description — [.github]

Issues templates and CI workflow files.

### GITHUB CI WORKFLOW FILES [WORKFLOWS] 📁

#### Attribute Table — [workflows]

| Attribute | Value |
| --- | --- |
| Asset Name | `workflows` |
| Relative Path | `.github\workflows` |
| Include in Repository | Yes |
| Asset Type | FOLDER |
| CI Type | N/A |
| CI Scope | N/A |

#### Asset Purpose — [workflows]

To maintain high standards by preventing bad code from perpetuating through the codebase.

#### Asset Contents Description — [workflows]

YAML scripts:

- `.github/workflows/ci.yaml`
- `.github/workflows/development.yaml`
- `.github/workflows/commitlint.yaml`
- `.github/workflows/markdownlint.yaml`
- `.github/workflows/production.yaml`
- `.github/workflows/release.yaml`
- `.github/workflows/staging.yaml`

---

[Back to top](#grid-utility-project-programmers-manual)

---

### CI CONTROLLER [CI.YAML] 📄

#### Attribute Table — [ci.yaml]

| Attribute | Value |
| --- | --- |
| Asset Name | `ci.yaml` |
| Relative Path | `.github/workflows/ci.yaml` |
| Include in Repository | Yes |
| Asset Type | YAML |
| CI Type | ci |
| CI Scope | config |

#### Asset Purpose — [ci.yaml]

To control the CI workflow from a central location.

#### Asset Contents Description — [ci.yaml]

YAML to detect what GitFlow environment.

---

[Back to top](#grid-utility-project-programmers-manual)

---

### EXECUTE COMMITLINT [COMMITLINT.YAML] 📄

#### Attribute Table — [commitlint.yaml]

| Attribute | Value |
| --- | --- |
| Asset Name | `commitlint.yaml` |
| Relative Path | `.github/workflows/commitlint.yaml` |
| Include in Repository | Yes |
| Asset Type | YAML |
| CI Type | ci |
| CI Scope | config |

#### Asset Purpose — [commitlint.yaml]

To ensure commit messages are adhearing to the conventional commit standard.

#### Asset Contents Description — [commitlint.yaml]

Connects to the GitHub Actions docker, installs commitlint and runs it against `commitlint.config.js`.

---

[Back to top](#grid-utility-project-programmers-manual)

---

### RUN DEVELOPMENT WORKFLOW [DEVELOPMENT.YAML] 📄

#### Attribute Table — [development.yaml]

| Attribute | Value |
| --- | --- |
| Asset Name | `development.yaml` |
| Relative Path | `.github/workflows/development.yaml` |
| Include in Repository | Yes |
| Asset Type | YAML |
| CI Type | ci |
| CI Scope | config |

#### Asset Purpose — [development.yaml]

To execute jobs related to the development environment.

#### Asset Contents Description — [development.yaml]

Calls `commitlint.yaml` & `markdownlint.yaml`.

---

[Back to top](#grid-utility-project-programmers-manual)

---

### EXECUTE MARKDOWNLINT [MARKDOWNLINT.YAML] 📄

#### Attribute Table — [markdownlint.yaml]

| Attribute | Value |
| --- | --- |
| Asset Name | `markdownlint.yaml` |
| Relative Path | `.github/workflows/markdownlint.yaml` |
| Include in Repository | Yes |
| Asset Type | YAML |
| CI Type | ci |
| CI Scope | config |

#### Asset Purpose — [markdownlint.yaml]

To ensure markdown text is adhearing to the commonmark standard.

#### Asset Contents Description — [markdownlint.yaml]

Connects to the GitHub Actions docker, installs markdownlint and runs it against `.markdownlint-cli2.jsonc`.

---

[Back to top](#grid-utility-project-programmers-manual)

---

### RUN PRODUCTION WORKFLOW [PRODUCTION.YAML] 📄

#### Attribute Table — [production.yaml]

| Attribute | Value |
| --- | --- |
| Asset Name | `production.yaml` |
| Relative Path | `.github/workflows/production.yaml` |
| Include in Repository | Yes |
| Asset Type | YAML |
| CI Type | ci |
| CI Scope | config |

#### Asset Purpose — [production.yaml]

To execute jobs related to the production environment.

#### Asset Contents Description — [production.yaml]

Calls `commitlint.yaml` & `markdownlint.yaml`.

---

[Back to top](#grid-utility-project-programmers-manual)

---

### RUN RELEASE WORKFLOW [RELEASE.YAML] 📄

#### Attribute Table — [release.yaml]

| Attribute | Value |
| --- | --- |
| Asset Name | `release.yaml` |
| Relative Path | `.github/workflows/release.yaml` |
| Include in Repository | Yes |
| Asset Type | YAML |
| CI Type | ci |
| CI Scope | config |

#### Asset Purpose — [release.yaml]

To execute jobs related to the release environment.

#### Asset Contents Description — [release.yaml]

Calls `commitlint.yaml` & `markdownlint.yaml`.

---

[Back to top](#grid-utility-project-programmers-manual)

---

### RUN STAGING WORKFLOW [STAGING.YAML] 📄

#### Attribute Table — [staging.yaml]

| Attribute | Value |
| --- | --- |
| Asset Name | `staging.yaml` |
| Relative Path | `.github/workflows/staging.yaml` |
| Include in Repository | Yes |
| Asset Type | YAML |
| CI Type | ci |
| CI Scope | config |

#### Asset Purpose — [staging.yaml]

To execute jobs related to the release environment.

#### Asset Contents Description — [staging.yaml]

Calls `commitlint.yaml` & `markdownlint.yaml`.

---

[Back to top](#grid-utility-project-programmers-manual)

---

### VISUAL STUDIO CODE CONFIGURATION [.VSCODE] 📁

#### Attribute Table — [.vscode]

| Attribute | Value |
| --- | --- |
| Asset Name | `.vscode` |
| Relative Path | `.vscode` |
| Include in Repository | Yes |
| Asset Type | FOLDER |
| CI Type | N/A |
| CI Scope | N/A |

#### Asset Purpose — [.vscode]

Defines IDE-specific settings for Visual Studio Code.

#### Asset Contents Description — [.vscode]

Holds configuration files such as `settings.json` to ensure consistent development environments across contributors.

---

[Back to top](#grid-utility-project-programmers-manual)

---

### VS CODE SETTINGS [SETTINGS.JSON] 📄

#### Attribute Table — [settings.json]

| Attribute | Value |
| --- | --- |
| Asset Name | `settings.json` |
| Relative Path | `.vscode/settings.json` |
| Include in Repository | Yes |
| Asset Type | JSON |
| CI Type | chore |
| CI Scope | config |

#### Asset Purpose — [settings.json]

Customises the VS Code development environment.

#### Asset Contents Description — [settings.json]

Defines workspace-specific editor settings, plugin options, and overrides for default VS Code behaviour.

---

[Back to top](#grid-utility-project-programmers-manual)

---

### GIT ATTRIBUTES [.GITATTRIBUTES] 📄

#### Attribute Table - [.gitattributes]

| Attribute | Value |
| --- | --- |
| Asset Name | `.gitattributes` |
| Relative Path | `.gitattributes` |
| Include in Repository | Yes |
| Asset Type | TEXT |
| CI Type | chore |
| CI Scope | config |
| Managed | Manual |

#### Asset Purpose - [.gitattributes]

Specifies Git attributes for handling line endings, merges, and export rules.

#### Asset Contents Description - [.gitattributes]

Contains rules for treating files as text or binary, merge behaviour, and export-ignore directives.

---

[Back to top](#grid-utility-project-programmers-manual)

---

### GIT IGNORE [.GITIGNORE] 📄

#### Attribute Table - [.gitignore]

| Attribute | Value |
| --- | --- |
| Asset Name | `.gitignore` |
| Relative Path | `.gitignore` |
| Include in Repository | Yes |
| Asset Type | TEXT |
| CI Type | N/A |
| CI Scope | N/A |
| Managed | Manual |

#### Asset Purpose - [.gitignore]

Specifies which files or directories Git should ignore.

#### Asset Contents Description - [.gitignore]

Lists temporary files, build outputs, IDE configuration, and OS-specific files. This has been geared towards GameMaker.

---

[Back to top](#grid-utility-project-programmers-manual)

---

### MARKDOWNLINT-CLI2 CONFIGURATION FILE [.MARKDOWNLINT-CLI2.JSONC] 📄

#### Attribute Table — [.markdownlint-cli2.jsonc]

| Attribute | Value |
| --- | --- |
| Asset Name | `.markdownlint-cli2.jsonc` |
| Relative Path | `.markdownlint-cli2.jsonc` |
| Include in Repository | Yes |
| Asset Type | JSONC |
| CI Type | chore |
| CI Scope | config |

#### Asset Purpose — [.markdownlint-cli2.jsonc]

Defines project-specific linting rules, formatting preferences, and exclusions for Markdown files when using
markdownlint-cli2, ensuring consistency and maintainability across documentation.

#### Asset Contents Description — [.markdownlint-cli2.jsonc]

Contains JSONC configuration for markdownlint-cli2, including enabled/disabled rules, rule options, custom rules, and
an ignore list for excluded files or directories. This file enforces uniform Markdown styling across the repository
during development and CI processes.

---

[Back to top](#grid-utility-project-programmers-manual)

---

### CODE OF CONDUCT [CODE_OF_CONDUCT.MD] 📄

#### Attribute Table - [code_of_conduct.md]

| Attribute | Value |
| --- | --- |
| Asset Name | `CODE_OF_CONDUCT.md` |
| Relative Path | `CODE_OF_CONDUCT.md` |
| Include in Repository | Yes |
| Asset Type | MARKDOWN |
| CI Type | docs |
| CI Scope | core |
| Managed | Manual |

#### Asset Purpose - [code_of_conduct.md]

Defines community behaviour and standards for contributors.

#### Asset Contents Description - [code_of_conduct.md]

Guidelines for respectful collaboration, reporting issues, and maintaining a safe environment.

### COMMITLINT CONFIGURATION FILE [COMMITLINT.CONFIG.JS] 📄

#### Attribute Table — [commitlint.config.js]

| Attribute | Value |
| --- | --- |
| Asset Name | `commitlint.config.js` |
| Relative Path | `commitlint.config.js` |
| Include in Repository | Yes |
| Asset Type | JavaScript |
| CI Type | ci |
| CI Scope | config |

#### Asset Purpose — [commitlint.config.js]

Ensure consistent commit message structure.

#### Asset Contents Description — [commitlint.config.js]

Contains Commitlint rules.

---

[Back to top](#grid-utility-project-programmers-manual)

---

### DEVELOPER [CONTRIBUTING.MD] 📄

#### Attribute Table - [contributing.md]

| Attribute | Value |
| --- | --- |
| Asset Name | `CONTRIBUTING.md` |
| Relative Path | `CONTRIBUTING.md` |
| Include in Repository | Yes |
| Asset Type | TEXT |
| CI Type | docs |
| CI Scope | core |
| Managed | Manual |

#### Asset Purpose - [contributing.md.md]

- Provide developers with all the knowledge they need to actively participate in the project.
- To maintain high consistent standards across the project.

#### Asset Contents Description - [contributing.md]

To provide developers and contributors the information they need to create pull requests and update the documentation.

##### Scope - [contributing.md]

- How to submit issues.
- How to create pull requests.
- Branching rules.
- Commit message standards.
- Code review process.
- Testing expectations before submission.
- Legal/licensing acknowledgements.
- Contributor behavior links (often references Code of Conduct).

---

[Back to top](#grid-utility-project-programmers-manual)

---

### DEVELOPER [DEVELOPER.MD] 📄

#### Attribute Table - [developer.md]

| Attribute | Value |
| --- | --- |
| Asset Name | `DEVELOPER.md` |
| Relative Path | `DEVELOPER.md` |
| Include in Repository | Yes |
| Asset Type | DOCUMENT |
| CI Type | docs |
| CI Scope | core |
| Managed | Manual |

#### Asset Purpose - [developer.md]

- Provide developers with all the knowledge they need to work effectively on the project.
- Maintain high consistent standards across the project.

#### Asset Contents Description - [developer.md]

- List of all the assets in the project and what their function.
- Development standards.

##### Scope - [developer.md]

- Project architecture overview.
- Folder / asset structure.
- Build & runtime environment.
- Debugging practices.
- Coding standards.
- Tooling expectations.
- Local setup for development (not contribution flow).

---

[Back to top](#grid-utility-project-programmers-manual)

---

### GRID UTILITY [GRID UTILITY.YYP] 📄

#### Attribute Table - [grid utility.yyp]

| Attribute | Value |
| --- | --- |
| Asset Name | `Grid Utility.yyp` |
| Relative Path | `Grid Utility.yyp` |
| Include in Repository | Yes |
| Asset Type | GAME PROJECT FILE |
| CI Type | chore |
| CI Scope | config |
| Managed | Automatic |

#### Asset Purpose - [grid utility.yyp]

Primary GameMaker project file defining resources, rooms, objects, and scripts for the grid utility.

#### Asset Contents Description - [grid utility.yyp]

Stores project metadata, asset references, and compilation settings.

---

[Back to top](#grid-utility-project-programmers-manual)

---

### OBJECTS [OBJECTS] 📁

#### Attribute Table - [objects]

| Attribute | Value |
| --- | --- |
| Asset Name | `objects` |
| Relative Path | `objects/` |
| Include in Repository | Yes |
| Asset Type | FOLDER |
| CI Type | feat |
| CI Scope | core |
| Managed | Manual |

#### Asset Purpose - [objects]

Container for GameMaker object definitions and object-specific scripts.

#### Asset Contents Description - [objects]

Contains subfolders and object assets such as `obj_grid` and its event scripts.

---

[Back to top](#grid-utility-project-programmers-manual)

---

### OBJ_GRID [OBJ_GRID] 📁

#### Attribute Table - [obj_grid]

| Attribute | Value |
| --- | --- |
| Asset Name | `objects/obj_grid/` |
| Relative Path | `objects/obj_grid/` |
| Include in Repository | Yes |
| Asset Type | FOLDER |
| CI Type | feat |
| CI Scope | core |
| Managed | Manual |

#### Asset Purpose - [obj_grid]

Holds the grid object definition and related event scripts.

#### Asset Contents Description - [obj_grid]

Child assets include `CleanUp_0.gml`, `Create_0.gml`, `Draw_0.gml`, `Step_0.gml`, and `obj_grid.yy`.

---

[Back to top](#grid-utility-project-programmers-manual)

---

### OBJECT CLEANUP SCRIPT [CLEANUP_0.GML] 📄

#### Attribute Table - [cleanup_0.gml]

| Attribute | Value |
| --- | --- |
| Asset Name | `CleanUp_0.gml` |
| Relative Path | `objects/obj_grid/CleanUp_0.gml` |
| Include in Repository | Yes |
| Asset Type | GAME SCRIPT |
| CI Type | feat |
| CI Scope | core |
| Managed | Manual |

#### Asset Purpose - [cleanup_0.gml]

Handles cleanup operations when the grid object is destroyed.

#### Asset Contents Description - [cleanup_0.gml]

Releases resources, clears memory, and resets grid-related state.

---

[Back to top](#grid-utility-project-programmers-manual)

---

### OBJECT CREATE SCRIPT [CREATE_0.GML] 📄

#### Attribute Table - [create_0.gml]

| Attribute | Value |
| --- | --- |
| Asset Name | `Create_0.gml` |
| Relative Path | `objects/obj_grid/Create_0.gml` |
| Include in Repository | Yes |
| Asset Type | GAME SCRIPT |
| CI Type | feat |
| CI Scope | core |
| Managed | Manual |

#### Asset Purpose - [create_0.gml]

Initializes the grid object and allocates required resources.

#### Asset Contents Description - [create_0.gml]

Defines grid dimensions, initializes variables, and sets default state.

---

[Back to top](#grid-utility-project-programmers-manual)

---

### OBJECT DRAW SCRIPT [DRAW_0.GML] 📄

#### Attribute Table - [draw_0.gml]

| Attribute | Value |
| --- | --- |
| Asset Name | `Draw_0.gml` |
| Relative Path | `objects/obj_grid/Draw_0.gml` |
| Include in Repository | Yes |
| Asset Type | GAME SCRIPT |
| CI Type | feat |
| CI Scope | core |
| Managed | Manual |

#### Asset Purpose - [draw_0.gml]

Renders the grid to the screen.

#### Asset Contents Description - [draw_0.gml]

Handles visual drawing of grid cells, borders, and overlays.

---

[Back to top](#grid-utility-project-programmers-manual)

---

### OBJECT DEFINITION [OBJ_GRID.YY] 📄

#### Attribute Table - [obj_grid.yy]

| Attribute | Value |
| --- | --- |
| Asset Name | `obj_grid.yy` |
| Relative Path | `objects/obj_grid/obj_grid.yy` |
| Include in Repository | Yes |
| Asset Type | GAME OBJECT DEFINITION |
| CI Type | chore |
| CI Scope | config |
| Managed | Automatic |

#### Asset Purpose - [obj_grid.yy]

Defines the obj_grid GameMaker object.

#### Asset Contents Description - [obj_grid.yy]

Contains event bindings, object properties, and resource references.

---

[Back to top](#grid-utility-project-programmers-manual)

---

### OBJECT STEP SCRIPT [STEP_0.GML] 📄

#### Attribute Table - [step_0.gml]

| Attribute | Value |
| --- | --- |
| Asset Name | `Step_0.gml` |
| Relative Path | `objects/obj_grid/Step_0.gml` |
| Include in Repository | Yes |
| Asset Type | GAME SCRIPT |
| CI Type | feat |
| CI Scope | core |
| Managed | Manual |

#### Asset Purpose - [step_0.gml]

Processes per-frame logic for the grid.

#### Asset Contents Description - [step_0.gml]

Updates grid state, input handling, and real-time interactions.

---

[Back to top](#grid-utility-project-programmers-manual)

---

### PLATFORM SPECIFIC OPTIONS [OPTIONS] 📁

#### Attribute Table - [options]

| Attribute | Value |
| --- | --- |
| Asset Name | `options/` |
| Relative Path | `options/` |
| Include in Repository | Yes |
| Asset Type | FOLDER |
| CI Type | chore |
| CI Scope | config |
| Managed | Manual |

#### Asset Purpose - [options]

Contains platform-specific build and export configuration folders.

#### Asset Contents Description - [options]

Subfolders include `android/`, `html5/`, `ios/`, `linux/`, `mac/`, `main/`, `operagx/`, `tvos/`, and `windows/`.

---

[Back to top](#grid-utility-project-programmers-manual)

---

### ANDROID PLATFORM SPECIFIC OPTIONS [ANDROID] 📁

#### Attribute Table - [android]

| Attribute | Value |
| --- | --- |
| Asset Name | `options/android/` |
| Relative Path | `options/android/` |
| Include in Repository | Yes |
| Asset Type | FOLDER |
| CI Type | chore |
| CI Scope | config |
| Managed | Manual |

#### Asset Purpose - [android]

Holds Android-specific option files and configuration.

#### Asset Contents Description - [android]

Contains `options_android.yy`.

---

[Back to top](#grid-utility-project-programmers-manual)

---

### ANDROID PLATFORM SPECIFIC OPTIONS [OPTIONS_ANDROID.YY] 📄

#### Attribute Table - [options_android.yy]

| Attribute | Value |
| --- | --- |
| Asset Name | `options_android.yy` |
| Relative Path | `options/android/options_android.yy` |
| Include in Repository | Yes |
| Asset Type | PLATFORM CONFIG |
| CI Type | chore |
| CI Scope | config |
| Managed | Manual |

#### Asset Purpose - [options_android.yy]

Defines Android platform build settings.

#### Asset Contents Description - [options_android.yy]

Contains SDK paths, permissions, orientation, and packaging settings.

---

[Back to top](#grid-utility-project-programmers-manual)

---

### HTML5 PLATFORM SPECIFIC OPTIONS [HTML5] 📁

#### Attribute Table - [html5]

| Attribute | Value |
| --- | --- |
| Asset Name | `options/html5/` |
| Relative Path | `options/html5/` |
| Include in Repository | Yes |
| Asset Type | FOLDER |
| CI Type | chore |
| CI Scope | config |
| Managed | Manual |

#### Asset Purpose - [html5]

Holds HTML5 export configuration files.

#### Asset Contents Description - [html5]

Contains `options_html5.yy`.

---

[Back to top](#grid-utility-project-programmers-manual)

---

### HTML5 PLATFORM SPECIFIC OPTIONS [OPTIONS_HTML5.YY] 📄

#### Attribute Table - [options_html5.yy]

| Attribute | Value |
| --- | --- |
| Asset Name | `options_html5.yy` |
| Relative Path | `options/html5/options_html5.yy` |
| Include in Repository | Yes |
| Asset Type | PLATFORM CONFIG |
| CI Type | chore |
| CI Scope | config |
| Managed | Manual |

#### Asset Purpose - [options_html5.yy]

Defines HTML5 export configuration.

#### Asset Contents Description - [options_html5.yy]

Browser compatibility, canvas sizing, and build optimization settings.

---

[Back to top](#grid-utility-project-programmers-manual)

---

### IOS PLATFORM SPECIFIC OPTIONS [IOS] 📁

#### Attribute Table - [ios]

| Attribute | Value |
| --- | --- |
| Asset Name | `options/ios/` |
| Relative Path | `options/ios/` |
| Include in Repository | Yes |
| Asset Type | FOLDER |
| CI Type | chore |
| CI Scope | config |
| Managed | Manual |

#### Asset Purpose - [ios]

Holds iOS-specific option files.

#### Asset Contents Description - [ios]

Contains `options_ios.yy`.

---

[Back to top](#grid-utility-project-programmers-manual)

---

### IOS PLATFORM SPECIFIC OPTIONS [OPTIONS_IOS.YY] 📄

#### Attribute Table - [options_ios.yy]

| Attribute | Value |
| --- | --- |
| Asset Name | `options_ios.yy` |
| Relative Path | `options/ios/options_ios.yy` |
| Include in Repository | Yes |
| Asset Type | PLATFORM CONFIG |
| CI Type | chore |
| CI Scope | config |
| Managed | Manual |

#### Asset Purpose - [options_ios.yy]

Defines iOS deployment configuration.

#### Asset Contents Description - [options_ios.yy]

Bundle identifiers, provisioning profiles, and device orientation rules.

---

[Back to top](#grid-utility-project-programmers-manual)

---

### LINUX PLATFORM SPECIFIC OPTIONS [LINUX] 📁

#### Attribute Table - [linux]

| Attribute | Value |
| --- | --- |
| Asset Name | `options/linux/` |
| Relative Path | `options/linux/` |
| Include in Repository | Yes |
| Asset Type | FOLDER |
| CI Type | chore |
| CI Scope | config |
| Managed | Manual |

#### Asset Purpose - [linux]

Holds Linux build configuration files.

#### Asset Contents Description - [linux]

Contains `options_linux.yy`.

---

[Back to top](#grid-utility-project-programmers-manual)

---

### LINUX PLATFORM SPECIFIC OPTIONS [OPTIONS_LINUX.YY] 📄

#### Attribute Table - [options_linux.yy]

| Attribute | Value |
| --- | --- |
| Asset Name | `options_linux.yy` |
| Relative Path | `options/linux/options_linux.yy` |
| Include in Repository | Yes |
| Asset Type | PLATFORM CONFIG |
| CI Type | chore |
| CI Scope | config |
| Managed | Manual |

#### Asset Purpose - [options_linux.yy]

Defines Linux platform build configuration.

#### Asset Contents Description - [options_linux.yy]

Executable format, packaging, and runtime behaviour settings.

---

[Back to top](#grid-utility-project-programmers-manual)

---

### MAC PLATFORM SPECIFIC OPTIONS [MAC] 📁

#### Attribute Table - [mac]

| Attribute | Value |
| --- | --- |
| Asset Name | `options/mac/` |
| Relative Path | `options/mac/` |
| Include in Repository | Yes |
| Asset Type | FOLDER |
| CI Type | chore |
| CI Scope | config |
| Managed | Manual |

#### Asset Purpose - [mac]

Holds macOS build configuration files.

#### Asset Contents Description - [mac]

Contains `options_mac.yy`.

---

[Back to top](#grid-utility-project-programmers-manual)

---

### MAC PLATFORM SPECIFIC OPTIONS [OPTIONS_MAC.YY] 📄

#### Attribute Table - [options_mac.yy]

| Attribute | Value |
| --- | --- |
| Asset Name | `options_mac.yy` |
| Relative Path | `options/mac/options_mac.yy` |
| Include in Repository | Yes |
| Asset Type | PLATFORM CONFIG |
| CI Type | chore |
| CI Scope | config |
| Managed | Manual |

#### Asset Purpose - [options_mac.yy]

Defines macOS export configuration.

#### Asset Contents Description - [options_mac.yy]

Bundle signing, notarization, and build metadata.

---

[Back to top](#grid-utility-project-programmers-manual)

---

### GENERIC TARGET OPTIONS [MAIN] 📁

#### Attribute Table - [main]

| Attribute | Value |
| --- | --- |
| Asset Name | `options/main/` |
| Relative Path | `options/main/` |
| Include in Repository | Yes |
| Asset Type | FOLDER |
| CI Type | chore |
| CI Scope | config |
| Managed | Manual |

#### Asset Purpose - [main]

Holds core project-wide option files.

#### Asset Contents Description - [main]

Contains `options_main.yy`.

---

[Back to top](#grid-utility-project-programmers-manual)

---

### GENERIC PLATFORM OPTIONS [OPTIONS_MAIN.YY] 📄

#### Attribute Table - [options_main.yy]

| Attribute | Value |
| --- | --- |
| Asset Name | `options_main.yy` |
| Relative Path | `options/main/options_main.yy` |
| Include in Repository | Yes |
| Asset Type | CORE CONFIG |
| CI Type | chore |
| CI Scope | config |
| Managed | Manual |

#### Asset Purpose - [options_main.yy]

Defines core project-wide settings.

#### Asset Contents Description - [options_main.yy]

Application name, versioning, orientation, and global runtime behaviour.

---

[Back to top](#grid-utility-project-programmers-manual)

---

### OPERAGX PLATFORM SPECIFIC OPTIONS [OPERAGX] 📁

#### Attribute Table - [operagx]

| Attribute | Value |
| --- | --- |
| Asset Name | `options/operagx/` |
| Relative Path | `options/operagx/` |
| Include in Repository | Yes |
| Asset Type | FOLDER |
| CI Type | chore |
| CI Scope | config |
| Managed | Manual |

#### Asset Purpose - [operagx]

Holds Opera GX specific export configuration.

#### Asset Contents Description - [operagx]

Contains `options_operagx.yy`.

---

[Back to top](#grid-utility-project-programmers-manual)

---

### OPERAGX PLATFORM SPECIFIC OPTIONS [OPTIONS_OPERAGX.YY] 📄

#### Attribute Table - [options_operagx.yy]

| Attribute | Value |
| --- | --- |
| Asset Name | `options_operagx.yy` |
| Relative Path | `options/operagx/options_operagx.yy` |
| Include in Repository | Yes |
| Asset Type | PLATFORM CONFIG |
| CI Type | chore |
| CI Scope | config |
| Managed | Manual |

#### Asset Purpose - [options_operagx.yy]

Defines Opera GX platform configuration.

#### Asset Contents Description - [options_operagx.yy]

GX.games export rules, sandboxing, and storefront metadata.

---

[Back to top](#grid-utility-project-programmers-manual)

---

### TVOS PLATFORM SPECIFIC OPTIONS [TVOS] 📁

#### Attribute Table - [tvos]

| Attribute | Value |
| --- | --- |
| Asset Name | `options/tvos/` |
| Relative Path | `options/tvos/` |
| Include in Repository | Yes |
| Asset Type | FOLDER |
| CI Type | chore |
| CI Scope | config |
| Managed | Manual |

#### Asset Purpose - [tvos]

Holds Apple tvOS specific option files.

#### Asset Contents Description - [tvos]

Contains `options_tvos.yy`.

---

[Back to top](#grid-utility-project-programmers-manual)

---

### TVOS PLATFORM SPECIFIC OPTIONS [OPTIONS_TVOS.YY] 📄

#### Attribute Table - [options_tvos.yy]

| Attribute | Value |
| --- | --- |
| Asset Name | `options_tvos.yy` |
| Relative Path | `options/tvos/options_tvos.yy` |
| Include in Repository | Yes |
| Asset Type | PLATFORM CONFIG |
| CI Type | chore |
| CI Scope | config |
| Managed | Manual |

#### Asset Purpose - [options_tvos.yy]

Defines Apple tvOS platform configuration.

#### Asset Contents Description - [options_tvos.yy]

Remote control mapping, resolution, and app store metadata.

---

[Back to top](#grid-utility-project-programmers-manual)

---

### WINDOWS PLATFORM SPECIFIC OPTIONS [WINDOWS] 📁

#### Attribute Table - [windows]

| Attribute | Value |
| --- | --- |
| Asset Name | `options/windows/` |
| Relative Path | `options/windows/` |
| Include in Repository | Yes |
| Asset Type | FOLDER |
| CI Type | chore |
| CI Scope | config |
| Managed | Manual |

#### Asset Purpose - [windows]

Holds Windows-specific option files, icons, installer, and splash resources.

#### Asset Contents Description - [windows]

Contains `icons/`, `installer/`, `splash/`, and `options_windows.yy`.

---

[Back to top](#grid-utility-project-programmers-manual)

---

### WINDOWS PLATFORM SPECIFIC ICONS [ICONS] 📁

#### Attribute Table - [icons]

| Attribute | Value |
| --- | --- |
| Asset Name | `options/windows/icons/` |
| Relative Path | `options/windows/icons/` |
| Include in Repository | Yes |
| Asset Type | FOLDER |
| CI Type | chore |
| CI Scope | ui |
| Managed | Manual |

#### Asset Purpose - [icons]

Holds Windows-specific icon files.

#### Asset Contents Description - [icons]

Contains `icon.ico`.

---

[Back to top](#grid-utility-project-programmers-manual)

---

### WINDOWS PLATFORM SPECIFIC ICON [ICON.ICO] 📄

#### Attribute Table - [icon.ico]

| Attribute | Value |
| --- | --- |
| Asset Name | `icon.ico` |
| Relative Path | `options/windows/icons/icon.ico` |
| Include in Repository | Yes |
| Asset Type | BINARY ASSET |
| CI Type | chore |
| CI Scope | ui |
| Managed | Manual |

#### Asset Purpose - [icon.ico]

Defines the Windows application icon.

#### Asset Contents Description - [icon.ico]

Embedded ICO image used for executable branding.

---

[Back to top](#grid-utility-project-programmers-manual)

---

### WINDOWS PLATFORM SPECIFIC INSTALLER GRAPHICS [INSTALLER] 📁

#### Attribute Table - [installer]

| Attribute | Value |
| --- | --- |
| Asset Name | `options/windows/installer/` |
| Relative Path | `options/windows/installer/` |
| Include in Repository | Yes |
| Asset Type | FOLDER |
| CI Type | chore |
| CI Scope | ui |
| Managed | Manual |

#### Asset Purpose - [installer]

Holds Windows-specific splash screen graphic files.

#### Asset Contents Description - [installer]

Contains `header.bmp`.

---

[Back to top](#grid-utility-project-programmers-manual)

---

### WINDOWS PLATFORM SPECIFIC INSTALLER HEADER IMAGE [HEADER.BMP] 📄

#### Attribute Table - [header.bmp]

| Attribute | Value |
| --- | --- |
| Asset Name | `header.bmp` |
| Relative Path | `options/windows/installer/header.bmp` |
| Include in Repository | Yes |
| Asset Type | BINARY ASSET |
| CI Type | chore |
| CI Scope | ui |
| Managed | Manual |

#### Asset Purpose - [header.bmp]

Defines the installer banner graphic.

#### Asset Contents Description - [header.bmp]

Bitmap image displayed in the Windows installer UI.

---

[Back to top](#grid-utility-project-programmers-manual)

---

### WINDOWS PLATFORM SPECIFIC OPTIONS [OPTIONS_WINDOWS.YY] 📄

#### Attribute Table - [options_windows.yy]

| Attribute | Value |
| --- | --- |
| Asset Name | `options_windows.yy` |
| Relative Path | `options/windows/options_windows.yy` |
| Include in Repository | Yes |
| Asset Type | PLATFORM CONFIG |
| CI Type | chore |
| CI Scope | config |
| Managed | Manual |

#### Asset Purpose - [options_windows.yy]

Defines Windows platform build configuration.

#### Asset Contents Description - [options_windows.yy]

Executable type, DPI awareness, sandbox settings, and packaging rules.

---

[Back to top](#grid-utility-project-programmers-manual)

---

### WINDOWS PLATFORM SPECIFIC SPLASH SCREEN GRAPHICS [SPLASH] 📁

#### Attribute Table - [splash]

| Attribute | Value |
| --- | --- |
| Asset Name | `options/windows/splash/` |
| Relative Path | `options/windows/splash/` |
| Include in Repository | Yes |
| Asset Type | FOLDER |
| CI Type | chore |
| CI Scope | ui |
| Managed | Manual |

#### Asset Purpose - [splash]

Holds Windows-specific installer graphic files.

#### Asset Contents Description - [splash]

Contains `splash.png`.

---

[Back to top](#grid-utility-project-programmers-manual)

---

### WINDOWS PLATFORM SPECIFIC SPLASH IMAGE [SPLASH.PNG] 📄

#### Attribute Table - [splash.png]

| Attribute | Value |
| --- | --- |
| Asset Name | `splash.png` |
| Relative Path | `options/windows/splash/splash.png` |
| Include in Repository | Yes |
| Asset Type | PNG |
| CI Type | chore |
| CI Scope | ui |
| Managed | Manual |

#### Asset Purpose - [splash.png]

Defines the Windows splash screen image.

#### Asset Contents Description - [splash.png]

Startup image displayed during application initialization.

---

[Back to top](#grid-utility-project-programmers-manual)

---

### README DOCUMENTATION [README.MD] 📄

#### Attribute Table - [readme.md]

| Attribute | Value |
| --- | --- |
| Asset Name | `README.md` |
| Relative Path | `README.md` |
| Include in Repository | Yes |
| Asset Type | DOCUMENT |
| CI Type | docs |
| CI Scope | core |
| Managed | Manual |

#### Asset Purpose - [readme.md]

Primary project overview and entry documentation.

#### Asset Contents Description - [readme.md]

Describes the project, setup instructions, usage, and high-level architecture.

---

[Back to top](#grid-utility-project-programmers-manual)

---

### CHECK COMMIT SIGNATURE [SIGNED-OFF-BY-REGEX.JS] 📄

#### Attribute Table — [signed-off-by-regex.js]

| Attribute | Value |
| --- | --- |
| Asset Name | `signed-off-by-regex.js` |
| Relative Path | `signed-off-by-regex.js` |
| Include in Repository | Yes |
| Asset Type | JavaScript |
| CI Type | ci |
| CI Scope | config |

#### Asset Purpose — [signed-off-by-regex.js]

Ensure the commit message contains a signature.

#### Asset Contents Description — [signed-off-by-regex.js]

A script runs a RegEx pattern to check if the commit message contains a valid commit.

---

[Back to top](#grid-utility-project-programmers-manual)

---

### ROOMS [ROOMS] 📁

#### Attribute Table - [rooms]

| Attribute | Value |
| --- | --- |
| Asset Name | `rooms` |
| Relative Path | `rooms/` |
| Include in Repository | Yes |
| Asset Type | FOLDER |
| CI Type | feat |
| CI Scope | core |
| Managed | Manual |

#### Asset Purpose - [rooms]

Holds GameMaker room data.

#### Asset Contents Description - [rooms]

Contains `rm_main/`.

---

[Back to top](#grid-utility-project-programmers-manual)

---

### MAIN ROOM [RM_MAIN] 📁

#### Attribute Table - [rm_main]

| Attribute | Value |
| --- | --- |
| Asset Name | `rm_main` |
| Relative Path | `rm_main/` |
| Include in Repository | Yes |
| Asset Type | FOLDER |
| CI Type | feat |
| CI Scope | core |
| Managed | Manual |

#### Asset Purpose - [rm_main]

Holds main room configuration data.

#### Asset Contents Description - [rm_main]

Contains `rm_main.yy`.

---

[Back to top](#grid-utility-project-programmers-manual)

---

### MAIN ROOM DEFINITION [RM_MAIN.YY] 📄

#### Attribute Table - [rm_main.yy]

| Attribute | Value |
| --- | --- |
| Asset Name | `rm_main.yy` |
| Relative Path | `rooms/rm_main/rm_main.yy` |
| Include in Repository | Yes |
| Asset Type | GAME ROOM |
| CI Type | chore |
| CI Scope | config |
| Managed | Manual |

#### Asset Purpose - [rm_main.yy]

Defines the primary runtime room for the application.

#### Asset Contents Description - [rm_main.yy]

Stores room dimensions, instances, layers, and initialization order.

---

[Back to top](#grid-utility-project-programmers-manual)

---

### SPRITES [SPRITES] 📁

#### Attribute Table - [sprites]

| Attribute | Value |
| --- | --- |
| Asset Name | `sprites` |
| Relative Path | `sprites/` |
| Include in Repository | Yes |
| Asset Type | FOLDER |
| CI Type | feat |
| CI Scope | N/A |
| Managed | N/A |

#### Asset Purpose - [sprites]

Holds GameMaker sprite data.

#### Asset Contents Description - [sprites]

The following folder contains a number of files GameMaker uses internally and would be too cumbersome
to manage individually. Therefor this section lists all sub-folders and sprite assets contained in it, here.

##### PLACEHOLDER SPRITE EXAMPLE

The following sprite is used as a sample to demonstrate how you can pass an array of grid data to the grid constructor.

- sprites/spr_sample
- sprites/spr_sample/layers
- sprites/spr_sample/layers/3f9af696-6511-4ecf-be82-68efd9bdb65f
- sprites/spr_sample/layers/6201bddf-caf8-4b88-9546-0e3b74071117
- sprites/spr_sample/layers/4564711b-85eb-43f8-8b20-d7f5f8fc7d4e
- sprites/spr_sample/3f9af696-6511-4ecf-be82-68efd9bdb65f.png
- sprites/spr_sample/6201bddf-caf8-4b88-9546-0e3b74071117.png
- sprites/spr_sample/4564711b-85eb-43f8-8b20-d7f5f8fc7d4e.png
- sprites/spr_sample/spr_sample.yy
- sprites/spr_sample/layers/3f9af696-6511-4ecf-be82-68efd9bdb65f/74c94b6d-008d-4a8b-8e00-1950c9f914de.png
- sprites/spr_sample/layers/6201bddf-caf8-4b88-9546-0e3b74071117/74c94b6d-008d-4a8b-8e00-1950c9f914de.png
- sprites/spr_sample/layers/4564711b-85eb-43f8-8b20-d7f5f8fc7d4e/74c94b6d-008d-4a8b-8e00-1950c9f914de.png

---

[Back to top](#grid-utility-project-programmers-manual)

---
