# Markdownlint-Cli2 CI/CD Pipeline Docker Project Programmers Manual

This document is a reference guide for programmers. It provides a comprehensive list of all assets in the project,
including detailed descriptions of their functionality and a complete breakdown of the code.

ℹ Please review 'CONTRIBUTING.md' carefully, as it contains important information on how to contribute to this
repository and update the documentation. This reference manual focuses on the project structure and logic.
It does not cover style guidelines or contribution policies.

---

## TABLE OF CONTENTS

## TARGET AUDIENCE

This document is for developers actively working on this project.

---

## PROJECT DESCRIPTION

This project is essentially a Dockerfile with a script that contains instructions for a Docker container that has
markdownlint-cli2 installed. markdownlint is a tool that lints markdown files based on the [CommonMark][1] standard.

---

## PROJECT PURPOSE

The purpose of this program is to provide a Docker container setup that will lint Markdown files as part of a CI/CD
workflow. This provides greater readability and compatibility for any Markdown files contained in the project.

---

## PROJECT ASSETS

### FILE TREE VIEW

```markdown
markdownlint-cli2-docker
│   .gitignore
│   CODE_OF_CONDUCT.md
│   CONTRIBUTING.md
│   DEVELOPER-OLD.md
│   DEVELOPER.md
│   Dockerfile
│   package-lock.json
│   package.json
│   README.md
│   version.text
│
├───.artefacts
│       logo.png
│       monkey-knuckles-avatar.png
│
├───.config
│       .markdownlint.jsonc
│       commitlint.config.js
│       cspell.json
│
├───.github
│   ├───ISSUE_TEMPLATE
│   │       bug-report-template.yaml
│   │       feature-request-template.yaml
│   │
│   └───workflows
│           build-docker.yaml
│           lint-markdown.yaml
│           lint-spelling.yaml
├───.git
│
├───.vscode
│       extensions.json
│       keybindings.json
│       settings.json
│       tasks.json
│
└───markdown-fail
        md001.md
        md003.md
        md004.md
        md005.md
        md007.md
        md009.md
        md010.md
        md011.md
        md012.md
        md013.md
        md018.md
        md019.md
        md020.md
        md021.md
        md022.md
        md023.md
        md024.md
        md025.md
        md026.md
        md027.md
        md028.md
        md029.md
        md030.md
        md031.md
        md032.md
        md033.md
        md034.md
        md035.md
        md036.md
        md037.md
        md038.md
        md039.md
        md040.md
        md041.md
        md042.md
        md043.md
        md044.md
        md045.md
        md046.md
        md047.md
        md048.md
        md049.md
        md050.md
        md051.md
        md052.md
        md053.md
        md054.md
        md055.md
        md056.md
 ```

---

### ARTEFACTS [FOLDER] 📁

#### Attribute Table : [Artefacts Folder]

| Attribute             | Value        |
|-----------------------|--------------|
| Asset Name            | .artefacts   |
| Relative Path         | ./           |
| Hidden                | Yes          |
| Include in Repository | Yes          |
| Managed               | Yes          |
| Asset Type            | FOLDER       |

#### Asset Purpose : [Artefacts Folder]

To contain artefacts that are used throughout the CI/CD process but not necessarily apart of the project itself.

#### Asset Contents Description : [Artefacts Folder]

