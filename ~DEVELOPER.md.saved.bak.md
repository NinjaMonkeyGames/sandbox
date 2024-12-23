# Markdownlint-Cli2 CI/CD Pipeline Docker Project Programmers Manual

## PROJECT ASSETS

This section of the document details every file in the project with a description of what it does.

**Asset Name** : *The name of the file or folder.*

**Relative Path** : *The name of the file or folder.*

**Hidden** : *Hidden folders are prefixed with a dot. If the parent folder is hidden it will be marked as inherited.*

**Include in Repository** : *Indicates if the asset is included in the GitHub repository.*

**Asset Type** : *This will either be set to 'FOLDER' or the file extension I.E PNG, JSON, MD.*

**Asset Contents Description** : This describes the contents of each file of folder in more detail. If the file
contains code then this will be broken down and explained in full.

---

### artefact FOLDER

| Attribute             | Value        |
|-----------------------|--------------|
| Asset Name            | .artefact   |
| Relative Path         | .artefact   |
| Hidden                | Yes          |
| Include in Repository | Yes          |
| Asset Type            | FOLDER       |

 **Asset Contents Description** : The '.artefact' folder contains files that are used throughout the CI/CD pipeline
 process.

 ---

### LOGO

| Attribute             | Value      |
|-----------------------|------------|
| Asset Name            | logo.png   |
| Relative Path         | .artefact |
| Hidden                | Inherited  |
| Include in Repository | Yes        |
| Asset Type            | PNG        |

**Asset Contents Description** : This file contains the NinjaMonkeyGames™ logo. This logo is used in internal markdown
 files for branding purposes. This is a PNG logo that measures 64px x 64px.

**Purpose** : Brand identification.

---

### AVATAR

| Attribute             | Value                        |
|-----------------------|------------------------------|
| Asset Name            | monkey-knuckles-avatar.png   |
| Relative Path         | .artefact                   |
| Hidden                | Inherited                    |
| Include in Repository | Yes                          |
| Asset Type            | PNG                          |

**Asset Contents Description** : This is the avatar for developer (Monkey Knuckles). This is a PNG logo that measures
64px x 64px.

 ℹ *If you are a new developer and you have made a contribution to this project you should add your own avatar to the*
 *project and update the relevant parts of the documentation. See 'CONTRIBUTING.md'.*

 **Purpose** : Avatars provide a way for developers to get credit acknowledgment for the work they have done.

---

### CONFIG FOLDER

| Attribute             | Value      |
|-----------------------|------------|
| Asset Name            | .config    |
| Relative Path         | .config    |
| Hidden                | Yes        |
| Include in Repository | Yes        |
| Asset Type            | FOLDER     |

 **Asset Contents Description** : Contains configuration files for internal VSC plugins.

 ---

### MARKDOWNLINT-CLI2 CONFIGURATION FILE

| Attribute             | Value                        |
|-----------------------|------------------------------|
| Asset Name            | .markdownlint.jsonc          |
| Relative Path         | .config                      |
| Hidden                | Yes                          |
| Include in Repository | Yes                          |
| Asset Type            | JSONC                        |

**Asset Contents Description** : This file contains the rule set for the markdownlint plugin. There are 49 different
rules. Each rule has an 'md' number.

**Purpose** : The purposes of this file it to modify the default settings of markdownlint. This will ensure the
consistent formatting of markdown files throughout the project.

***Default*** : Sets default setting value to true unless otherwise specified.

***Extends*** : Provides a path to inherit global markdown rules from. This is not used in this project and hence is set
to null.

```json
"default": true, // Set defaults for all rules as true by default.
"extends": null, // Explicitly specifies there are no extended configurations.
```

| Rule Code | Sub-setting Description | Value              |
|-----------|-------------------------|--------------------|
| MD001     |                         | True               |
| MD003     | style                   | consistent         |
| MD004     | style                   | consistent         |
| MD005     |                         | true               |
| MD007     | indent                  | 2                  |
| MD007     | start_indented          | true               |
| MD007     | start_indent            | 2                  |
| MD009     | br_spaces               | 2                  |
| MD009     | list_item_empty_lines   | false              |
| MD009     | strict                  | true               |
| MD010     | code_blocks             | true               |
| MD010     | ignore_code_languages   |                    |
| MD010     | spaces_per_tab          | 1                  |
| MD011     |                         | true               |
| MD012     | maximum                 | 1                  |
| MD013     | line_length             | 120                |
| MD013     | heading_line_length     | 120                |
| MD013     | code_block_line_length  | 120                |
| MD013     | code_blocks             | true               |
| MD013     | tables                  | true               |
| MD013     | headings                | true               |
| MD013     | strict                  | true               |
| MD013     | stern                   | true               |
| MD014     |                         | true               |
| MD018     |                         | true               |
| MD019     |                         | true               |
| MD020     |                         | true               |
| MD021     |                         | true               |
| MD022     | lines_above             | 1                  |
| MD022     | lines_below             | 1                  |
| MD023     |                         | true               |
| MD024     | siblings_only           | false              |
| MD025     | level                   | 1                  |
| MD025     | front_matter_title      | ^\\s*title\\s*[:=] |
| MD026     | punctuation             | .,;:!。，；：！     |
| MD027     |                         | true               |
| MD028     |                         | true               |
| MD029     | style                   | one_or_ordered     |
| MD030     | ul_single               | 1                  |
| MD030     | ol_single               | 1                  |
| MD030     | ul_multi                | 1                  |
| MD030     | ol_multi                | 1                  |
| MD031     | list_items              | true               |
| MD032     |                         | true               |
| MD033     | allowed_elements        |                    |
| MD034     |                         | true               |
| MD035     | style                   | consistent         |
| MD036     | punctuation             | .,;:!?。，；：！？  |
| MD037     |                         | true               |
| MD038     |                         | true               |
| MD039     |                         | true               |
| MD040     | allowed_languages       |                    |
| MD040     | language_only           | false              |
| MD041     | level                   | 1                  |
| MD041     | front_matter_title      | ^\\s*title\\s*[:=] |
| MD042     |                         | true               |
| MD044     | names                   | JavaScript         |
| MD044     | code_blocks             | true               |
| MD044     | html_elements           | true               |
| MD045     |                         | true               |
| MD046     | style                   | consistent         |
| MD047     |                         | true               |
| MD048     | style                   | consistent         |
| MD049     | style                   | consistent         |
| MD050     | style                   | consistent         |
| MD051     |                         | true               |
| MD052     | shortcut_syntax         | false              |
| MD053     | ignored_definitions     | //                 |
| MD054     | autolink                | true               |
| MD054     | inline                  | true               |
| MD054     | full                    | true               |
| MD054     | collapsed               | true               |
| MD054     | shortcut                | true               |
| MD054     | url_inline              | true               |
| MD055     | style                   | consistent         |
| MD056     |                         | true               |

---

### GIT FOLDER

| Attribute             | Value      |
|-----------------------|------------|
| Asset Name            | .git       |
| Relative Path         | .git       |
| Hidden                | Yes        |
| Include in Repository | Yes        |
| Asset Type            | FOLDER     |

 **Asset Contents Description** : This folder is managed by Git and should not be be modified under normal
 circumstances.

---
