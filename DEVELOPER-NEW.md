# Markdownlint-Cli2 CI/CD Pipeline Docker Project Programmers Manual

This document is a reference-guide for programmers. It provides a comprehensive list of all assets contained within the
project.

This includes detailed API descriptions and asset code breakdown.

This reference manual focuses on the project structure and logic.

This document does not cover documentation style guidelines or contribution policies. For that see, 'CONTRIBUTING.md'.

ℹ Please review 'CONTRIBUTING.md' carefully, as it contains important information on how to contribute to this
repository and how to update the documentation correctly.

---

## TABLE OF CONTENTS

< Place holder for the table of contents (TOC) to be generated once the document is complete >

---

## TARGET AUDIENCE

This document is for developers actively working on this project.

## PROJECT PURPOSE

The purpose of this program is to provide a Docker container setup that will lint Markdown files as part of a
[CI/CD](#glossary)
workflow.

## PROJECT ASSETS

### FILE TREE VIEW

< Paste file tree at the end >

### ARTEFACTS [.ARTEFACTS] 📁

#### Attribute Table : [.artefacts Folder]

| Attribute             | Value        |
|-----------------------|--------------|
| Asset Name            | .artefacts   |
| Relative Path         | ./           |
| Hidden                | Yes          |
| Include in Repository | Yes          |
| Managed               | Yes          |
| Resolution            | N/A          |
| Asset Type            | FOLDER       |
| Asset File Size       | N/A          |

#### Asset Purpose : [Artefacts Folder]

Store artefacts that are used throughout the CI/CD process but not necessarily apart of the project itself. This keeps
everything internal to the CI/CD process.

#### Asset Contents Description : [Artefacts Folder]

The '.artefacts' folder contains files such as logos, logs and other files that are used throughout the
[CI/CD](#glossary) pipeline process.

---

[BACK TO TOP](#markdownlint-cli2-cicd-pipeline-docker-project-programmers-manual)

---

### LOGO [LOGO.PNG] 📄

#### Attribute Table : [logo.png]

| Attribute             | Value       |
|-----------------------|-------------|
| Asset Name            | logo.png    |
| Relative Path         | .artefacts  |
| Hidden                | Inherited   |
| Include in Repository | Yes         |
| Managed               | Yes         |
| Resolution            | 32px x 32px |
| Asset Type            | PNG         |
| Asset File Size       | 5,746 bytes |

 ℹ *The purpose of having the exact file size recorded in bytes is because it provides an extra way to ensure document
 integrity is being maintained when changes are made to files. If the file size is different to what is being reported
 in the documentation then it is very likely that the document was not updated when the developer modified the file or
 the job was not done correctly.*

#### Asset Purpose : [logo.png]

Brand identification. This logo is used in internal markdown files for branding purposes.

#### Asset Contents Description : [logo.png]

This file contains the NinjaMonkeyGames™ logo.

![Company Logo](.artefacts/logo.png)

---

[BACK TO TOP](#markdownlint-cli2-cicd-pipeline-docker-project-programmers-manual)

---

### MONKEY KNUCKLES AVATAR [MONKEY-KNUCKLES-AVATAR.PNG] 📄

#### Attribute Table : [monkey-knuckles-avatar.png]

| Attribute             | Value                         |
|-----------------------|-------------------------------|
| Asset Name            | monkey-knuckles-avatar.png    |
| Relative Path         | .artefacts                    |
| Hidden                | Inherited                     |
| Include in Repository | Yes                           |
| Managed               | Yes                           |
| Resolution            | 32px x 32px                   |
| Asset Type            | PNG                           |
| Asset File Size       | 8,717 bytes                   |

#### Asset Purpose : [monkey-knuckles-avatar.png]

Developer identification and contribution recognition.

#### Asset Contents Description : [monkey-knuckles-avatar.png]

This file contains Developer avatar for 'Monkey Knuckles'.

 ℹ *If you are a new developer and you have made a contribution to this project you should add your own avatar to the*
 *project and update the relevant parts of the documentation. See 'CONTRIBUTING.md'.*

 ![Monkey Knuckles Avatar](.artefacts/monkey-knuckles-avatar.png)

 ---

[BACK TO TOP](#markdownlint-cli2-cicd-pipeline-docker-project-programmers-manual)

---

### CONFIGURATION [FOLDER] 📁

#### Attribute Table : [Configuration Folder]

| Attribute             | Value       |
|-----------------------|-------------|
| Asset Name            | .config     |
| Relative Path         | ./          |
| Hidden                | Inherited   |
| Include in Repository | Yes         |
| Managed               | Yes         |
| Resolution            | N/A         |
| Asset Type            | FOLDER      |
| Asset File Size       | N/A         |

#### Asset Purpose : [Configuration Folder]

Keeps as a many config files as possible out of the root directory.

#### Asset Contents Description : [Configuration Folder]

Contains configuration files for various [IDE](#glossary) plugins.

---

[BACK TO TOP](#markdownlint-cli2-cicd-pipeline-docker-project-programmers-manual)

---

### MARKDOWNLINT CONFIGURATION FILE [.MARKDOWNLINT.JSONC] 📄

#### Attribute Table : [.markdownlint.jsonc]

| Attribute             | Value                   |
|-----------------------|-------------------------|
| Asset Name            | .markdownlint.jsonc     |
| Relative Path         | .config                 |
| Hidden                | Yes                     |
| Include in Repository | Yes                     |
| Managed               | Yes                     |
| Resolution            | N/A                     |
| Asset Type            | JSONC                   |
| Asset File Size       | 10,470 bytes            |

#### Asset Purpose : [.markdownlint.jsonc]

To maintain consistent markdown formatting(linting) throughout the project.

#### Asset Contents Description : [.markdownlint.jsonc]

Contains a list of rules written in JSON(C) format that dictate how markdownlint-cli2 will lint markdown files.
There are 49 Different rules. These rules are prefixed with 'MD' followed by a three digit number.

 ℹ *Some of the numbers appear to missing! These are legacy rules that were removed from markdownlint.
 MD002, MD006, MD008, MD014, MD015, MD016, MD0017 have been removed.*

#### Asset Code Breakdown : [.markdownlint.jsonc]

##### Comment block heading list : [.markdownlint.jsonc]

1. Base setup
2. Rule code
    a. Setting
    b. Sub-setting description (If applicable)
    c. Value

##### Base setup : [.markdownlint.jsonc] - [CODE]

```json
// Base Setup

1. "default": true, // Set defaults for all rules as true by default.
2. "extends": null, // Explicitly specifies there are no extended configurations.
```

##### Base setup : [.markdownlint.jsonc] - [CODE DESCRIPTION]

```markdown
1. All rules will be considered true unless the configuration specifically states otherwise.
2. This is set to null because this is the only configuration file that will be used in this project.
```

##### markdownlint-cli2 Configuration File, Rule Table : [.markdownlint.jsonc]

The rest of the configuration has been entered in the form of a table for legibility purposes.

See. [Markdown Rules][1]

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
| MD026     | punctuation             | .,;:!。，；：！    |
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
| MD036     | punctuation             | .,;:!?。，；：！？ |
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

[BACK TO TOP](#markdownlint-cli2-cicd-pipeline-docker-project-programmers-manual)

---

### COMMIT LINT CONFIGURATION FILE [COMMITLINT.CONFIG.JS] 📄

#### Attribute Table : [commitlint.config.js]

| Attribute             | Value                 |
|-----------------------|-----------------------|
| Asset Name            | commitlint.config.js  |
| Relative Path         | .config               |
| Hidden                | Inherited             |
| Include in Repository | Yes                   |
| Managed               | Yes                   |
| Resolution            | N/A                   |
| Asset Type            | JavaScript            |
| Asset File Size       | 2,626 bytes           |

#### Asset Purpose : [commitlint.config.js]

Maintains the repository integrity buy ensuring conventional commit standards are being adhered to.

#### Asset Contents Description : [commitlint.config.js]

Contains linting rules pertaining to the conventional commit standards.

See. [Conventional Commits Standard][2]

##### Settings table: [commit.config.js]

| Setting           | Affect                                              |
|-------------------|-----------------------------------------------------|
| extends           | Extend configuration to conventional commits        |
| rules             | Defines a list of commitlint rules                  |
| header-max-length | Limit header length to 72 characters                |
| type-empty        | Disallow empty types in commit messages             |
| subject-empty     | Disallow empty subjects in commit messages          |
| scope-empty       | Require a scope for commits                         |

##### Type enumeration table : [commitlint.config.js]

| Type          | Type Descriptions                                       |
|---------------|---------------------------------------------------------|
| feat          | New feature                                             |
| fix           | Bug fix                                                 |
| docs          | Documentation Changes                                   |
| style         | Code style changes (formatting, etc., no code change)   |
| refactor      | Refactor without adding new features or fixing bugs     |
| perf          | Performance improvements                                |
| test          | Adding or updating tests                                |
| build         | Changes to build system or dependencies                 |
| security      | Security fixes                                          |
| ci            | Continuous integration-related changes                  |
| chore         | Other changes that don't modify source or test files    |
| revert        | Reverts a previous commit                               |
| depreciation  | A feature or portion of code has become redundant       |
| accessibility | Updates for better accessibility compliance (e.g., WCAG)|
| analytics     | Changes to analytics or tracking                        |

##### Scope enumeration table : [commitlint.config.js]

| Scope          | Scope Descriptions                                     |
|----------------|--------------------------------------------------------|
| api            | API-related changes                                    |
| ui             | UI-related changes                                     |
| auth           | Authentication changes                                 |
| db             | Database changes                                       |
| deps           | Dependency updates                                     |
| tests          | Test-related changes                                   |
| config         | Configuration updates                                  |

### CPSELL [CSPELL.JSON] 📄

#### Attribute Table : [cspell.json]

| Attribute             | Value        |
|-----------------------|--------------|
| Asset Name            | cspell.json  |
| Relative Path         | .config      |
| Hidden                | Inherited    |
| Include in Repository | Yes          |
| Managed               | Yes          |
| Resolution            | N/A          |
| Asset Type            | JSONC        |
| Asset File Size       | 465 bytes    |

#### Asset Purpose : [cspell.json]

To maintain a professional, constant, error free style throughout all project documents.

#### Asset Contents Description : [cspell.json]

Contains a reference to a British English dictionary and a list of exception words.

---

[BACK TO TOP](#markdownlint-cli2-cicd-pipeline-docker-project-programmers-manual)

---

### GIT [FOLDER] 📁

#### Attribute Table : [Git Folder]

| Attribute             | Value        |
|-----------------------|--------------|
| Asset Name            | .git         |
| Relative Path         | ./           |
| Hidden                | Yes          |
| Include in Repository | Yes          |
| Managed               | No           |
| Resolution            | N/A          |
| Asset Type            | FOLDER       |
| Asset File Size       | N/A          |

#### Asset Purpose : [Git Folder]

Allows Git source control to function.

#### Asset Contents Description : [Git Folder]

 ⚠️ *Modify these files with caution!*

 ℹ *The individual files in this directory will not be listed here because they are managed by Git therefore you should
 defer to the [Git Documentation][3]*
 
---

[BACK TO TOP](#markdownlint-cli2-cicd-pipeline-docker-project-programmers-manual)

---

### GITHUB [FOLDER] 📁

#### Attribute Table : [GitHub Folder]

| Attribute             | Value        |
|-----------------------|--------------|
| Asset Name            | .github      |
| Relative Path         | ./           |
| Hidden                | Yes          |
| Include in Repository | Yes          |
| Managed               | Yes          |
| Resolution            | N/A          |
| Asset Type            | FOLDER       |
| Asset File Size       | N/A          |

#### Asset Purpose : [GitHub Folder]

GitHub Actions relies on this folder for workflow functionality.

#### Asset Contents Description : [GitHub Folder]

Stores files related to the GitHub [CI/CD](#glossary) pipeline and other documentation like template issues.

---

[BACK TO TOP](#markdownlint-cli2-cicd-pipeline-docker-project-programmers-manual)

---

### ISSUE TEMPLATE [FOLDER] 📁

#### Attribute Table : [Issue Template Folder]

| Attribute             | Value           |
|-----------------------|-----------------|
| Asset Name            | ISSUE_TEMPLATE  |
| Relative Path         | .github         |
| Hidden                | Inherited       |
| Include in Repository | Yes             |
| Managed               | Yes             |
| Resolution            | N/A             |
| Asset Type            | FOLDER          |
| Asset File Size       | N/A             |

#### Asset Purpose : [Issue Template Folder]

Enforces consistency when submitting issues and feature requests.

#### Asset Contents Description : [Issue Template Folder]

Contains templates for GitHub issue forms.

##### YAML GitHub Issue Forms Keyword Glossary

⚠️ *Note that the 'required:' key will only work when the project is made public.*

| Ref         | Key | Description                                                          |
|-------------|-----|----------------------------------------------------------------------|
| Name        | 01  |Identifiable name to describe the purpose of the form.                |
| Description | 02  |Describes the function of the form.                                   |
| Title       | 03  |Default title that will be pre-populated in the issue submission form.|
| Labels      | 04  |Identify the type categories the issue belongs.                       |
| Projects    | 05  |Assigns to a specific GitHub project.                                 |
| Body        | 06  |Initialises form.                                                     |
| Type        | 07  |Form element type E.G. text-box, checkbox, dropdown.                  |
| Attributes  | 08  |Specifies sub-settings for a particular element type.                 |
| Label       | 09  |Text appears above form element describing what it is.                |
| Value       | 10  |Sets markdown text.                                                   |
| ID          | 11  |A unique identifier for the field.                                    |
| Placeholder | 12  |Text that appears inside the element itself.                          |
| Validations | 13  |Checks if form is valid before form can be submitted.                 | | Required    | 14  |Determines if field is required to submit the form.                   |
| Options     | 15  |Provides a list of options to select from dropdown box.               |

See. [GitHub issue forms schema syntax documentation][4]



---

[BACK TO TOP](#markdownlint-cli2-cicd-pipeline-docker-project-programmers-manual)

---

### BUG REPORT TEMPLATE [BUG-REPORT-TEMPLATE.YAML] 📄

#### Attribute Table : [bug-report-template.yaml]

| Attribute             | Value                         |
|-----------------------|-------------------------------|
| Asset Name            | bug-report-template.yaml      |
| Relative Path         | .github/ISSUE_TEMPLATE        |
| Hidden                | Inherited                     |
| Include in Repository | Yes                           |
| Managed               | Yes                           |
| Resolution            | N/A                           |
| Asset Type            | YAML                          |
| Asset File Size       | 4,188 bytes                   |

#### Asset Purpose : [bug-report-template.yaml]

Provides a standard structure for reporting bugs.

#### Asset Contents Description : [bug-report-template.yaml]

YAML script that creates a bug submission form for GitHub issues.

#### Asset Code Breakdown : [bug-report-template.yaml]

1. Meta data.
2. Initialise form.
3. Introduction text.
4. Email input.
5. OS selection.
6. Browser selection.
7. Bug type.
8. Severity.
9. Problem summary.
10. Expected behaviour.
11. Steps to reproduce.
12. Actual behaviour.
13. Additional information.
14. Agree to terms.

⚠️ *Note that the 'required:' key will only work when the project is made public.*

##### Meta data : [bug-report-template.yaml] - [CODE]

This section of YAML script provides meta data for the form but is not an element of th form itself.

```yaml
1. name: 🐞 Bug Report
2. description: File a bug report
3. title: "[Bug]: "
4. labels: ["bug", "new"]
5. projects: ["NinjaMonkeyGames/12"]
```

##### Meta data : [bug-report-template.yaml] - [CODE DESCRIPTION]

```markdown
1. name: identifiable name to describe the purpose of the form.
  a. Set name to '🐞 Bug Report'.
  
2. description: describes the function of the form.
  a. Set description to 'File a bug report'.

3. title: default title that will be pre-populated in the issue submission form.
  a. Set default title text to '[Bug]:'.
 
4. labels: identify the type categories the issue belongs.  
  a. Set labels 'bug' and 'new'.
  
5. projects: assigns to a specific GitHub project.   
  a. Set account namespace to 'NinjaMonkeyGames/'.
  b. Set project to 12
```

⚠️ *GitHub used to use project names but the new system uses numerical identifiers.*

##### Initialise form : [bug-report-template.yaml] - [CODE]

```yaml
# Initialise Form

1. body:
```

##### Initialise form : [bug-report-template.yaml] - [CODE DESCRIPTION]

```markdown
1. Tells GitHub the form will begin here.
```

##### Introduction text : [bug-report-template.yaml] - [CODE]

This text appears at the top of the form as a description.

```yaml
# Introduction Text

1.  - type: markdown
2.    attributes:
3.      value: |
4.        Thanks for taking the time to report this issue!
5.        Please take the time to fill out the form carefully.
```

##### Introduction text : [bug-report-template.yaml] - [CODE DESCRIPTION]

```markdown
1. type: form element type E.G. textarea, checkbox, dropdown.
  a. Sets form element type to markdown.

2. attributes: specifies sub-settings for a particular element type.

3. value: sets markdown introduction text.
  a. '|' Indicates multiple lines of text.

4. Set first line of text to 'Thanks for taking the time to report this issue!'.
5. Set second line of text to 'Please fill out the form below to provide detailed information about the bug.'.
```

##### Email input : [bug-report-template.yaml] - [CODE]

This element is a text box that will accept an email address.

```yaml
# Email Input

1.   - type: input
2.     id: contact-email
3.     attributes:
4.       label: Contact Email
5.       description: Please provide an email encase we need to reach you.
6.       placeholder: email@example.com
7.     validations:
8.       required: true
```

##### Email input : [bug-report-template.yaml] - [CODE DESCRIPTION]

```markdown
1. type: form element type E.G. textarea, checkbox, dropdown.
  a. Sets form element type to input.

2. id: a unique identifier for the field.
  a. Set unique identifier to 'contact-email'.

3. attributes: specifies sub-settings for a particular element type.

4. label: text appears above form element describing what it is.
  a. set label text to 'Contact Email'.

5. description: text that describes the function of the form or element.
  a. Set description to 'Please provide an email encase we need to reach you.'.

6. placeholder: text appears inside the element itself. This serves as example data.
  a. Set placeholder to 'email@example.com'.

7. validations: checks if form is valid before form can be submitted.

8. required: determines if field has been filled before it will allow the form to be submitted.
  a. Set validation requirement to true.
```

##### OS Selection : [bug-report-template.yaml] - [CODE]

This is a dropdown form element that allows the user to select the [OS](#glossary) they Are using.

```yaml
# OS Selection

1.  - type: dropdown
2.    id: os
3.    attributes:
4.      label: Operating System
5.      description: What operating system are you using?
6.      options:
7.         - Windows
8.         - macOS
9.         - Linux
10.        - Other
11.     validations:
12.       required: true
```

##### OS Selection : [bug-report-template.yaml] - [CODE DESCRIPTION]

```markdown
1. type: form element type E.G. textarea, checkbox, dropdown.
  a. Sets form element type to dropdown.

2. id: a unique identifier for the field.
  a. Set unique identifier to 'os'.

3. attributes: specifies sub-settings for a particular element type.

4. label: text appears above form element describing what it is.
  a. set label text to 'Operating System'.

5. description: text that describes the function of the element.
  a. Set description to 'What operating system are you using?'.

6.  options: provides a list of options to display in the dropdown box.
7.  List Windows.
8.  List macOS.
9.  List Linux.
10. List Other.

11. validations: checks if form is valid before form can be submitted.
12. required: determines if field has been filled before it will allow the form to be submitted.
  a. Set validation requirement to true.
```

##### Browser selection : [bug-report-template.yaml] - [CODE]

This is a dropdown form element that allows the user to select the browser they Are using.

```yaml
# Browser Selection

1.  - type: dropdown
2.    id: browser
3.    attributes:
4.      label: Browser
5.      description: What browser are you using?
6.      options:
7.        - Chrome
8.        - Firefox
9.        - Safari
10.       - Microsoft Edge
11.       - Opera
12.       - Other
13.    validations:
14.      required: true
```

##### Browser selection : [bug-report-template.yaml] - [CODE DESCRIPTION]

```markdown
1. type: form element type E.G. textarea, checkbox, dropdown.
  a. Sets form element type to dropdown.

2. id: a unique identifier for the field.
  a. Set unique identifier to 'browser'.

3. attributes: specifies sub-settings for a particular element type.

4. label: text appears above form element describing what it is.
  a. set label text to 'Browser'.

5. description: text that describes the function of the element.
  a. Set description to 'What browser are you using?'.

6.  options: provides a list of options to display in the dropdown box.
7.  List 'Chrome'.
8.  List 'Firefox'.
9.  List 'Safari'.
10. List 'Microsoft Edge'.
11. List 'Opera'.
12. List 'Other'.
13. validations: Checks if form is valid before form can be submitted.
14. required: determines if field has been filled before it will allow the form to be submitted.
  a. Set validation requirement to true.
```

##### Bug type : [bug-report-template.yaml] - [CODE]

Allows the user to categorise the scope their bug falls under.

```yaml
# Bug Type

1.  - type: dropdown
2.    id: bug-type
3.    attributes:
4.      label: Bug Type
5.      description: Select the type of issue you are reporting.
6.      options:
7.        - Application Bug
8.        - Documentation Problem
9.    validations:
10.      required: true 
```

##### Bug type : [bug-report-template.yaml] - [CODE DESCRIPTION]

```markdown
1. type: form element type E.G. textarea, checkbox, dropdown.
  a. Sets form element type to dropdown.

2. id: a unique identifier for the field.
  a. Set unique identifier to 'bug-type'.

3. attributes: Specifies sub-settings for a particular element type.

4. label: text appears above form element describing what it is.
  a. set label text to 'Bug Type'.

5. description: text that is displayed below the label and serves as a description to further clarify the purpose of the
form element.
  a. Set description to 'Select the type of issue you are reporting.'.

6. options: provides a list of options to display in the dropdown box.
7. List 'Application Bug'.
8. List 'Documentation Problem'.
9. validations: Checks if form is valid before form can be submitted.

10. required: determines if field has been filled before it will allow the form to be submitted.
  a. Set validation requirement to true.
```

##### Severity : [bug-report-template.yaml] - [CODE]

User can select how serious they consider the bug to be. See. [Common Vulnerability Scoring System SIG][5]

```yaml
# Severity

1.  - type: dropdown
2.    id: severity
3.    attributes:
4.      label: Severity
5.      description: How serious is the problem?
6.      options:
7.        - Low
8.        - Medium
9.        - High
10.       - Critical
11.    validations:
12.      required: true
```

##### Severity : [bug-report-template.yaml] - [CODE DESCRIPTION]

```markdown
1. type: form element type E.G. textarea, checkbox, dropdown.
  a. Sets form element type to dropdown.

2. id: a unique identifier for the field.
  a. Set unique identifier to 'Severity'.

3. attributes: specifies sub-settings for a particular element type.

4. label: Text appears above form element describing what it is.
  a. set label text to 'Severity'.

5. description: text that is displayed below the label and serves as a description to further clarify the purpose of the
form element.
  a. Set description to 'How serious is the problem?'.

6.  options: provides a list of options to display in the dropdown box.
7.  List 'Low'.
8.  List 'Medium'.
9.  List 'High'.
10. List 'Critical'.

11. validations: Checks if form is valid before form can be submitted.
12. required: determines if field has been filled before it will allow the form to be submitted.
  a. Set validation requirement to true.
```

##### Problem summary : [bug-report-template.yaml] - [CODE]

Provides a space where the user can describe the problem they are experiencing free text.

```yaml
# Problem Summary

1.  - type: textarea
2.    id: problem-summary
3.    attributes:
4.      label: Problem Summary
5.      description: Please describe the issue in a few sentences.
6.      placeholder: A brief summary of the issue.
7.    validations:
8.      required: true
```

##### Problem summary : [bug-report-template.yaml] - [CODE DESCRIPTION]

```markdown
1. type: form element type E.G. textarea, checkbox, dropdown.
  a. Sets form element type to textarea.

2. id: a unique identifier for the field.
  a. Set unique identifier to 'problem-summary'.

3. attributes: specifies sub-settings for a particular element type.

4. label: text appears above form element describing what it is.
  a. set label text to 'Problem Summary'.

5. description: text that is displayed below the label and serves as a description to further clarify the purpose of the
form element.
  a. Set description to 'Please describe the issue in a few sentences.'.

6. placeholder: displays text inside the element as example content.
  a. Set placeholder text to 'A brief summary of the issue.'.

7. validations: checks if form is valid before form can be submitted.

8. required: determines if field has been filled before it will allow the form to be submitted.
  a. Set validation requirement to true.
```

##### Expected behaviour : [bug-report-template.yaml] - [CODE]

The user can describe what they behaviour they expected to see based on the actions described in the 'Problem summary' field.

```yaml
# Expected Behaviour

1.  - type: textarea
2.    id: expected-behaviour
3.    attributes:
4.      label: Expected Behaviour
5.      description: What did you expect to happen?
6.    validations:
7.      required: true
```

##### Expected behaviour : [bug-report-template.yaml] - [CODE DESCRIPTION]

```markdown
1. type: form element type E.G. textarea, checkbox, dropdown.
  a. Sets form element type to textarea.

2. id: a unique identifier for the field.
  a. Set unique identifier to 'expected-behaviour'.

3. attributes: specifies sub-settings for a particular element type.

4. label: text appears above form element describing what it is.
  a. set label text to 'Expected Behaviour'.

5. description: text that is displayed below the label and serves as a description to further clarify the purpose of the
form element.
  a. Set description to 'What did you expect to happen?'.

6. validations: checks if form is valid before form can be submitted.

7. required: determines if field has been filled before it will allow the form to be submitted.
  a. Set validation requirement to true.
```

##### Steps to reproduce : [bug-report-template.yaml] - [CODE]

This is a space where the user should enter an ordered list of what steps need to be taken in order to reproduce the problem so the issue can be investigated and resolved effectively.

```yaml
# Steps To Reproduce

1.  - type: textarea
2.    id: steps-to-reproduce
3.    attributes:
4.      label: Steps to Reproduce
5.      description: Please list the steps to reproduce the issue.
6.      placeholder: "1. \n2. \n3."
7.    validations:
8.      required: true
```

##### Steps to reproduce : [bug-report-template.yaml] - [CODE DESCRIPTION]

```markdown
1. type: form element type E.G. textarea, checkbox, dropdown.
  a. Sets form element type to textarea.

2. id: a unique identifier for the field.
  a. Set unique identifier to 'steps-to-reproduce'.

3. attributes: specifies sub-settings for a particular element type.

4. label: Text appears above form element describing what it is.
  a. set label text to 'Steps to Reproduce'.

5. description: text that is displayed below the label and serves as a description to further clarify the purpose of the
form element.
  a. Set description to 'Please list the steps to reproduce the issue.'.

6. placeholder: displays text inside the element as example content.
  a. Set placeholder text to '1. \n2. \n3.'.
    i.   '1.' prints as '1.'.
    ii.  '\n' inserts new line.
    iii. '2.' prints as '2.'.
    iv.  '\n' inserts new line.
    v.   '3.' prints as '3.'.

  Resulting in:
    1.
    2.
    3.

7. validations: checks if form is valid before form can be submitted.

8. required: determines if field has been filled before it will allow the form to be submitted.
  a. Set validation requirement to true.
```

##### Actual behaviour : [bug-report-template.yaml] - [CODE]

This field can be used to describe any unwanted or unexpected behaviour such as error messages or crashes.

```yaml
# Actual Behaviour

1.  - type: textarea
2.    id: actual-behaviour
3.    attributes:
4.      label: Actual Behaviour
5.      description: What actually happened? 
6.    validations:
7.      required: true
```

##### Actual behaviour : [bug-report-template.yaml] - [CODE DESCRIPTION]

```markdown
1. type: form element type E.G. textarea, checkbox, dropdown.
  a. Sets form element type to textarea.

2. id: a unique identifier for the field.
  a. Set unique identifier to 'actual-behaviour'.

3. attributes: specifies sub-settings for a particular element type.

4. label: Text appears above form element describing what it is.
  a. set label text to 'Actual Behaviour'.

5. description: text that describes the function of the element.
  a. Set description to 'What actually happened?'.

6. validations: checks if form is valid before form can be submitted.

7. required: determines if field has been filled before it will allow the form to be submitted.
  a. Set validation requirement to true.
```

##### Additional information : [bug-report-template.yaml] - [CODE]

User can provide additional information they feel may be relevant to the problem that can't be properly articulated in the other fields.

```yaml
# Additional Information

1.  - type: textarea
2.    id: additional-information
3.    attributes:
4.      label: Additional Information
5.      description: Provide any additional information or context that might help us resolve the issue.
6.      placeholder: Additional context, error messages, or anything else that may be helpful.
7.    validations:
8.      required: false
```

##### Additional information : [bug-report-template.yaml] - [CODE DESCRIPTION]

```markdown
1. type: form element type E.G. textarea, checkbox, dropdown.
  a. Sets form element type to textarea.

2. id: a unique identifier for the field.
  a. Set unique identifier to 'additional-information'.

3. attributes: specifies sub-settings for a particular element type.

4. label: Text appears above form element describing what it is.
  a. set label text to 'Additional Information'.

5. description: text that describes the function of the element.
  a. Set description to 'Provide any additional information or context that might help us resolve the issue.'.

6. placeholder: displays text inside the element as example content.
  a. Set placeholder text to 'Additional context, error messages, or anything else that may be helpful.'.

7. validations: checks if form is valid before form can be submitted.
8. required: determines if field has been filled before it will allow the form to be submitted.
  a. Set validation requirement to true.
```

##### Agree to terms : [bug-report-template.yaml] - [CODE]

The user is required to check this field in order to confirm they agree with the repository terms.

```yaml
# Agree To Terms

1.  - type: checkboxes
2.    id: terms
3.    attributes:
4.      label: Code of Conduct
5.      description: By submitting this bug report, you agree to follow our [Code of Conduct](https://example.com).
6.      options:
7.        - label: I agree to follow this project's Code of Conduct
8.    validations:
9.      required: true
```

##### Agree to terms : [bug-report-template.yaml] - [CODE DESCRIPTION]

```markdown
1. type: form element type E.G. textarea, checkbox, dropdown.
  a. Sets form element type to checkbox.

2. id: a unique identifier for the field.
  a. Set unique identifier to 'terms'.

3. attributes: specifies sub-settings for a particular element type.

4. label: text appears above form element describing what it is.
  a. set label text to 'Code of Conduct'.

5. description: text that describes the function of the element.
  a. Set description to 'By submitting this bug report, you agree to follow our 
  [Code of Conduct](./CODE_OF_CONDUCT.md).'.

6. options: provides a list of options to display in the dropdown box.

7. label: text appears above form element describing what it is.
  a. set label text to 'I agree to follow this project's Code of Conduct'.

8. validations: Checks if form is valid before form can be submitted.

9. required: determines if field has been filled before it will allow the form to be submitted.
  a. Set validation requirement to true.

```

### FEATURE REQUEST TEMPLATE [FEATURE-REQUEST-TEMPLATE.YAML] 📄

#### Attribute Table : [feature-request-template.yaml]

| Attribute             | Value                         |
|-----------------------|-------------------------------|
| Asset Name            | feature-request-template.yaml |
| Relative Path         | .github/ISSUE_TEMPLATE        |
| Hidden                | Inherited                     |
| Include in Repository | Yes                           |
| Managed               | Yes                           |
| Resolution            | N/A                           |
| Asset Type            | YAML                          |
| Asset File Size       | 4,128 bytes                   |

#### Asset Purpose : [feature-request-template.yaml]

To get user feedback regarding the availability and quality of features.

#### Asset Contents Description : [feature-request-template.yaml]

YAML script that creates a feature request form for GitHub issues.

#### Asset Code Breakdown : [feature-request-template.yaml]

1. Meta data.
2. Initialise form.
3. Introduction text.
4. Email input.
5. OS selection.
6. Browser selection.
7. Feature type.
8. Priority.
9. Feature summary.
10. Expected behaviour.
11. Use case.
12. Additional information.
13. Agree to terms.

---

[BACK TO TOP](#markdownlint-cli2-cicd-pipeline-docker-project-programmers-manual)

---

## Glossary

| Term   | Definition                                                                     |
|--------|--------------------------------------------------------------------------------|
| APK    | Alpine Package Keeper.                                                         |
| CI/CD  | Continues Integration Continues Development.                                   |
| CVSS   | Common Vulnerability Scoring System.                                           |
| Git    | Git source control used for managing code base.                                |
| GIT    | Source control software.                                                       |
| IDE    | Integrated Development Environment.                                            |
| JSONC  | JavaScript Object Notation Commented.                                          |
| MD     | Markdown.                                                                      |
| NPM    | Network Package Manager. Used by Node.JS to manage plugins and other tools.    |
| OS     | Operating system.                                                              |
| PAT    | [Personal access tokens][6] are used instead of the Dockerhub account password.|
| PNG    | Portable Network Graphic.                                                      |
| SBOM   | Software Bill of Materials is list of package dependencies.                    |
| Secret | Encrypted key stored as an environment variable.                               |
| VSC    | Microsoft Visual Studio Code.                                                  |
| WCAG   | Web Content Accessibility Guidelines.                                          |
| YAML   | Yet another markup language. Scripts that control CI/CD pipelines.             |


---

## UNSORTED INFORMATION [DRAFT ONLY]

---

## RESOURCES

  [1]: https://github.com/markdownlint/markdownlint/blob/main/docs/RULES.md
  [2]: https://www.conventionalcommits.org/en/v1.0.0/#specification
  [3]: https://git-scm.com/doc
  [4]: https://docs.github.com/en/communities/using-templates-to-encourage-useful-issues-and-pull-requests/syntax-for-githubs-form-schema
  [5]: https://www.first.org/cvss/
  [6]: https://git-scm.com/doc