The '.artefacts' folder contains files such as logos that are used throughout the [CI/CD](#glossary) pipeline process.

---

[BACK TO TOP](#markdownlint-cli2-cicd-pipeline-docker-project-programmers-manual)

---

### LOGO [LOGO.PNG] 📄

#### Attribute Table : [logo.png]

| Attribute             | Value      |
|-----------------------|------------|
| Asset Name            | logo.png   |
| Relative Path         | .artefacts |
| Hidden                | Inherited  |
| Include in Repository | Yes        |
| Managed               | Yes        |
| Asset Type            | PNG        |

#### Asset Purpose : [logo.png]

Brand identification.

#### Asset Contents Description : [logo.png]

This file contains the NinjaMonkeyGames™ logo. This logo is used in internal markdown files for branding purposes.
This is a PNG logo that measures 32px x 32px.

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
| Asset Type            | PNG                           |

#### Asset Purpose : [monkey-knuckles-avatar.png]

Developer identification and contribution recognition.

#### Asset Contents Description : [monkey-knuckles-avatar.png]

This file contains Developer avatar for 'Monkey Knuckles'. It measures 32 x 32 pixels.

 ℹ *If you are a new developer and you have made a contribution to this project you should add your own avatar to the*
 *project and update the relevant parts of the documentation. See 'CONTRIBUTING.md'.*

![Monkey Knuckles Avatar](.artefacts/monkey-knuckles-avatar.png)

---

[BACK TO TOP](#markdownlint-cli2-cicd-pipeline-docker-project-programmers-manual)

---

### CONFIGURATION [FOLDER] 📁

#### Attribute Table : [Configuration Folder]

| Attribute             | Value        |
|-----------------------|--------------|
| Asset Name            | .config      |
| Relative Path         | ./           |
| Hidden                | Yes          |
| Include in Repository | Yes          |
| Managed               | Yes          |
| Asset Type            | FOLDER       |

#### Asset Purpose : [Configuration Folder]

Keeps all plugin configuration files in the same place.

#### Asset Contents Description : [Configuration Folder]

Contains configuration files for various [IDE](#glossary) plugins.

---

[BACK TO TOP](#markdownlint-cli2-cicd-pipeline-docker-project-programmers-manual)

---

### MARKDOWNLINT CONFIGURATION FILE [.MARKDOWNLINT.JSONC] 📄

#### Attribute Table : [.markdownlint.jsonc]

| Attribute             | Value                 |
|-----------------------|-----------------------|
| Asset Name            | .markdownlint.jsonc   |
| Relative Path         | .config               |
| Hidden                | Yes                   |
| Include in Repository | Yes                   |
| Managed               | Yes                   |
| Asset Type            | JSONC                 |

#### Asset Purpose : [.markdownlint.jsonc]

To maintain consistent markdown formatting throughout the project.

#### Asset Contents Description : [.markdownlint.jsonc]

This file contains a list of rules written in JSONC format that dictate how markdownlint-cli2 will lint markdown files.
There are 49 Different rules. These rules are prefixed with 'MD' followed by a three digit number.

 ℹ *Some of the numbers appear to missing! These are legacy rules that were removed from markdownlint.
 MD002, MD006, MD008, MD014, MD015, MD016, MD0017 have been removed.*

#### Asset Code Breakdown : [.markdownlint.jsonc]

1. Base setup
2. Rule code
    a. Sub-setting description (If applicable)
    b. Value

##### Base setup : [.markdownlint.jsonc] - [CODE]

```json
// Base Setup

1. "default": true, // Set defaults for all rules as true by default.
2. "extends": null, // Explicitly specifies there are no extended configurations.
```

##### Base setup : [.markdownlint.jsonc] - [CODE-DESCRIPTION]

```markdown
1. All rules will be considered true unless the configuration specifically states otherwise.
2. This is set to null because this is the only configuration file that will be used in this project.
```

##### markdownlint-cli2 Configuration File, Rule Table : [.markdownlint.jsonc]

The rest of the configuration has been entered in the form of a table for legibility purposes.

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
| Asset Type            | JS                    |

#### Asset Purpose : [commitlint.config.js]

Maintains the repository integrity buy ensuring conventional commit standards are being adhered to.

#### Asset Contents Description : [commitlint.config.js]

Contains linting rules pertaining to the conventional commit standards.

See. [Conventional Commits][2]

### CPSELL [CSPELL.JSON] 📄

#### Attribute Table : [cspell.json]

| Attribute             | Value        |
|-----------------------|--------------|
| Asset Name            | cspell.json  |
| Relative Path         | .config      |
| Hidden                | Inherited    |
| Include in Repository | Yes          |
| Managed               | Yes          |
| Asset Type            | JSON         |

#### Asset Purpose : [cspell.json]

To maintain a professional, constant error free style throughout all project documents.

#### Asset Contents Description : [cspell.json]

Contains language configuration and exceptions list for cSpell code spell checker.

ℹ *No code breakdown has been provided here as 'cspell.json'   a simple list of exception words using a British English
base dictionary.*

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
| Asset Type            | FOLDER       |

#### Asset Purpose : [Git Folder]

Allows Git source control to function.

#### Asset Contents Description : [Git Folder]

This folder contains configuration files required for Git to function and operate
 correctly.

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
| Asset Type            | FOLDER       |

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
| Asset Type            | FOLDER          |

#### Asset Purpose : [Issue Template Folder]

Enforces consistency when submitting issues and feature requests.

#### Asset Contents Description : [Issue Template Folder]

Contains templates for GitHub issue forms.

##### YAML GitHub Issue Forms Keyword Glossary

| Key         | Description                                                             |
|-------------|-------------------------------------------------------------------------|
| Name        | Identifiable name to describe the purpose of the form.                  |
| Description | Text that describes the function of the element.                        |
| Title       | Default title that will be pre-populated in the issue submission form.  |
| Labels      | Identify the type categories the issue belongs.                         |
| Projects    | Assigns to a specific GitHub project.                                   |
| Body        | Initialises form.                                                       |
| Type        | Form element type E.G. textbox, checkbox, dropdown.                     |
| Attributes  | Specifies sub-settings for a particular element type.                   |
| Label       | Text appears above form element describing what it is.                  |
| Value       | Sets markdown text.                                                     |
| ID          | A unique identifier for the field.                                      |
| Placeholder | Text that appears inside the element itself.                            |
| Validations | Checks if form is valid before form can be submitted.                   |
| Required    | Determines if field is required to submit the form.                     |
| Options     | Provides a list of options to select from drop-down box.                |

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
| Asset Type            | YAML                          |

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

```yaml
1. name: 🐞 Bug Report
2. description: File a bug report
3. title: "[Bug]: "
4. labels: ["bug", "new"]
5. projects: ["NinjaMonkeyGames/12"]
```

##### Meta data : [bug-report-template.yaml] - [BLOCK DESCRIPTION]

```markdown
This section contains mete data for the bug submission form.
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

##### Initialise form : [bug-report-template.yaml] - [BLOCK DESCRIPTION]

```markdown
Tells GitHub that form content will follow.
```

##### Initialise form : [bug-report-template.yaml] - [CODE DESCRIPTION]

```markdown
1. Tells GitHub the form will begin here.
```

##### Introduction text : [bug-report-template.yaml] - [CODE]

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
1. type: form element type E.G. textbox, checkbox, dropdown.
  a. Sets form element type to markdown.

2. attributes: specifies sub-settings for a particular element type.

3. value: sets markdown introduction text.
  a. '|' Indicates multiple lines of text.

4. Set first line of text to 'Thanks for taking the time to report this issue!'.
5. Set second line of text to 'Please fill out the form below to provide detailed information about the bug.'.
```

##### Email input : [bug-report-template.yaml] - [CODE]

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

##### Email input : [bug-report-template.yaml] - [BLOCK DESCRIPTION]

```markdown
Provides a field for users to enter their email address so they can be contacted about the bug request should there be 
any issues or further clarification is required.
```

##### Email input : [bug-report-template.yaml] - [CODE DESCRIPTION]

```markdown
1. type: form element type E.G. textbox, checkbox, dropdown.
  a. Sets form element type to input.

2. id: a unique identifier for the field.
  a. Set unique identifier to 'contact-email'.

3. attributes: specifies sub-settings for a particular element type.

4. label: text appears above form element describing what it is.
  a. set label text to 'Contact Email'.

5. description: text is displayed below the label and serves as a description to further clarify the purpose of the
form element.
  a. Set description to 'Please provide an email where we can reach you if more information is needed.'.

6. placeholder: text appears inside the element itself. This serves as example data.
  a. Set placeholder to 'email@example.com'.

7. validations: checks if form is valid before form can be submitted.

8. required: determines if field has been filled before it will allow the form to be submitted.
  a. Set validation requirement to true.
```

##### OS Selection : [bug-report-template.yaml] - [CODE]

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

##### OS Selection : [bug-report-template.yaml] - [BLOCK DESCRIPTION]

```markdown
Allows the user to select the OS they are using from a number of options. This information can sometimes be used to 
figure out the problem.
```

##### OS Selection : [bug-report-template.yaml] - [CODE DESCRIPTION]

```markdown
1. type: form element type E.G. textbox, checkbox, dropdown.
  a. Sets form element type to dropdown.

2. id: a unique identifier for the field.
  a. Set unique identifier to 'os'.

3. attributes: specifies sub-settings for a particular element type.

4. label: text appears above form element describing what it is.
  a. set label text to 'Operating System'.

5. description: text that is displayed below the label and serves as a description to further clarify the purpose of the
form element.
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

##### Browser selection : [bug-report-template.yaml] - [BLOCK DESCRIPTION]

```markdown
Allows the user to select the browser they are using from a number of options. This information can sometimes be used to
figure out the problem.
```

##### Browser selection : [bug-report-template.yaml] - [CODE DESCRIPTION]

```markdown
1. type: form element type E.G. textbox, checkbox, dropdown.
  a. Sets form element type to dropdown.

2. id: a unique identifier for the field.
  a. Set unique identifier to 'browser'.

3. attributes: specifies sub-settings for a particular element type.

4. label: text appears above form element describing what it is.
  a. set label text to 'Browser'.

5. description: text that is displayed below the label and serves as a description to further clarify the purpose of the
form element.
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

##### Bug type : [bug-report-template.yaml] - [BLOCK DESCRIPTION]

```markdown
Allows the user to select from a number of options what part of the system the bug affects.
```

##### Bug type : [bug-report-template.yaml] - [CODE DESCRIPTION]

```markdown
1. type: form element type E.G. textbox, checkbox, dropdown.
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

##### Severity : [bug-report-template.yaml] - [BLOCK DESCRIPTION]

```markdown
Allows the user to select how severe the impact of the bug is.
```

##### Severity : [bug-report-template.yaml] - [CODE DESCRIPTION]

```markdown
1. type: form element type E.G. textbox, checkbox, dropdown.
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

##### Problem summary : [bug-report-template.yaml] - [BLOCK DESCRIPTION]

```markdown
This is a free text field that allows the user to provide an overview of what the nature of the bug is.
```

##### Problem summary : [bug-report-template.yaml] - [CODE DESCRIPTION]

```markdown
1. type: form element type E.G. textbox, checkbox, dropdown.
  a. Sets form element type to textarea.

2. id: a unique identifier for the field.
  a. Set unique identifier to 'problem-summary'.

3. attributes: specifies sub-settings for a particular element type.

4. label: Text appears above form element describing what it is.
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

##### Expected behaviour : [bug-report-template.yaml] - [BLOCK DESCRIPTION]

```markdown
This section allows the user to explain what behaviour they were expecting in place of the bug happening.
```

##### Expected behaviour : [bug-report-template.yaml] - [CODE DESCRIPTION]

```markdown
1. type: form element type E.G. textbox, checkbox, dropdown.
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

##### Steps to reproduce : [bug-report-template.yaml] - [BLOCK DESCRIPTION]

```markdown
A step by step list of actions that have to be taken in order to reproduce the bug.
```

##### Steps to reproduce : [bug-report-template.yaml] - [CODE DESCRIPTION]

```markdown
1. type: form element type E.G. textbox, checkbox, dropdown.
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

7. validations: Checks if form is valid before form can be submitted.

8. required: determines if field has been filled before it will allow the form to be submitted.
  a. Set validation requirement to true.
```

##### Actual behaviour : [bug-report-template.yaml] - [CODE]

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

##### Actual behaviour : [bug-report-template.yaml] - [BLOCK DESCRIPTION]

```markdown
In this section the user can give information about the bug including any text or error codes that may have been 
produced.
```

##### Actual behaviour : [bug-report-template.yaml] - [CODE DESCRIPTION]

```markdown
1. type: form element type E.G. textbox, checkbox, dropdown.
  a. Sets form element type to textarea.

2. id: a unique identifier for the field.
  a. Set unique identifier to 'actual-behaviour'.

3. attributes: specifies sub-settings for a particular element type.

4. label: Text appears above form element describing what it is.
  a. set label text to 'Actual Behaviour'.

5. description: text that is displayed below the label and serves as a description to further clarify the purpose of the
form element.
  a. Set description to 'What actually happened?'.

6. validations: checks if form is valid before form can be submitted.

7. required: determines if field has been filled before it will allow the form to be submitted.
  a. Set validation requirement to true.
```

##### Additional information : [bug-report-template.yaml] - [CODE]

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

##### Additional information : [bug-report-template.yaml] - [BLOCK DESCRIPTION]

```markdown
Here the user can provide any additional information about the bug that has not already been covered.
```

##### Additional information : [bug-report-template.yaml] - [CODE DESCRIPTION]

```markdown
1. type: form element type E.G. textbox, checkbox, dropdown.
  a. Sets form element type to textarea.

2. id: a unique identifier for the field.
  a. Set unique identifier to 'additional-information'.

3. attributes: specifies sub-settings for a particular element type.

4. label: Text appears above form element describing what it is.
  a. set label text to 'Additional Information'.

5. description: text that is displayed below the label and serves as a description to further clarify the purpose of the
form element.
  a. Set description to 'Provide any additional information or context that might help us resolve the issue.'.

6. placeholder: displays text inside the element as example content.
  a. Set placeholder text to 'Additional context, error messages, or anything else that may be helpful.'.

7. validations: checks if form is valid before form can be submitted.
8. required: determines if field has been filled before it will allow the form to be submitted.
  a. Set validation requirement to true.
```

##### Agree to terms : [bug-report-template.yaml] - [CODE]

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

##### Agree to terms : [bug-report-template.yaml] - [BLOCK DESCRIPTION]

```markdown
Forces the user to accept the terms of service when submitting a bug report. This promotes mindfulness when submitting 
bug reports.
```

##### Agree to terms : [bug-report-template.yaml] - [CODE DESCRIPTION]

```markdown
1. type: form element type E.G. textbox, checkbox, dropdown.
  a. Sets form element type to checkbox.

2. id: a unique identifier for the field.
  a. Set unique identifier to 'terms'.

3. attributes: specifies sub-settings for a particular element type.

4. label: text appears above form element describing what it is.
  a. set label text to 'Code of Conduct'.

5. description: text that is displayed below the label and serves as a description to further clarify the purpose of the
form element.
  a. Set description to 'By submitting this bug report, you agree to follow our 
  [Code of Conduct](./CODE_OF_CONDUCT.md).'.

6. options: provides a list of options to display in the dropdown box.

7. label: text appears above form element describing what it is.
  a. set label text to 'I agree to follow this project's Code of Conduct'.

8. validations: Checks if form is valid before form can be submitted.

9. required: determines if field has been filled before it will allow the form to be submitted.
  a. Set validation requirement to true.

```

---

[BACK TO TOP](#markdownlint-cli2-cicd-pipeline-docker-project-programmers-manual)

---

### FEATURE REQUEST TEMPLATE [FEATURE-REQUEST-TEMPLATE.YAML] 📄

#### Attribute Table : [feature-request-template.yaml]

| Attribute             | Value                         |
|-----------------------|-------------------------------|
| Asset Name            | feature-request-template.yaml |
| Relative Path         | .github/ISSUE_TEMPLATE        |
| Hidden                | Inherited                     |
| Include in Repository | Yes                           |
| Managed               | Yes                           |
| Asset Type            | YAML                          |

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

⚠️ *Note that the 'required:' key will only work when the project is made public.*

##### Meta data : [feature-request-template.yaml] - [CODE]

```yaml
1. name: 🐞 Bug Report
2. description: File a bug report
3. title: "[Bug]: "
4. labels: ["bug", "new"]
5. projects: ["NinjaMonkeyGames/12"]
```

##### Meta data : [feature-request-template.yaml] - [BLOCK DESCRIPTION]

```markdown
This section contains mete data for the bug submission form.
```

##### Meta data : [feature-request-template.yaml] - [CODE DESCRIPTION]

```markdown
# Meta Data

1. name: identifiable name to describe the purpose of the form.
  a. Set name to '🐞 Bug Report'.
  
2. description: describes the function of the form.
  a. Set description to 'File a bug report'.

3. title: default title that will be pre-populated in the issue submission form.
  a. Set default title text to '[Bug]:'.
 
4. labels: identify the type categories the issue belongs.  
  a. Set labels 'bug' and 'new'.
  
5. projects: assigns to a specific GitHub project.   
  a. Set project to 'NinjaMonkeyGames/12'.
```

##### Initialise form : [feature-request-template.yaml] - [CODE]

```yaml
# Initialise Form

1. body:
```

##### Initialise form : [feature-request-template.yaml] - [BLOCK DESCRIPTION]

```markdown
Tells GitHub that form content will follow.
```

##### Initialise form : [feature-request-template.yaml] - [CODE DESCRIPTION]

```markdown
1. Tells GitHub the form will begin here.
```

##### Introduction text : [feature-request-template.yaml] - [CODE]

```yaml
# Introduction Text

1.  - type: markdown
2.    attributes:
3.      value: |
4.        Thanks for taking the time to report this issue!
5.        Please fill out the form below to provide detailed information about the bug.
```

##### Introduction text : [feature-request-template.yaml] - [BLOCK DESCRIPTION]

```markdown
This introduction text is used to briefly explain what the form is used for.
```

##### Introduction text : [feature-request-template.yaml] - [CODE DESCRIPTION]

```markdown
1. type: form element type E.G. textbox, checkbox, dropdown.
  a. Sets form element type to markdown.

2. attributes: specifies sub-settings for a particular element type.

3. value: sets markdown text.
  a. '|' Indicates multiple lines of text.

4. Set first line of text to 'Thanks for taking the time to report this issue!'.

5. Set second line of text to 'Please fill out the form below to provide detailed information about the bug.'.
```

##### Email input : [feature-request-template.yaml] - [CODE]

```yaml
# Email Input

1.   - type: input
2.     id: contact-email
3.     attributes:
4.       label: Contact Email
5.       description: Please provide an email where we can reach you if more information is needed.
6.       placeholder: email@example.com
7.     validations:
8.       required: true
```

##### Email input : [feature-request-template.yaml] - [BLOCK DESCRIPTION]

```markdown
Provides a field for users to enter their email address so they can be contacted about the bug request should there be 
any issues or further clarification is required.
```

##### Email input : [feature-request-template.yaml] - [CODE DESCRIPTION]

```markdown
1. type: form element type E.G. textbox, checkbox, dropdown.
  a. Sets form element type to input.

2. id: a unique identifier for the field.
  a. Set unique identifier to 'contact-email'.

3. attributes: specifies sub-settings for a particular element type.

4. label: text appears above form element describing what it is.
  a. set label text to 'Contact Email'.

5. description: text is displayed below the label and serves as a description to further clarify the purpose of the
form element.
  a. Set description to 'Please provide an email where we can reach you if more information is needed.'.

6. placeholder: text appears inside the element itself. This serves as example data.
  a. Set placeholder to 'email@example.com'.

7. validations: checks if form is valid before form can be submitted.

8. required: determines if field has been filled before it will allow the form to be submitted.
  a. Set validation requirement to true.
```

##### OS Selection : [feature-request-template.yaml] - [CODE]

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

##### OS Selection : [feature-request-template.yaml] - [BLOCK DESCRIPTION]

```markdown
Allows the user to select the OS they are using from a number of options. This information can sometimes be used to 
figure out the problem.
```

##### OS Selection : [feature-request-template.yaml] - [CODE DESCRIPTION]

```markdown
1. type: form element type E.G. textbox, checkbox, dropdown.
  a. Sets form element type to dropdown.

2. id: a unique identifier for the field.
  a. Set unique identifier to 'os'.

3. attributes: specifies sub-settings for a particular element type.

4. label: text appears above form element describing what it is.
  a. set label text to 'Operating System'.

5. description: text that is displayed below the label and serves as a description to further clarify the purpose of the
form element.
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

##### Browser selection : [feature-request-template.yaml] - [CODE]

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

##### Browser selection : [feature-request-template.yaml] - [BLOCK DESCRIPTION]

```markdown
Allows the user to select the browser they are using from a number of options. This information can sometimes be used to
figure out the problem.
```

##### Browser selection : [feature-request-template.yaml] - [CODE DESCRIPTION]

```markdown
1. type: form element type E.G. textbox, checkbox, dropdown.
  a. Sets form element type to dropdown.

2. id: a unique identifier for the field.
  a. Set unique identifier to 'browser'.

3. attributes: specifies sub-settings for a particular element type.

4. label: text appears above form element describing what it is.
  a. set label text to 'Browser'.

5. description: text that is displayed below the label and serves as a description to further clarify the purpose of the
form element.
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

##### Feature type : [feature-request-template.yaml] - [CODE]

```yaml
# Feature Type

1.  - type: dropdown
2.    id: bug-type
3.    attributes:
4.      label: Bug Type
5.      description: Select the type of issue you are reporting.
6.      options:
7.        - New Feature
8.        - Improvement
9.        - Enhancement
10.     validations:
11.      required: true 
```

##### Feature Type : [bug-report-template.yaml] - [BLOCK DESCRIPTION]

```markdown
Allows the user to select the type of new feature required.
```

##### Feature type : [feature-request-template.yaml] - [CODE DESCRIPTION]

```markdown
1. type: form element type E.G. textbox, checkbox, dropdown.
  a. Sets form element type to dropdown.

2. id: a unique identifier for the field.
  a. Set unique identifier to 'bug-type'.

3. attributes: Specifies sub-settings for a particular element type.

4. label: text appears above form element describing what it is.
  a. set label text to 'Bug Type'.

5. description: text that is displayed below the label and serves as a description to further clarify the purpose of the
form element.
  a. Set description to 'Select the type of issue you are reporting.'.

6.  options: provides a list of options to display in the dropdown box.
7.  List 'New Feature'.
8.  List 'Improvement'.
9.  List 'Enhancement'.
10. validations: Checks if form is valid before form can be submitted.

11. required: determines if field has been filled before it will allow the form to be submitted.
  a. Set validation requirement to true.
```

##### Priority : [feature-request-template.yaml] - [CODE]

```yaml
# Priority

1.  - type: dropdown
2.    id: priority
3.    attributes:
4.      label: Priority
5.      description: How important is this feature request?
6.      options:
7.        - Low
8.        - Medium
9.        - High
10.       - Critical
11.    validations:
12.      required: true
```

##### Priority : [feature-request-template.yaml] - [BLOCK DESCRIPTION]

```markdown
Allows the user to determine how essential the new feature is.
```

##### Priority : [feature-request-template.yaml] - [CODE DESCRIPTION]

```markdown
1. type: form element type E.G. textbox, checkbox, dropdown.
  a. Sets form element type to dropdown.

2. id: a unique identifier for the field.
  a. Set unique identifier to 'priority'.

3. attributes: specifies sub-settings for a particular element type.

4. label: Text appears above form element describing what it is.
  a. set label text to 'Priority'.

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

##### Feature summary : [feature-request-template.yaml] - [CODE]

```yaml
# Feature Summary

1.  - type: textarea
2.    id: feature-summary
3.    attributes:
4.      label: Feature Summary
5.      description: Please describe the issue in a few sentences.
6.      placeholder: A brief summary of the issue.
7.    validations:
8.      required: true
```

##### Feature summary : [feature-request-template.yaml] - [BLOCK DESCRIPTION]

```markdown
This is a free text field that allows the user to provide an overview of what functionality the new feature should 
provide.
```

##### Feature summary : [feature-request-template.yaml] - [CODE DESCRIPTION]

```markdown
1. type: form element type E.G. textbox, checkbox, dropdown.
  a. Sets form element type to textarea.

2. id: a unique identifier for the field.
  a. Set unique identifier to 'feature-summary'.

3. attributes: specifies sub-settings for a particular element type.

4. label: Text appears above form element describing what it is.
  a. set label text to 'Feature Summary'.

5. description: text that is displayed below the label and serves as a description to further clarify the purpose of the
form element.
  a. Set description to 'Please describe the issue in a few sentences.'.

6. placeholder: displays text inside the element as example content.
  a. Set placeholder text to 'A brief summary of the issue.'.

7. validations: checks if form is valid before form can be submitted.

8. required: determines if field has been filled before it will allow the form to be submitted.
  a. Set validation requirement to true.
```

##### Expected behaviour : [feature-request-template.yaml] - [CODE]

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

##### Expected behaviour : [feature-request-template.yaml] - [BLOCK DESCRIPTION]

```markdown
This section allows the user to explain what behaviour they were expecting of the new feature.
```

##### Expected behaviour : [feature-request-template.yaml] - [CODE DESCRIPTION]

```markdown
1. type: form element type E.G. textbox, checkbox, dropdown.
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

##### Use case : [feature-request-template.yaml] - [CODE]

```yaml
# Use Case

1.  - type: textarea
2.    id: use-case
3.    attributes:
4.      label: Use Case
5.      description: How would this feature benefit you or your workflow?
6.      placeholder: Describe the scenario in which this feature would be useful.
7.    validations:
8.      required: true
```

##### Use case : [feature-request-template.yaml] - [BLOCK DESCRIPTION]

```markdown
User can provide information about the situation they found themselves in that requires the newly proposed feature.
```

##### Use case : [feature-request-template.yaml] - [CODE DESCRIPTION]

```markdown
1. type: form element type E.G. textbox, checkbox, dropdown.
  a. Sets form element type to textarea.

2. id: a unique identifier for the field.
  a. Set unique identifier to 'use-case'.

3. attributes: Specifies sub-settings for a particular element type.

4. label: Text appears above form element describing what it is.
  a. set label text to 'Use Case'.

5. description: text that is displayed below the label and serves as a description to further clarify the purpose of the
form element.
  a. Set description to 'How would this feature benefit you or your workflow?'.

6. placeholder: text that appears inside the element itself. This serves as an example.
  a. Set placeholder to 'Describe the scenario in which this feature would be useful.'.

7. validations: checks if form is valid before form can be submitted.

8. required: determines if field has been filled before it will allow the form to be submitted.
  a. Set validation requirement to true.
```

##### Additional information : [feature-request-template.yaml] - [CODE]

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

##### Additional information : [feature-request-template.yaml] - [BLOCK DESCRIPTION]

```markdown
Here the user can provide any additional information about the feature that has not already been covered.
```

##### Additional information : [feature-request-template.yaml] - [CODE DESCRIPTION]

```markdown
1. type: form element type E.G. textbox, checkbox, dropdown.
  a. Sets form element type to textarea.

2. id: a unique identifier for the field.
  a. Set unique identifier to 'additional-information'.

3. attributes: specifies sub-settings for a particular element type.

4. label: text appears above form element describing what it is.
  a. set label text to 'Additional Information'.

5. description: text that is displayed below the label and serves as a description to further clarify the purpose of the
form element.
  a. Set description to 'Provide any additional information or context that might help us resolve the issue.'.

6. placeholder: displays text inside the element as example content.
  a. Set placeholder text to 'Additional context, error messages, or anything else that may be helpful.'.

7. validations: checks if form is valid before form can be submitted.
8. required: determines if field has been filled before it will allow the form to be submitted.
  a. Set validation requirement to true.
```

##### Agree to terms : [feature-request-template.yaml] - [CODE]

```yaml
# Agree To Terms

1.  - type: checkboxes
2.    id: terms
3.    attributes:
4.      label: Code of Conduct
5.      description: By submitting this feature request, you agree to follow our [Code of Conduct](https://example.com).
6.      options:
7.        - label: I agree to follow this project's Code of Conduct
8.    validations:
9.      required: true
```

##### Agree to terms : [feature-request-template.yaml] - [BLOCK DESCRIPTION]

```markdown
Forces the user to accept the terms of service when submitting a feature request. This promotes mindfulness when 
requesting new features.
```

##### Agree to terms : [feature-request-template.yaml] - [CODE DESCRIPTION]

```markdown
1. type: form element type E.G. textbox, checkbox, dropdown.
  a. Sets form element type to checkbox.

2. id: a unique identifier for the field.
  a. Set unique identifier to 'terms'.

3. attributes: specifies sub-settings for a particular element type.

4. label: text appears above form element describing what it is.
  a. set label text to 'Code of Conduct'.

5. description: text that is displayed below the label and serves as a description to further clarify the purpose of the
form element.
  a. Set description to 'By submitting this feature request, you agree to follow our 
  [Code of Conduct](./CODE_OF_CONDUCT.md).'.

6. options: provides a list of options to display in the dropdown box.

7. label: text appears above form element describing what it is.
  a. set label text to 'I agree to follow this project's Code of Conduct'.

8. validations: checks if form is valid before form can be submitted.

9. required: determines if field has been filled before it will allow the form to be submitted.
  a. Set validation requirement to true.

```

### WORKFLOWS [FOLDER] 📁

#### Attribute Table : [Workflow Folder]

| Attribute             | Value             |
|-----------------------|-------------------|
| Asset Name            | workflows         |
| Relative Path         | .github           |
| Hidden                | Inherited         |
| Include in Repository | Yes               |
| Managed               | Yes               |
| Asset Type            | FOLDER            |

#### Asset Purpose : [Workflows Folder]

GitHub relies on this folder for workflow functionality.

#### Asset Contents Description : [Workflows Folder]

Stores YAML files that will be triggered by GitHub Actions.

##### YAML GitHub actions keyword glossary

| Key         | Description                                                        |
|-------------|--------------------------------------------------------------------|
| name        | Text label displayed when GitHub Actions executes a YAML script.   |
| on          | Automatically triggers a workflow when 'on:' condition as been met.|
| push        | Execute event when pushed.                                         |
| paths       | Specifies the files and paths to be included.                      |
| jobs        | Defines a set of jobs to be run in the pipeline.                   |
| build       | Specifies the name of the job being configured.                    |
| steps       | Defines the sequence of steps that the job will execute.           |
| uses        | Tells GitHub Actions it is about to use a prebuild Actions script. |
| with        | Puts the workflow in at state ready to accept login credentials.   |
| username    | States that a username will follow.                                |
| password    | States that a password will follow.                                |
| run         | executes command(s).                                               |
| lint        | A label to specify the category of job.                            |
| runs-on     | Specifies what runner and OS to use.                               |
| container   | indicates that a container image will follow.                      |
| image       | States a Docker image will be used.                                |
| if          | Conditional statement.                                             |

---

[BACK TO TOP](#markdownlint-cli2-cicd-pipeline-docker-project-programmers-manual)

---

### BUILD AND PUSH DOCKER FILE [BUILD-DOCKER.YAML] 📄

#### Attribute Table : [build-docker.yaml]

| Attribute             | Value             |
|-----------------------|-------------------|
| Asset Name            | build-docker.yaml |
| Relative Path         | .github/workflows |
| Hidden                | Inherited         |
| Include in Repository | Yes               |
| Managed               | Yes               |
| Asset Type            | YAML              |

#### Asset Purpose : [build-docker.yaml]

1. Build with [SBOM](#glossary) and Provenance (This satisfies Dockerhub container policy.)
2. Negates the need to build and push Dockerfile manually reducing the possibility of human error.

#### Asset Contents Description : [build-docker.yaml]

This file is triggered by GitHub Actions. It checks if 'Dockerfile' has been updated then
builds and pushes the changes to Dockerhub.

**name:** Text label displayed when GitHub Actions executes a YAML script.

#### Asset Code Breakdown : [build-docker.yaml]

1. Set workflow title label.
2. Checks if 'Dockerfile' has been modified on push/pull.
3. Initialise pipeline.
4. Checkout code.
5. Set up Docker buildx.
6. Log in to Dockerhub.
7. Build and push Docker image with [SBOM](#glossary) and provenance.

The following link provides information about the syntax used in GitHub [YAML](#glossary) files.
*See:* [Workflow syntax for GitHub Actions][5]

##### Set workflow title label : [build-docker.yaml] - [CODE]

```yaml
# Set workflow title label

1: name: Build and Push Docker Image
```

##### Set workflow title label : [build-docker.yaml] - [CODE-DESCRIPTION]

```markdown
 1. name: text label displayed when GitHub Actions executes a YAML script.
   a. Set name to 'Build and Push Docker Image'.
```

##### Checks if 'Dockerfile' Has Been Modified on Push : [build-docker.yaml] - [CODE]

```yaml
# Checks if 'Dockerfile' has been modified on push

1. on:
2.   push:
3.     paths:
4.       - 'Dockerfile'
```

##### Checks if 'Dockerfile' Has Been Modified on Push : [build-docker.yaml] - [CODE-DESCRIPTION]

```markdown
1. on: automatically triggers a workflow when 'on:' condition as been met.
2. push: defines the push event as the trigger, which means the workflow runs when code is pushed.

3. paths: specifies the files and paths to be included.
4. Include 'Dockerfile'.
```

##### Initialise pipeline : [build-docker.yaml] - [CODE]

```yaml
# Initialise Pipeline

1. jobs:
2.  build:
3.    runs-on: ubuntu-3.20.3

4.    steps:
```

##### Initialise pipeline : [build-docker.yaml] - [CODE-DESCRIPTION]

```markdown
1. jobs: defines a set of jobs to be run in the pipeline.
2. build: specifies the name of the job being configured.
3. Sets runner environment to 'ubuntu-3.20.3'.
  a. runs-on: specifies what runner and OS to use.
  b. 'ubuntu-3.20.3' sets runner to 'ubuntu-3.20.3'.
4. steps: defines the sequence of steps that the job will execute.
```

ℹ *️ Note Ubuntu is the runner only and should not be confused with the alpine installation used as a base for the
markdownlint-cli docker.*

---

##### Checkout code : [build-docker.yaml] - [CODE]

```yaml
# Checkout Code

1. - name: Checkout Code
2.   uses: actions/checkout@v4
```

##### Checkout code : [build-docker.yaml] - [CODE-DESCRIPTION]

```markdown
1. name: text label displayed when GitHub Actions executes a YAML script.
  a. Set name to 'Checkout Code'.

2. uses: tells GitHub Actions it is about to use a prebuild Actions script.     
  a. Set prebuild environment to 'actions/checkout@v4'.
    i. 'actions/' enters the GitHub 'actions' namespace.
    ii. 'checkout' selects the GitHub 'checkout' script.
    iii. '@' selects the GitHub Actions script version.
    iiii. 'v4' selects version 4 of the script.
```

##### Set up docker with buildx : [build-docker.yaml] - [CODE]

```yaml
   # Set up Docker With Buildx

1. - name: Set up Docker Buildx
2.   uses: docker/setup-buildx-action@v4
```

##### Set up docker with buildx : [build-docker.yaml] - [CODE-DESCRIPTION]

```markdown
1. name: text label displayed when GitHub Actions executes a YAML script.
  a. Set name to 'Set up Docker Buildx'.
  
2. uses: tells GitHub Actions it is about to use a prebuild Actions script.     
  a. Set prebuild environment to 'docker/setup-buildx-action@v4'.
    i. 'docker/' enters the GitHub 'docker' namespace.
    ii. 'setup-buildx-action' selects the GitHub 'setup-buildx-action' script.
    iii. '@' selects the GitHub Actions script version.
    iiii. 'v4' selects version 4 of the script.
```

##### Log in to docker hub : [build-docker.yaml] - [CODE]

```yaml
1. - name: Log in to Dockerhub
2.   uses: docker/login-action@v3
3.   with:
4.    username: ${{ secrets.DOCKER_USERNAME }}
5.    password: ${{ secrets.DOCKERHUB_PAT }}
```

##### Log in to docker hub : [build-docker.yaml] - [CODE-DESCRIPTION]

```markdown
1. name: text label displayed when GitHub Actions executes a YAML script.
  a. Set name to 'Log in to Dockerhub'.
    
2. uses: tells GitHub Actions it is about to use a prebuild Actions script.     
  a. Set prebuild environment to 'docker/login-action@v4'.
    i. 'docker/' enters the GitHub 'docker' namespace.
    ii. 'login-action' selects the GitHub 'login-action' script.
    iii. '@' selects the GitHub Actions script version.
    iiii. 'v4' selects version 4 of the script.
    
3. with: puts the workflow in at state ready to accept login credentials.

4. username: set username.
  a. username: states that a username will follow.
  b. ${{ ... }} indicates an environment variable.
        ii. 'secrets.' refers to the namespace in which the username secret is kept.
        iii. 'DOCKER_USERNAME' is the name of the environment variable secret.
    
5. password: set password.
  a. password: states that a password will follow.
  b. ${{ ... }} indicates an environment variable.
        ii. 'secrets.' refers to the namespace in which the password secret is kept.
        iii. 'DOCKER_PAT' is the name of the environment variable secret.
```

⚠️ Password is not the Dockerhub account password but a personal [personal access token][6] or  [PAT](#glossary).

##### Build and push Docker image with SBOM and provenance : [build-docker.yaml] - [CODE]

```yaml
1. - name: Build and push Docker image with SBOM and Provenance
2.   if: github.event.before != github.event.after
3.   run: |
4.      docker buildx build \
5.       --sbom=true \
6.       --provenance=true \
7.       --tag monkeyknuckles/markdownlint-cli2:latest \
8.       --push .
```

##### Build and push Docker image with SBOM and provenance : [build-docker.yaml] - [CODE-DESCRIPTION]

```markdown
1. name: text label displayed when GitHub Actions executes a YAML script.
  a. Set name to 'Build and Push Docker Image With SBOM and Provenance'.
    
2. Compare repository to see if file has changed.
    a. if: conditional statement.
    b. Obtain first hash for comparison.
    c. '!=' is not.
    d. Obtain second hash for comparison.
    
3. run: executes a list of commands.
    a. '|' indicates the following instructions will be in list format.
    
4. Build Dockerfile with docker buildx function.
    a. Calls the 'docker' program.
    b. Using the 'buildx' command.
    c. '\' continuing the list to the next line.
    
5. Enable SBOM.
    a. Set SBOM to true.
    b. '\' continuing the list to the next line.
    
6. Enable provenance.
    a. Set provenance to true.
    b. '\' continuing the list to the next line.
    
7. Tag repository with 'monkeyknuckles/markdownlint-cli2:latest' so that it pushes the docker to the correct container.
    a. '--tag' is a label for the container.
    a. 'monkeyknuckles' is the account namespace.
    b. '/markdownlint-cli2' is the docker container name.
    c. ':latest' is the version tag to use.

8. Push dockerfile to Dockerhub using the flags and switches detailed above.
```

---

[BACK TO TOP](#markdownlint-cli2-cicd-pipeline-docker-project-programmers-manual)

---

### LINT MARKDOWN [LINT-MARKDOWN.YAML] 📄

#### Attribute Table : [lint-markdown.yaml]

| Attribute             | Value                           |
|-----------------------|---------------------------------|
| Asset Name            | lint-markdown.yaml              |
| Relative Path         | .github/workflows               |
| Hidden                | Inherited                       |
| Include in Repository | Yes                             |
| Managed               | Yes                             |
| Asset Type            | YAML                            |

#### Asset Purpose : [lint-markdown.yaml]

Keeping clean markdown files and documentation makes it easier for new developers to contribute and maintains repository
integrity.

#### Asset Contents Description : [lint-markdown.yaml]

To test the Dockerhub container connection and to lint test files in 'markdown-fail'.

#### Asset Code Breakdown : [lint-markdown.yaml]

1. Set workflow title label.
2. Performs actions on successful push or pull request.
3. Setup linting job.
4. Checkout code.
5. Copy markdownlint-cli2 configuration file to the workspace.
6. Lint all markdown files.

##### Set workflow title label : [lint-markdown.yaml] - [CODE]

```yaml
1. name: Lint Markdown - markdownlint-cli2
```

##### Set workflow title label : [lint-markdown.yaml] - [CODE-DESCRIPTION]

```markdown
 1. name: text label displayed when GitHub Actions executes a YAML script.
   a. Set name to 'Build and Push Docker Image'.
```

##### Performs actions on successful push or pull request : [lint-markdown.yaml] - [CODE]

```yaml
# Performs Actions On Successful Push or Pull Request

1. on: [push, pull_request]
```

##### Performs Actions On Successful Push or Pull Request : [lint-markdown.yaml] - [CODE-DESCRIPTION]

```markdown
1. on: automatically triggers a workflow when 'on:' condition as been met.
```

##### Setup linting job : [lint-markdown.yaml] - [CODE]

```yaml
# Setup Linting Job

1. jobs:
2.  lint:
3.    runs-on: ubuntu-latest
4.    
5.    container:
6.      image: monkeyknuckles/markdownlint-cli2
7.      options: --user root

8.    steps:
 ```

##### Setup linting job : [lint-markdown.yaml] - [CODE-DESCRIPTION]

```markdown
1. jobs: provides a unique ID. Each workflow can have one or more jobs.
2. lint: identifies the type of job for organisational purposes.

3. runs-on: specifies what runner and OS to use.
    a. sets OS to Ubuntu version 3.20.3.
    
4. container: sets container options.

5. image: states a Docker image will be used.
    a. 'monkeyknuckles' is the name of the Dockerhub account.
    b. 'markdownlint-cli2' is the name of the individual container to connect to.

6. options: set container options. 
  a. Set user to root to avoid permissions issues.
  
8. steps: defines the sequence of steps that the job will execute.
```

##### Checkout code : [lint-markdown.yaml] - [CODE]

```yaml
# Checkout Code

1. - name: Checkout Code
2.   uses: actions/checkout@v4
```

##### Checkout code : [lint-markdown.yaml] - [CODE-DESCRIPTION]

```markdown
 1. name: text label displayed when GitHub Actions executes a YAML script.
   a. Set name to 'Checkout Code'.
    
2. uses: tells GitHub Actions it is about to use a built-in script.
    a. Point to GitHub Actions library.
    b. Execute version 4 of the checkout code script. 
```

##### Copy markdownlint-cli2 Configuration To the Workspace : [lint-markdown.yaml] - [CODE]

```yaml
# Copy markdownlint-cli2 Configuration To the Workspace

1.  - name: Copy markdownlint config
2.    run: cp /app/.markdownlint.jsonc $GITHUB_WORKSPACE
```

##### Copy markdownlint-cli2 configuration to the workspace : [lint-markdown.yaml] - [CODE-DESCRIPTION]

```markdown
1. name: text label displayed when GitHub Actions executes a YAML script.
    a. 'Copy markdownlint config' is the text that will be displayed.
    
2. run: executes the following commands.
    a. cp /app/.markdownlint.jsonc' copies the markdownlint configuration file '.markdownlint.jsonc' from the container
    'app' folder to $GITHUB_WORKSPACE.
```

##### Lint all markdown files : [lint-markdown.yaml] - [CODE]

```yaml
# Lint All Markdown Files
    
1.   - name: Run markdownlint-cli2
2.     run: markdownlint-cli2 "**/*.md" "#node_modules"
```

##### Lint all markdown files : [lint-markdown.yaml] - [CODE DESCRIPTION]

```markdown
1. name: text label displayed when GitHub Actions executes a YAML script.
    a. 'Run markdownlint-cli2' is the text that will be displayed.
    
2. run: executes the following commands.
    a. 'markdownlint-cli2' executes the markdownlint-cli2 program.
    b. "**/*.md" tells markdownlint-cli2 to search all markdown files in the entire project directory.
    c. "#node_modules" tell markdownlint-cli2 to ignore this directory when scanning for markdown files. 
```

---

[BACK TO TOP](#markdownlint-cli2-cicd-pipeline-docker-project-programmers-manual)

---

### LINT SPELLING [LINT-SPELLING.YAML] 📄

#### Attribute Table : [lint-spelling.yaml]

| Attribute             | Value             |
|-----------------------|-------------------|
| Asset Name            | lint-spelling.yaml|
| Relative Path         | .github/workflows |
| Hidden                | Yes               |
| Include in Repository | Inherited         |
| Managed               | Yes               |
| Asset Type            | YAML              |

#### Asset Purpose : [lint-spelling.yaml]

Keeps the repository clean by flagging up spelling mistakes.

#### Asset Contents Description : [lint-spelling.yaml]

Contains a YAML script to check spellings in all project files using cSpell.

#### Asset Code Breakdown : [lint-spelling.yaml]

1. Set workflow title label.
2. Perform actions on successful push or pull request.
3. Setup Spellchecking Job.
4. Checkout code.
5. Run cSpell to check All project files.

##### set workflow title Label : [lint-spelling.yaml] - [CODE]

```yaml
# Set Workflow Title Label

1. name: Spellcheck - cSpell
```

##### set workflow title Label : [lint-spelling.yaml] - [CODE DESCRIPTION]

```markdown
 1. name: text label displayed when GitHub Actions executes a YAML script.
   a. Set name to 'Spellcheck - cSpell'.
```

##### Perform actions on successful push or pull request : [lint-spelling.yaml] - [CODE]

```yaml
1. on: [push, pull_request]
```

##### Perform actions on successful push or pull request : [lint-spelling.yaml] - [CODE DESCRIPTION]

```markdown
1. on: automatically triggers a workflow when 'on:' condition as been met.
```

##### Setup Spellchecking Job : [lint-spelling.yaml] - [CODE]

```yaml
# Setup Spellchecking Job

1. jobs:
2.   spellcheck:
3.     runs-on: ubuntu-latest
    
4.     container:
5.       image: monkeyknuckles/cspell:latest
6.       options: --user root

    steps:
```

##### Setup Spellchecking Job : [lint-spelling.yaml] - [CODE DESCRIPTION]

```markdown
1. jobs: provides a unique ID. Each workflow can have one or more jobs.
2. spellcheck: identifies the type of job for organisational purposes.

3. runs-on: specifies what runner and OS to use.
    a. sets OS to Ubuntu version 3.20.3.
    
4. container: sets container options.

5. image: states a Docker image will be used.
    a. 'monkeyknuckles' is the name of the Dockerhub account.
    b. 'cspell' is the name of the individual container to connect to.

6. options: set container options. 
  a. Set user to root to avoid permissions issues.
  
8. steps: defines the sequence of steps that the job will execute.
```

##### Checkout code : [lint-spelling.yaml] - [CODE]

```yaml
# Checkout Code

1. - name: Checkout Code
2.   uses: actions/checkout@v4
```

##### Checkout code : [lint-spelling.yaml] - [CODE-DESCRIPTION]

```markdown
 1. name: text label displayed when GitHub Actions executes a YAML script.
   a. Set name to 'Checkout Code'.
    
2. uses: tells GitHub Actions it is about to use a built-in script.
    a. Point to GitHub Actions library.
    b. Execute version 4 of the checkout code script. 
```

##### Run cSpell to Check All Project Files : [lint-spellcheck.yaml] - [CODE]

```yaml
    # Run cspell to Check All Project Files

 1.     - name: Run cSpell
 2.       run: cspell --color --gitignore --no-cache --config .config/cspell.json "**/*"
```

##### Run cSpell to Check All Project Files : [lint-spellcheck.yaml] - [CODE DESCRIPTION]

```markdown
 1. name: text label displayed when GitHub Actions executes a YAML script.
   a. Set name to 'Run cSpell'.
   
2. run: executes a list of commands.
  a. 'cspell' executes cSpell.
  b. '--color' forces the terminal output text to be in colour.
  c. '--gitignore' prevents cSpell from spell checking the folders listed in the '.gitignore' file.
  d. 'no-cache' Ensures all files are checked a fresh and prevents issues with cache history.
  e. '--config' Specifies the location of the cspell.json file which contains dictionaries and word exception lists.
  f. '.config/cspell.json' is the location of the 'cspell.json' file.
  g. "**/*" specifies the glob pattern to describe that all files should be checked in all folders.
```

---

[BACK TO TOP](#markdownlint-cli2-cicd-pipeline-docker-project-programmers-manual)

---

### VSCODE [FOLDER] 📁

#### Attribute Table : [VSCode Folder]

| Attribute             | Value             |
|-----------------------|-------------------|
| Asset Name            | .vscode           |
| Relative Path         | ./                |
| Hidden                | Yes               |
| Include in Repository | Yes               |
| Managed               | Yes               |
| Asset Type            | FOLDER            |

#### Asset Purpose : [VSCode Folder]

To maintain a consistent development environment for all developers working on the project.

#### Asset Contents Description : [VSCode Folder]

Contains settings and configuration files relating to the setup of [VSC](#glossary) [IDE](#glossary).

---

[BACK TO TOP](#markdownlint-cli2-cicd-pipeline-docker-project-programmers-manual)

---

### IDE EXTENSIONS [EXTENSIONS.JSON] 📄

#### Attribute Table : [extensions.json]

| Attribute             | Value                       |
|-----------------------|-----------------------------|
| Asset Name            | extensions.json             |
| Relative Path         | .vscode                     |
| Hidden                | Inherited                   |
| Include in Repository | Yes                         |
| Managed               | Yes                         |
| Asset Type            | JSONC                       |

#### Asset Purpose : [extensions.json]

Keep a list of extensions needed to develop the project.

#### Asset Contents Description : [extensions.json]

Stores a list of extensions that the developer will be prompted to install when opening the project for the first time.

#### Asset Code Breakdown : [extensions.json]

1. Prompts user to install markdownlint VSC plugin.

##### Prompts user to installed required project plugins : [extensions.json] - [CODE]

```json
1. {
    // Prompts User To Installed Required Project Plugins
    
2.    "recommendations":
3.    [
4.        "DavidAnson.vscode-markdownlint"        // Prompt install for markdownlint plugin
5.        "streetsidesoftware.code-spell-checker" // Prompt install for cSpell
6.    ]
7. }
```

##### Prompts user to installed required project plugins : [extensions.json] - [CODE-DESCRIPTION]

```markdown
1. '{' open JSON file for writing.
2. recommendations: prompts user to install listed IDE extensions.
3. '[' opens list.
4. Includes markdownlint by David Anson.
5. Includes cSpell code spell checker plugin by streetsidesoftware.
6. ']' closes list.
7. '}' close JSON file for writing.
```

---

[BACK TO TOP](#markdownlint-cli2-cicd-pipeline-docker-project-programmers-manual)

---

### KEYBINDINGS [KEYBINDINGS.JSON] 📄

#### Attribute Table : [keybindings.json]

| Attribute             | Value                       |
|-----------------------|-----------------------------|
| Asset Name            | keybindings.json            |
| Relative Path         | .vscode                     |
| Hidden                | Inherited                   |
| Include in Repository | Yes                         |
| Managed               | Yes                         |
| Asset Type            | JSONC                       |

#### Asset Purpose : [keybindings.json]

To make development smoother by binding common functions to key combinations.

#### Asset Contents Description : [keybindings.json]

A list of keybindings coupled with actions.

##### JSON VSC keybindings legend

| Key         | Description                                                              |
|-------------|--------------------------------------------------------------------------|
| Key         | Binds key combination                                                    |
| Command     | Execute command to convert selected text into title case.                |
| When        | Context in which the 'transformToTitlecase' script will run.             |

#### Asset Code Breakdown : [keybindings.json]

1. Converts Selected Text To Title Case.

##### Automatic actions : [keybindings.json] - [CODE]

```json
    // Converts Selected Text To Title Case

  1. "key": "ctrl+shift+t",                           // Bind to CTRL + SHIFT + T
  2. "command": "editor.action.transformToTitlecase", // Transform text to title case
  3. "when": "editorTextFocus"                        // Transform selected text only
```

##### Automatic actions : [keybindings.json] - [CODE-DESCRIPTION]

```markdown
1. key: Binds key combination.
  a. Bind keys 'CTRL+SHIFT+T'.

2. command: execute command to convert selected text into title case.
  a. 'editor' enters the 'editor' namespace.
  b. '.action' enters the 'action' namespace.
  c. '.transformToTitlecase' is the script that transforms selected text into TitleCase.
  
3. when: context in which the 'transformToTitlecase' script will run.
  a. "editorTextFocus" checks if a selected text is in focus.
```

---

[BACK TO TOP](#markdownlint-cli2-cicd-pipeline-docker-project-programmers-manual)

---

### IDE SETTINGS [SETTINGS.JSON] 📄

#### Attribute Table : [settings.json]

| Attribute             | Value                       |
|-----------------------|-----------------------------|
| Asset Name            | settings.json               |
| Relative Path         | .vscode                     |
| Hidden                | Inherited                   |
| Include in Repository | Yes                         |
| Managed               | Yes                         |
| Asset Type            | JSONC                       |

#### Asset Purpose : [settings.json]

Maintain a consistent development environment for all developers working on this project.

#### Asset Contents Description : [settings.json]

Stores the majority of IDE based configurations.

#### Asset Code Breakdown : [settings.json]

1. Automatic actions.
2. Add a visible ruler to the IDE.
3. Format settings.
4. Confirmation settings.
5. Include otherwise hidden folders in the file tree view.
6. Include otherwise excluded files in project file search.
7. Markdownlint-Cli2 configuration options.

##### Automatic actions : [settings.json] - [CODE]

```yaml

1. "editor.formatOnSave": true,            // Automatically format files when saving
2. "editor.formatOnType": true,            // Automatically format code as you type
3. "files.autoSave": "afterDelay",         // All file changes will be saved periodically
4. "files.autoSaveDelay": 1000,            // Set autosave delay for 1000 milliseconds

```

##### Automatic actions : [settings.json] - [CODE-DESCRIPTION]

```markdown
1. Automatically format files when saving.
    a. Select 'editor.' scope.
    b. Select 'formatOnSave'
    c. Enable 'formatOnSave'.
    
2. Automatically format code as you type.
    a. Select 'editor.' scope.
    b. Select 'formatOnType'
    c. Enable 'formatOnType'
    
3. All file changes will be saved periodically.
    a. Select 'files.' scope.
    b. Select 'autoSave' 
    c. Save files after a delay.
    
4. Set autosave delay for 1000 milliseconds.
    a. Select 'files.' scope.
    b. Select 'autoSaveDelay' 
    c. Automatically save files every 1000ms. 
```

##### Add A visible ruler to the IDE : [settings.json] - [CODE]

```json
// Add a visible ruler in the IDE

1. "editor.rulers": 
2. [
3.     120 // set ruler width to 120 characters
4. ], 
```

##### Add A visible ruler to the IDE : [settings.json] - [CODE-DESCRIPTION]

```markdown
1. Enter correct scope.
    a. Select 'editor.' scope.
    b. Select 'rulers' scope.
    
2. Open settings list.
3. Set ruler limit to 120 to match the markdown 120 character limit.
4. Close settings list.
```

##### Format Settings : [settings.json] - [CODE]

```json
1. "editor.wrappingIndent": "same",        // Keep indentation level of wrapped lines
2. "files.eol": "\n",                      // Force all new files to be in LF format opposed to CRLF 
3. "editor.wordWrap": "wordWrapColumn",    // Automatically wrap lines of text
4. "editor.wordWrapColumn": 120,           // Set the wrap column to 120 characters
```

##### Format settings : [settings.json] - [CODE-DESCRIPTION]

```markdown
1. Keep indentation level of wrapped lines.
    a. Select 'editor' scope.
    b. Select 'wrappingIndent'. 
    c. "same" makes indents consistent across lines.
    
2. Force all new files to be in LF format opposed.
    a. Select 'files' scope.
    b. Select end of line.
    c. "\n" represents a linefeed.
    
3. Automatically wrap lines of text.
    a. Select 'editor' scope.
    b. Select 'wordWrap'.
    c. "wordWrapColumn" automatically breaks to a new line when character limit reaches the limit set in 
    'editor.wordWrapColumn'.
    
4. Set the wrap column to 120 characters.
    a. Select 'editor' scope.
    b. Select 'editor.wordWrapColumn'.
    c. Set word wrap character limit to 120 characters to match the markdown limit.
```

##### Confirmation Settings : [settings.json] - [CODE]

```json
1. "explorer.confirmDelete": false,        // Prevents prompt when deleting files
2. "explorer.confirmDragAndDrop": false,   // Prevents prompt when moving files
```

##### Confirmation settings : [settings.json] - [CODE-DESCRIPTION]

```markdown
1. Prevents prompt when deleting files.
    a. Select 'explorer' scope.
    b. Select 'confirmDelete'.
    c. Disable confirmation.
    
2. Prevents prompt when moving files.
    a. Select 'explorer' scope.
    b. Select 'confirmDragAndDrop'.
    c. Disable confirmation.
```

##### Include otherwise hidden folders in the file tree view : [settings.json] - [CODE]

```json
1. "files.exclude": 
2. {
3.    "**/.git": false,         // Show .git folder
4.    "**/node_modules": false, // Show node_modules
5.},
```

##### Include otherwise hidden folders in the File tree view : [settings.json] - [CODE-DESCRIPTION]

```markdown
1. Include Otherwise Hidden Folders In The File Tree View 
    a. Select 'files' scope.
    b. Exclude the listed files, directories or globs.
2. Open JSON for writing.
3. Allow all files contained in the '.git' visible in the VSC tree view.
4. Include all files contained in the 'node_modules' folder.
5. Close JSON for writing.
```

##### Include otherwise excluded files in project file search : [settings.json] - [CODE]

```json
1. "search.exclude": 
2. {
3.    "**/.git": false,         // Show .git folder
4.    "**/node_modules": false, // Show node_modules
5.},
```

##### Include otherwise excluded files in project file search : [settings.json] - [CODE-DESCRIPTION]

```markdown
1. Include Otherwise Hidden Folders In The File Tree View 
    a. Select 'search' scope.
    b. Exclude the listed files, directories or globs.
2. Open JSON for writing.
3. Allow all files contained in the '.git' folder searchable.
4. Include all files contained in the 'node_modules' folder.
5. Close JSON for writing.
```

##### Markdownlint-Cli2 configuration options : [settings.json] - [CODE]

```json
  // Markdownlint-Cli2 Configuration Options

  1. "markdownlint.config": 
  2. {
  3.     "extends": ".config/.markdownlint.jsonc" // Sets location of '.markdownlint.jsonc' config file.
  4. },
```

##### Markdownlint-Cli2 configuration options : [settings.json] - [CODE DESCRIPTION]

```markdown
1. Select markdownlint configuration options.
2. Open JSON for writing.
3. Sets markdownlint configuration file path.
  a. extends: specifies the location where the '.markdownlint.jsonc' file is stored.
  b. Sets 'extends:' path to ".config/.markdownlint.jsonc".
4. Close JSON for writing.
```

---

[BACK TO TOP](#markdownlint-cli2-cicd-pipeline-docker-project-programmers-manual)

---

### IDE SETUP TASKS [TASKS.JSON] 📄

#### Attribute Table : [tasks.json]

| Attribute             | Value                       |
|-----------------------|-----------------------------|
| Asset Name            | tasks.json                  |
| Relative Path         | .vscode                     |
| Hidden                | Inherited                   |
| Include in Repository | Yes                         |
| Managed               | Yes                         |
| Asset Type            | JSONC                       |

#### Asset Purpose : [tasks.json]

Streamline development environment setup for new developers.

#### Asset Contents Description : [tasks.json]

Script that copies node_modules folder over and sets up 'package.json' and 'package-lock.json'.

#### Asset Code Breakdown : [tasks.json]

1. Initialise tasks script.
2. Prepare script environment.
3. Install NodeJS locally.
4. Set task group.

##### Initialise tasks script : [tasks.json] - [CODE]

```json
1. {
    // Initialise Tasks Script 

2.     "version": "2.0.0", 
3.     "tasks":               
4.     [
5.         {
```

##### Initialise tasks script : [tasks.json] - [CODE-DESCRIPTION]

```markdown
1. '{' open 'tasks.json' file for writing.
2. Set version of script parser to version "2.0.0".
3. tasks: initialise tasks list.
4. '[' opens tasks list for writing.
5. '{' indicates script is to follow.
```

##### Prepare script environment : [tasks.json] - [CODE]

```json
   // Prepare Script Environment

1. "label": "Install dependencies",
2. "type": "shell",                
3. "command": "powershell",         
4. "args":     
 ```

##### Prepare script environment : [tasks.json] - [CODE-DESCRIPTION]

```markdown
1. label: displays label text as 'Install dependencies' while installing executing script.

2. type: specifies the type of script to run.
    a. Sets script type to shell. 
3. command: specifies the command shell to run script with.
    a. Set command shell to powershell.
4. args: indicates that shell arguments will follow.
```

##### Install NodeJS locally : [tasks.json] - [CODE]

```json
// Install NodeJS Locally

1. "args": 
2. [
3.     "-Command",
4.     "if (-Not (test-path 'node_modules'))",
5.     "{",
6.     "    write-host 'Installing dependencies, please wait...';",
7.     "    npm install;",
8.     "    write-host 'npm install completed.'",
9.     "}", 
10.         "else",
11.     "{",
12.     "    write-host 'node_modules already exists. Skipping npm install.'",
13.     "}"
14. ],
```

##### Install NodeJS locally : [tasks.json] - [CODE-DESCRIPTION]

ℹ *This effectively one line of code broken into parts. the double quotation marks are used to split the code into
separate lines so it can be parsed as one string.*

ℹ *The comma is used to indicate where the code splits to a new line.*

```markdown
1. "args": States that a command will follow.
2. '[' open arguments for writing.
3. "Uses powershell for executing commands.

4. Check if 'node_modules' path exists.
  a. 'if' is a conditional statement.
  b. '(' opens conditional statement to check.
  c. '-Not' checks if the statement to follow is not true.
  d. '(' open conditional statement to check.
  e. 'test-path' is a powershell program to check if a directory exists.
  f. 'node_modules' is the folder to check the existence of.
  g. ')'
  h. ')' Close conditional statement.
  i. ')' Close conditional statement.
  
5. '{' effective then statement. 
6. Print 'Installing dependencies, please wait...' to terminal.
  a. 'write-host' prints text to terminal.
  b. Prints 'Installing dependencies, please wait...' to terminal.
  
7. Install NodeJS locally including packages specified in '[package.json](#package-file-packagejson-)'.
  a. 'npm' executes the NPM program.
  b. Execute npm with install flag.
  
8. Print 'npm install completed.' to terminal.
9. ')' Close conditional statement.
10. Alternate conditions for when the 'node_modules' folder already exists.
11. '(' opens conditional statement to check.
12. Prints 'node_modules already exists. Skipping npm install.' to terminal.
13. ')' Close conditional statement.
```

##### Set task group : [tasks.json] - [CODE]

```json
1. "group": 
2. {
3.    "kind": "build",
4.    "isDefault": true
5. },
```

##### Set task group : [tasks.json] - [CODE-DESCRIPTION]

```markdown
1. group: defines to which execution group this task belongs to. It supports "build" to add it to the build group and 
"test" to add it to the test group.

2. Open group for writing.

3. "kind": The task's execution group.
    a. build: Marks the task as a build task accessible through the 'Run Build Task' command.
    
4. isDefault: defines if this task is the default task in the group, or a glob to match the file which should trigger 
this task.

5. '}' Close group for writing.
```

---

[BACK TO TOP](#markdownlint-cli2-cicd-pipeline-docker-project-programmers-manual)

---

### MARKDOWN FAIL [FOLDER] 📁

#### Attribute Table : [Markdown Fail Folder]

| Attribute             | Value             |
|-----------------------|-------------------|
| Asset Name            | markdown-fail     |
| Relative Path         | ./                |
| Hidden                | No                |
| Include in Repository | Yes               |
| Managed               | Yes               |
| Asset Type            | FOLDER            |

#### Asset Purpose : [Markdown Fail Folder]

To test markdown rules set in '.markdownlint.jsonc'.

#### Asset Contents Description : [Markdown Fail Folder]

Contains as file for each markdownlint test. All of the rule settings can be found
[here](#asset-contents-description--markdownlintjsonc).

Each file contains fail test code taken from the [markdownlint manual][7].

ℹ *These tests can be used to compare to the markdown configuration file in order to make sure everything is setup
correctly.*

---

[BACK TO TOP](#markdownlint-cli2-cicd-pipeline-docker-project-programmers-manual)

---

### NODE MODULES [FOLDER] 📁

#### Attribute Table : [Node Modules Folder]

| Attribute             | Value             |
|-----------------------|-------------------|
| Asset Name            | node_modules      |
| Relative Path         | ./                |
| Hidden                | No                |
| Include in Repository | No                |
| Managed               | No                |
| Asset Type            | FOLDER            |

#### Asset Purpose : [Node Modules]

'node_modules' is stored locally to streamline the IDE setup.

#### Asset Contents Description : [Node Modules]

 Store source code for various plugins and utilities.

---

[BACK TO TOP](#markdownlint-cli2-cicd-pipeline-docker-project-programmers-manual)

---

### GIT IGNORE FILE [.GITIGNORE] 📄

#### Attribute Table : [.gitignore]

| Attribute             | Value                       |
|-----------------------|-----------------------------|
| Asset Name            | .gitignore                  |
| Relative Path         | ./                          |
| Hidden                | Yes                         |
| Include in Repository | Yes                         |
| Managed               | Yes                         |
| Asset Type            | TEXT                        |

#### Asset Purpose : [.gitignore]

Prevents code-base from becoming cluttered.

#### Asset Contents Description : [.gitignore]

Lists files to exclude from the repository when committing.

ℹ *The contents of this file has not been listed here as they are sufficiently commented within the file.*

---

[BACK TO TOP](#markdownlint-cli2-cicd-pipeline-docker-project-programmers-manual)

---

### CODE OF CONDUCT : [CODE_OF_CONDUCT.MD] 📄

#### Attribute Table : [CODE_OF_CONDUCT.md]

| Attribute             | Value                   |
|-----------------------|-------------------------|
| Asset Name            | CODE_OF_CONDUCT.md      |
| Relative Path         | ./                      |
| Hidden                | No                      |
| Include in Repository | Yes                     |
| Managed               | Yes                     |
| Asset Type            | MARKDOWN                |

#### Asset Purpose : [CODE_OF_CONDUCT.md]

Provides guidelines to ensure that people agree to treat the repository with respect and professionalism.

#### Asset Contents Description : [CODE_OF_CONDUCT.md]

Contains an agreement for all people contributing to the project must agree to. This document mainly contains
information regarding community behaviour.

---

[BACK TO TOP](#markdownlint-cli2-cicd-pipeline-docker-project-programmers-manual)

---

### CHANGELOG : [CHANGELOG.MD] 📄

#### Attribute Table : [CHANGELOG.md]

| Attribute             | Value                   |
|-----------------------|-------------------------|
| Asset Name            | CHANGELOG.md            |
| Relative Path         | ./                      |
| Hidden                | No                      |
| Include in Repository | Yes                     |
| Managed               | Yes                     |
| Asset Type            | MARKDOWN                |

#### Asset Purpose : [changelog.md]

Keeps track of changes made to the repository.

#### Asset Contents Description : [changelog.md]

A changelog based on conventional changelog standards.

### CONTRIBUTING [CONTRIBUTING.MD] 📄

#### Attribute Table : [contributing.md]

| Attribute             | Value                       |
|-----------------------|-----------------------------|
| Asset Name            | CONTRIBUTING.md             |
| Relative Path         | ./                          |
| Hidden                | No                          |
| Include in Repository | Yes                         |
| Managed               | Yes                         |
| Asset Type            | MARKDOWN                    |

#### Asset Purpose : [contributing.md]

To maintain constant standards across the entire code base including documentation.

#### Asset Contents Description : [contributing.md]

Provides detailed information for developers on how to make changes and update documentation according to the project
standards.

ℹ *This file is picked up and processed by GitHub.*

---

[BACK TO TOP](#markdownlint-cli2-cicd-pipeline-docker-project-programmers-manual)

---

### DOCKER FILE [DOCKERFILE] 📄

#### Attribute Table : [Dockerfile]

| Attribute             | Value                       |
|-----------------------|-----------------------------|
| Asset Name            | Dockerfile                  |
| Relative Path         | ./                          |
| Hidden                | No                          |
| Include in Repository | Yes                         |
| Managed               | Yes                         |
| Asset Type            | DOCKERFILE                  |

#### Asset Purpose : [Dockerfile]

Build Dockerfile.

#### Asset Contents Description : [Dockerfile]

Contains the build script required to create markdownlint-cli2 Docker container.

##### Dockerfile keyword glossary : [Dockerfile]

| Key         | Description                                                              |
|-------------|--------------------------------------------------------------------------|
| FROM        | Selects which base image to use.                                         |
| WORKDIR     | Set the working directory.                                               |
| RUN         | Executes program.                                                        |
| USER        | Set user to.                                                             |
| COPY        | Copies a file or folder from one place to another.                       |
| &&          | Logical operator to ensure this command was successful before continuing.|
| \           | Line continuation character.                                             |

#### Asset code breakdown : [Dockerfile]

1. Use Alpine image with Node.js 23.
2. Set the working directory to app.
3. Copy the markdownlint configuration file to the container.
4. Install markdownlint-cli2 globally.
5. Update cross-spawn.
6. Update OpenSSL to the latest version using APK.
7. Create a non-root user and group.
8. Switch to the non-root user (appuser).
9. Start a shell when the container is run.

##### Use the latest Alpine image with Node.js 23 : [Dockerfile] - [CODE]

```dockerfile
# Use the latest Alpine image with Node.js 23 

1. FROM node:23-alpine
```

##### Use the latest Alpine image with Node.js 23 : [Dockerfile] - [CODE-DESCRIPTION]

```markdown
1. FROM selects which base image to use.
    a. Specifies 'node:23-alpine' should be used as the base image.
```

##### Set the working directory to app : [Dockerfile] - [CODE]

**Purpose:** The work directory is the folder when the project files to be linted are stored.

```dockerfile
# Set the working directory to app

1. WORKDIR /app
```

##### Set the working directory to app : [Dockerfile] - [CODE-DESCRIPTION]

```markdown
1. WORKDIR Set the working directory.
        a. Create app folder.
```

##### Copy the markdownlint configuration file to the container : [Dockerfile] - [CODE]

```dockerfile
# Copy the markdownlint configuration file to the container

COPY .config/.markdownlint.jsonc /app/.config/.markdownlint.jsonc
```

##### Copy the markdownlint configuration file to the container : [Dockerfile] - [CODE-DESCRIPTION]

```markdown
1. COPY '.markdownlint.jsonc' from .config to app folder.
```

##### Install markdownlint-cli2 globally : [Dockerfile] - [CODE]

**Purpose:** Installs the markdownlint-cli2 program globally which is required to lint markdown files.

```dockerfile
# Install markdownlint-cli2 globally

1. RUN npm install -g markdownlint-cli2
```

##### Install markdownlint-cli2 globally : [Dockerfile] - [CODE-DESCRIPTION]

```markdown
1. Install markdownlint-cli2 globally
    a. RUN Executes program.
    b. Run npm with install flag
    c. 'g' set global flag to install on container globally.
    d. Mark markdownlint-cli2 as the package to install.
```

##### Update cross-spawn : [Dockerfile] - [CODE]

**Purpose:** Cross-spawn comes as part of the base Alpine package and needs to be updated due to security concerns.

```yaml
# Update cross-spawn

1. RUN mkdir -p /usr/local/etc && \
2.     echo '{ "overrides": { "cross-spawn": "7.0.6" } }' > /usr/local/etc/npmrc && \
3.     npm config set globalconfig /usr/local/etc/npmrc && \
4.     npm install -g npm
```

##### Update cross-spawn : [Dockerfile] - [CODE-DESCRIPTION]

```markdown
1. Create 'etc' directory.
    a. RUN Executes program.
    b. Make directory.
    c. -p ensures all sub directories are also created.
    d. Set /usr/local/etc as the directory to be created.
    e. '&&' is a logical operator to ensure this command was successful before continuing.
    f. '\' Line continuation character.
2. Prepares npm config file to override cross-spawn to v7.0.6.
    a. output result using STDOUT (Standard out).
    b. '{ "overrides": { "cross-spawn": "7.0.6" } }' overrides cross-spawn version.
    c. '>' Redirection operator. It writes the output of the echo command into a file, overwriting its contents if the 
    file already exists.
    d. '/usr/local/etc/npmrc' specifies location of npm config file.
    e. '&&' is a logical operator to ensure this command was successful before continuing.
    f. '\' Line continuation character.
3. Tells npm to use /usr/local/etc/npmrc as its global configuration.
    a. 'npm' executes npm.
    b. A flag set to manage npm's configuration settings.
    c. 'Set' specifies that a configuration setting is being added or updated.
    d. 'globalconfig' specifies that global npm configuration wil be used.
    e. '/usr/local/etc/npmrc' specifies config location.
    f. '&&' is a logical operator to ensure this command was successful before continuing.
    g. '\' Line continuation character.
4. Update npm.
    a. 'npm' executes npm.
    b. 'install' installs npm.
    c. '-g' flags npm to install globally.
    d. 'npm' is the package to be installed.
```

⚠️ *cross-spawn is updated in order to avoid CVE errors reports as there is a known CVE. issue.*

##### Update OpenSSL to the latest version using APK - [CODE]

**Purpose:** OpenSSL comes as part of the base Alpine package and needs to be updated due to security concerns.

```yaml
# Update OpenSSL to the latest version using APK

1. RUN apk update && \
2.    apk add --no-cache openssl && \
3.    apk upgrade openssl
```

##### Update OpenSSL to the latest version using APK - [CODE - DESCRIPTION]

```markdown
1. Update Alpine Package Manager.
    a. RUN executes a program.
    b. 'apk' is the package to run.'
    c. 'update' gets the latest version of APK.
    d. '&&' logical operator to ensure this command was successful before continuing.
    e. '\' Line continuation character.

2. Update openssl.
    a. RUN executes a program.
    b.'apk' is the program to install.
    c. '--no-cache' ensures the correct versions are used.
    d. 'openssl' is the package to be updated.
    e. '&&' logical operator to ensure this command was successful before continuing.
    f. '\' Line continuation character.

3. 'apk' is the package to run.'
    a. Upgrade 'openssl' to the latest versions of openssl.

```

⚠️ *openssl is updated in order to avoid CVE errors reports as there is a known CVE issue.*

##### Create a non-root user and group : [Dockerfile] - [CODE]

```dockerfile
# Create a non-root user and group

1. RUN addgroup -S appgroup && adduser -S appuser -G appgroup
```

##### Create a non-root user and group : [Dockerfile] - [CODE-DESCRIPTION]

```markdown
1. Create a non-root user and group
    a. RUN Executes program.
    b. Create a new group in the Alpine Linux-based container image.
    c. 'S' Stands for "System" group; it creates a system group instead of a regular user group.
    
    d. Specifies the name of the group being created (appgroup).
    e. Logical AND operator; ensures that the next command runs only if the previous one succeeds.
    
    f. A command to create a new user in the Alpine Linux-based container image.
    
    g. Stands for "System" user; it creates a system user with limited privileges.
    
    h. Specifies the name of the user being created (appuser).
    i. Specifies the group to which the new user will belong.
    j. The name of the group that the new user (appuser) will be added to.
```

##### Switch to the non-root user (appuser) : [Dockerfile] - [CODE]

```yaml
# Switch to the non-root user (appuser)

USER appuser
```

##### Switch to the non-root user (appuser) : [Dockerfile] - [CODE-DESCRIPTION]

```markdown
1. Set user to 'appuser'.
  a. USER Specifies a user.
  b. Sets user to 'appuser'.
```

##### Start a shell when the container is run : [Dockerfile] - [CODE]

```yaml
# Start a shell when the container is run

CMD ["/bin/sh"]
```

##### Start a shell when the container is run : [Dockerfile] - [CODE-DESCRIPTION]

```markdown
1. 'CMD' Sets initial command path.
    a. ["/bin/sh"] sets the path to start the docker in.
```

---

[BACK TO TOP](#markdownlint-cli2-cicd-pipeline-docker-project-programmers-manual)

---

### PACKAGE LOCK FILE [PACKAGE-LOCK.JSON] 📄

#### File Attribute Table : [package-lock.json]

| Attribute             | Value                       |
|-----------------------|-----------------------------|
| Asset Name            | package-lock.json           |
| Relative Path         | ./                          |
| Hidden                | No                          |
| Include in Repository | Yes                         |
| Managed               | No                          |
| Asset Type            | JSON                        |

#### Asset Purpose : [package-lock.json]

Keeps all package dependency versions pinned. This ensures the environment is the same for all developers and minimises
errors.

#### Asset Contents Description : [package-lock.json]

Keeps a list of all packages and their dependencies with pinned version numbers.

---

[BACK TO TOP](#markdownlint-cli2-cicd-pipeline-docker-project-programmers-manual)

---

### PACKAGE FILE [PACKAGE.JSON] 📄

#### Attribute Table : [package.json]

| Attribute             | Value                       |
|-----------------------|-----------------------------|
| Asset Name            | package.json                |
| Relative Path         | ./                          |
| Hidden                | No                          |
| Include in Repository | Yes                         |
| Managed               | No                          |
| Asset Type            | JSON                        |

#### Asset Purpose : [package.json]

Keeps all package dependency versions pinned. This ensures the environment is the same for all developers and minimises
errors.

#### Asset Contents Description : [package.json]

Stores list of Node packages needed in the project.

---

[BACK TO TOP](#markdownlint-cli2-cicd-pipeline-docker-project-programmers-manual)

---

### README FILE [README.MD] 📄

#### Attribute Table : [README.md]

| Attribute             | Value                       |
|-----------------------|-----------------------------|
| Asset Name            | README.md                   |
| Relative Path         | ./                          |
| Hidden                | No                          |
| Include in Repository | Yes                         |
| Managed               | Yes                         |
| Asset Type            | MARKDOWN                    |

#### Asset Purpose : [README.md]

Provide information about the project to enable users and developers to properly interact with the project.

#### Asset Contents Description : [README.md]

Provides an overall description of the project and other useful information.

---

[BACK TO TOP](#markdownlint-cli2-cicd-pipeline-docker-project-programmers-manual)

---

### VERSION FILE [VERSION.TEXT] 📄

#### Attribute Table : [version.text]

| Attribute             | Value                       |
|-----------------------|-----------------------------|
| Asset Name            | version.text                |
| Relative Path         | ./                          |
| Hidden                | No                          |
| Include in Repository | Yes                         |
| Managed               | Yes                         |
| Asset Type            | TEXT                        |

#### Asset Purpose : [version.text]

Too keep track of versions. This file is updated when a new version is pulled and merged with the master branch.

#### Asset Contents Description : [version.text]

A string of text consisting of a 'v' followed by a three digit version number based on the semantic versioning system.
(Major, Minor, Patch).

See. [Semantic Versioning 2.0.0 | Semantic Versioning][8]

---

[BACK TO TOP](#markdownlint-cli2-cicd-pipeline-docker-project-programmers-manual)

---

## GLOSSARY

| Term   | Definition                                                                      |
|--------|---------------------------------------------------------------------------------|
| APK    | Alpine Package Keeper.                                                          |
| PAT    | [Personal access tokens][9] are used instead of the Dockerhub account password. |
| SBOM   | Software Bill of Materials is list of package dependencies.                     |
| VSC    | Microsoft Visual Studio Code.                                                   |
| IDE    | Integrated Development Environment.                                             |
| CI/CD  | Continues Integration Continues Development.                                    |
| JSONC  | JavaScript Object Notation Commented.                                           |
| GIT    | Source control software.                                                        |
| NPM    | Network Package Manager. Used by Node.JS to manage plugins and other tools.     |
| MD     | Markdown.                                                                       |
| PNG    | Portable Network Graphic.                                                       |
| YAML   | Yet another markup language. Scripts that control CI/CD pipelines.              |
| OS     | Operating system.                                                               |
| Secret | Encrypted key stored as an environment variable.                                |
| Git    | Git source control used for managing code base.                                 |

## RESOURCES

  [1]: https://commonmark.org
  [2]: https://www.conventionalcommits.org/en/v1.0.0/#specification
  [3]: https://git-scm.com/doc
  [4]: https://docs.github.com/en/communities/using-templates-to-encourage-useful-issues-and-pull-requests/syntax-for-githubs-form-schema
  [5]: https://docs.github.com/en/communities/using-templates-to-encourage-useful-issues-and-pull-requests/syntax-for-githubs-form-schema
  [6]: https://docs.docker.com/security/for-developers/access-tokens
  [7]: https://github.com/DavidAnson/markdownlint/blob/main/doc/Rules.md
  [8]: https://semver.org/
  [9]: https://docs.docker.com/security/for-developers/access-tokens
