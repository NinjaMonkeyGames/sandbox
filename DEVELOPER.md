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

[!TOC]

---

## TARGET AUDIENCE

This document is for developers actively working on this project.

## PROJECT PURPOSE

The purpose of this program is to provide a Docker container setup that will lint Markdown files as part of a
[CI/CD](#glossary) workflow.

## PROJECT ASSETS

### FILE TREE VIEW

C:\Users\mailm\Documents\GitHub\sandbox
├─.gitignore
├─.prettierrc
├─CHANGELOG.md
├─CODE_OF_CONDUCT.md
├─CONTRIBUTING-NEW.MD
├─CONTRIBUTING.md
├─DEVELOPER.md
├─Dockerfile
├─package-lock.json
├─package.json
├─README.md
├─tree.md
├─markdown-fail
|       ├─md001.md
|       ├─md003.md
|       ├─md004.md
|       ├─md005.md
|       ├─md007.md
|       ├─md009.md
|       ├─md010.md
|       ├─md011.md
|       ├─md012.md
|       ├─md013.md
|       ├─md018.md
|       ├─md019.md
|       ├─md020.md
|       ├─md021.md
|       ├─md022.md
|       ├─md023.md
|       ├─md024.md
|       ├─md025.md
|       ├─md026.md
|       ├─md027.md
|       ├─md028.md
|       ├─md029.md
|       ├─md030.md
|       ├─md031.md
|       ├─md032.md
|       ├─md033.md
|       ├─md034.md
|       ├─md035.md
|       ├─md036.md
|       ├─md037.md
|       ├─md038.md
|       ├─md039.md
|       ├─md040.md
|       ├─md041.md
|       ├─md042.md
|       ├─md043.md
|       ├─md044.md
|       ├─md045.md
|       ├─md046.md
|       ├─md047.md
|       ├─md048.md
|       ├─md049.md
|       ├─md050.md
|       ├─md051.md
|       ├─md052.md
|       ├─md053.md
|       ├─md054.md
|       ├─md055.md
|       └md056.md
├─.vscode
|    ├─extensions.json
|    ├─keybindings.json
|    ├─settings.json
|    └tasks.json
├─.github
|    ├─workflows
|    |     ├─build-docker.yaml
|    |     ├─lint-markdown.yaml
|    |     └lint-spelling.yaml
|    ├─ISSUE_TEMPLATE
|    |       ├─bug-report-template.yaml
|    |       └feature-request-template.yaml
├─.config
|    ├─.markdownlint-cli2.jsonc
|    ├─commitlint.config.js
|    ├─cspell.json
|    ├─custom-markdownlint-rules
|    |             └capitalised-headings.js
├─.artefacts
|     ├─logo.png
|     └monkey-knuckles-avatar.png

### ARTEFACTS FOLDER [.ARTEFACTS] 📁

#### Attribute Table : [.artefacts]

| Attribute             | Value             |
|-----------------------|-------------------|
| Asset Name            | .artefacts        |
| Relative Path         | ./                |
| Hidden                | Yes               |
| Include in Repository | Yes               |
| Managed               | Yes               |
| Asset Type            | FOLDER            |
| Asset Size            | 14,463 Bytes      |

#### Asset Purpose : [.artefacts]

Store artefacts that are used throughout the CI/CD process but not necessarily a part of the project itself. This keeps everything internal to the CI/CD process.

#### Asset Contents Description : [.artefacts]

The '.artefacts' folder contains files such as logos, logs and other files that are used throughout the [CI/CD](#glossary) pipeline process.

---

[BACK TO TOP](#markdownlint-cli2-cicd-pipeline-docker-project-programmers-manual)

---

### LOGO [LOGO.PNG] 📄

#### Attribute Table : [logo.png]

| Attribute             | Value             |
|-----------------------|-------------------|
| Asset Name            | logo.png          |
| Relative Path         | .artefacts        |
| Hidden                | Inherited         |
| Include in Repository | Yes               |
| Managed               | Yes               |
| Asset Type            | PNG               |
| Asset Size            | 5,746 Bytes       |

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

| Attribute             | Value                       |
|-----------------------|-----------------------------|
| Asset Name            | monkey-knuckles-avatar.png  |
| Relative Path         | .artefacts                  |
| Hidden                | Inherited                   |
| Include in Repository | Yes                         |
| Managed               | Yes                         |
| Asset Type            | PNG                         |
| Asset Size            | 8,717 Bytes                 |

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

### CONFIGURATION FOLDER [.CONFIG] 📁

#### Attribute Table : [.config]

| Attribute             | Value             |
|-----------------------|-------------------|
| Asset Name            | .config           |
| Relative Path         | ./                |
| Hidden                | Yes               |
| Include in Repository | Yes               |
| Managed               | Yes               |
| Asset Type            | FOLDER            |
| Asset Size            | 10,676 Bytes      |

#### Asset Purpose : [.config]

Provide settings that allow the project to be linted consistently across the entire project based on predefined rules.

#### Asset Contents Description : [.config]

Contains configuration files for various [IDE](#glossary) plugins.

---

[BACK TO TOP](#markdownlint-cli2-cicd-pipeline-docker-project-programmers-manual)

---

### CUSTOM MARKDOWNLINT RULES FOLDER [CUSTOM-MARKDOWNLINT-RULES] 📁

#### Attribute Table : [custom-markdownlint-rules]

| Attribute             | Value                       |
|-----------------------|-----------------------------|
| Asset Name            | custom-markdownlint-rules   |
| Relative Path         | ./                          |
| Hidden                | Inherited                   |
| Include in Repository | Yes                         |
| Managed               | Yes                         |
| Asset Type            | FOLDER                      |
| Asset Size            | 1,709 Bytes                 |

#### Asset Purpose : [custom-markdownlint-rules]

To maintain repository integrity by providing extra markdown rules to keep the manual tidy and ensure consistent work.

#### Asset Contents Description : [custom-markdownlint-rules]

Contains JavaScript files each containing a custom markdownlint rules.

##### Custom markdown rules syntax glossary : [.vscode]

| Token       | Description                                                                |
|-------------|----------------------------------------------------------------------------|
| =           | Assignment operator.                                                       |
| ""          | String encapsulation.                                                      |
| ,           | Separate list items on to new line.                                        |

---

[BACK TO TOP](#markdownlint-cli2-cicd-pipeline-docker-project-programmers-manual)

---

### CAPITALISED HEADINGS CUSTOM MARKDOWNLINT RULE [CAPITALISED-HEADINGS.JS] 📄

#### Attribute Table : [capitalised-headings.js]

| Attribute             | Value                             |
|-----------------------|-----------------------------------|
| Asset Name            | capitalised-headings.js           |
| Relative Path         | .config/custom-markdownlint-rules |
| Hidden                | Inherited                         |
| Include in Repository | Yes                               |
| Managed               | Yes                               |
| Asset Type            | JavaScript                        |
| Asset Size            | 1,709 Bytes                       |

#### Asset Purpose : [capitalised-headings.js]

Provide extra linting for markdownlint-cli2.

#### Asset Contents Description : [capitalised-headings.js]

This function is a custom markdownlint-cli2 script that will check level one and two headings to ensure they are capitalised in-line with NMG policy.

#### Asset Code Breakdown : [capitalised-headings.js]

1. Module exports.
2. Meta data.
3. Heading capitalisation function.

##### Module exports : [capitalised-headings.js] - [CODE]

```javascript
// Module exports

1. module.exports =
2. {
```

##### Module exports : [capitalised-headings.js] - [CODE DESCRIPTION]

```markdown
1. Exports data to markdownlint-cli2.
2. Exposes module exports. 
```

##### Meta data : [capitalised-headings.js] - [CODE]

```javascript
// Meta data

1. names: ["capitalised-headings"],
2. description: "Ensure level 2 and 3 headings are fully capitalised.",
3. information: new URL("./CONTRIBUTING.md"),
4. tags: ["headings", "style"],
```

##### Capitalised headings : [capitalised-headings.js] - [CODE DESCRIPTION]

```markdown
1. names: specifies an identifiable name for the error.
2. description: provides a longer string of text to describe the error.
3. information: URL with rule explanation.
4. tags: identifies the category of linting error.
```

##### Heading capitalisation function : [capitalised-headings.js] - [CODE]

```javascript
  // Heading capitalisation function
  
1.   function: (params, onError) =>
2.   {
3.     params.lines.forEach((lineContent, lineIndex) =>
4.     {
5.       const headingMatch = lineContent.match(/^(#{2,3})\s+(.*)$/);
6.       if (headingMatch && headingMatch[2] !== headingMatch[2].toUpperCase())
7.       {
8.         onError
9.         ({
10.           lineNumber: lineIndex + 1,
11.           detail: `Heading not fully capitalised: "${headingMatch[2]}"`,
12.           context: lineContent.trim(),
13.         });
14.       }
15.     });
16.   },
17. };
```

##### Heading capitalisation function : [capitalised-headings.js] - [CODE DESCRIPTION]

```markdown
1. Declares the function defining the custom MarkdownLint rule. It takes params (file context) and onError 
   (error callback).
      a. 'params' contains the context of the Markdown file, including lines (an array of file lines).
      b. 'onError' callback used to report validation errors.
      c. '=>' Arrow function syntax.

2. Opening brace for the rule’s main logic.

3. Iterates through all lines in the Markdown file using forEach. Each line's content and index are processed.
  a. 'params.lines' accesses the lines array (each line in the Markdown file).
  b. '.forEach' iterates over each line.
  c. (lineContent, lineIndex) callback arguments for the line’s content and its index.
    i. 'lineContent' contains line text.
    ii. 'lineIndex' contains line index.
  
4. '{' opening brace for the line-processing logic.

5. Matches lines that start with 2 or 3 # symbols (Markdown headings) followed by whitespace and text.
  a. 'const headingMatch' declares a variable to store the result of the regular expression match.
  b. '=' assigns the following code.
  c. '.match(/^(#{2,3})\s+(.*)$/)' tests if the line matches the [RegEx](#glossary)
    i. '/' Delimiters marking the start and end of the regex pattern.
    ii. '^' Ensures the match starts at the beginning of the line.
    iii. '(#{2,3})' Captures 2 or 3 consecutive # symbols.
    iv. '#' Matches the literal # character.
    v. '{2,3}' Specifies that the # symbol must appear at least 2 times and at most 3 times.
    vi. '\s+' Matches one or more whitespace characters (spaces, tabs, etc.) after the # symbols.
    vii. '(.*)' Captures the remaining text on the line after the whitespace.
    viii. '.' Matches any character except line breaks.
    ix. '*' Matches zero or more occurrences of the preceding character (any character in this case).
    x. '$' Ensures the match ends at the last character of the line.
    
6. Checks if the line is a heading and its text is not fully capitalized. This is the core validation rule.
  a. 'if' starts a conditional block.
  b. 'headingMatch' checks if the line matches the heading pattern.
  c. '&&' logical AND operator.
  d. 'headingMatch[2]' accesses the heading text captured by the regex.
  e. '!== headingMatch[2].toUpperCase()' checks if the heading text is not fully capitalized.
  
7. Opening brace for the error-handling logic.
8. 'onError' invokes the onError function to report the validation error.
9. '({' begins the error details object passed to onError.
10. Specifies the line number where the issue was detected (1-based index).
11. Provides a detailed error message showing the problematic heading text.
  a. 'detail:' provides a descriptive error message.
  b. "Heading not fully capitalised: "${headingMatch[2]}": Inserts the problematic text into the message.

12. Provides additional context by including the trimmed content of the problematic line.
  a. 'context: lineContent.trim(),
' includes the problematic line content, trimmed of whitespace.

13. '});' ends the error details object passed to onError.
14. '}' closes the if block.
15. '});' closes the forEach callback, completing the iteration over lines.
16. '},' ends the main rule function logic.
17. '};' ends the custom MarkdownLint rule definition.

```

---

[BACK TO TOP](#markdownlint-cli2-cicd-pipeline-docker-project-programmers-manual)

---

### MARKDOWNLINT-CLI2 CONFIGURATION FILE [.MARKDOWNLINT-CLI2.JSONC] 📄

#### Attribute Table : [.markdownlint-cli2.jsonc]

| Attribute             | Value                             |
|-----------------------|-----------------------------------|
| Asset Name            | .markdownlint-cli2.jsonc          |
| Relative Path         | .config                           |
| Hidden                | Inherited                         |
| Include in Repository | Yes                               |
| Managed               | Yes                               |
| Asset Type            | JSONC                             |
| Asset Size            | 5,872 Bytes                       |

#### Asset Purpose : [.markdownlint-cli2.jsonc]

To maintain consistent markdown linting throughout the project.

#### Asset Contents Description : [.markdownlint-cli2.jsonc]

Contains a list of rules written in JSON(C) format that dictate how markdownlint-cli2 will lint markdown files.
There are 49 Different rules. These rules are prefixed with 'MD' followed by a three digit number.

 ℹ *Some of the numbers appear to missing! These are legacy rules that were removed from markdownlint.
 MD002, MD006, MD008, MD014, MD015, MD016, MD0017 have been removed.*

#### Asset Code Breakdown : [.markdownlint-cli2.jsonc]

1. Custom rules
2. Base setup
3. Rule code
    a. Setting
    b. Sub-setting description (If applicable)
    c. Value

##### Custom rules : [.markdownlint-cli2.jsonc] - [CODE]

```json
  // Custom rules

1.  "customRules": 
2.  [
3.    "../custom-markdownlint-rules/capitalised-headings.js"
4.  ],
```

##### Custom rules : [.markdownlint-cli2.jsonc] - [CODE DESCRIPTION]

```markdown
1. Module names or paths of custom rules to load and use when linting  markdown.

2. Opens the custom rule list for writing.
3. Path to the level 2 & 3 capitalised headings custom rule.
4. Closes the custom rule list for writing.
```

See. [markdownlint configuration schema][1]

##### Base setup : [.markdownlint-cli2.jsonc] - [CODE]

```json
// Base Setup

1. "default": true, // Set defaults for all rules as true by default.
2. "extends": null, // Explicitly specifies there are no extended configurations.
```

##### Base setup : [.markdownlint-cli2.jsonc] - [CODE DESCRIPTION]

```markdown
1. All rules will be considered true unless the configuration specifically states otherwise.
2. This is set to null because this is the only configuration file that will be used in this project.
```

##### markdownlint-cli2 configuration file, rule table : [.markdownlint-cli2.jsonc]

The rest of the configuration has been entered in the form of a table for legibility purposes.

See. [Markdown Rules][2]

| Rule Code | Sub-setting Description | Value              |
|-----------|-------------------------|--------------------|
| MD001     |                         | True               |
| MD003     | style                   | consistent         |
| MD004     |                         | false              |
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

### COMMITLINT CONFIGURATION FILE [COMMITLINT.CONFIG.JS] 📄

#### Attribute Table : [commitlint.config.js]

| Attribute             | Value                             |
|-----------------------|-----------------------------------|
| Asset Name            | commitlint.config.js              |
| Relative Path         | .config                           |
| Hidden                | Inherited                         |
| Include in Repository | Yes                               |
| Managed               | Yes                               |
| Asset Type            | JavaScript                        |
| Asset Size            | 2,626 Bytes                       |

#### Asset Purpose : [commitlint.config.js]

Maintains the repository integrity buy ensuring conventional commit standards are being adhered to.

[Conventional Commits][3]

#### Asset Contents Description : [commitlint.config.js]

Contains linting rules pertaining to the conventional commit standards.

##### Commitlint configuration syntax table: [commitlint.config.js]

This table displays the keywords found in 'commitlint.config.js' with an explanation of their function.

| Setting           | Affect                                              |
|-------------------|-----------------------------------------------------|
| extends           | Extend configuration to conventional commits        |
| rules             | Defines a list of commitlint rules                  |
| header-max-length | Limit header length to 72 characters                |
| type-empty        | Disallow empty types in commit messages             |
| subject-empty     | Disallow empty subjects in commit messages          |
| scope-empty       | Require a scope for commits                         |

##### Type enumeration table : [commitlint.config.js]

The following table is a list of commit types as defined in 'commitlint.config.js'.

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

The following table contains a list of commitlint scopes.

| Scope          | Scope Descriptions                                     |
|----------------|--------------------------------------------------------|
| api            | API-related changes                                    |
| ui             | UI-related changes                                     |
| auth           | Authentication changes                                 |
| db             | Database changes                                       |
| deps           | Dependency updates                                     |
| tests          | Test-related changes                                   |
| config         | Configuration updates                                  |

---

[BACK TO TOP](#markdownlint-cli2-cicd-pipeline-docker-project-programmers-manual)

---

### CPSELL CONFIGURATION FILE [CSPELL.JSON] 📄

#### Attribute Table : [cspell.json]

| Attribute             | Value                             |
|-----------------------|-----------------------------------|
| Asset Name            | cspell.json                       |
| Relative Path         | .config                           |
| Hidden                | Inherited                         |
| Include in Repository | Yes                               |
| Managed               | Yes                               |
| Asset Type            | JSON                              |
| Asset Size            | 560 Bytes                         |

#### Asset Purpose : [cspell.json]

To maintain a professional, constant, error free style throughout all project documents.

#### Asset Contents Description : [cspell.json]

Contains a reference to a British English dictionary and a list of exception words.

ℹ️ *The exact contents of this file have not been included here as this configuration simply sets language to British English and lists extra spellings to include on top of that.*

---

[BACK TO TOP](#markdownlint-cli2-cicd-pipeline-docker-project-programmers-manual)

---

### GIT FOLDER [.GIT] 📁

#### Attribute Table : [.git]

| Attribute             | Value                             |
|-----------------------|-----------------------------------|
| Asset Name            | .git                              |
| Relative Path         | ./                                |
| Hidden                | Yes                               |
| Include in Repository | Yes                               |
| Managed               | Yes                               |
| Asset Type            | FOLDER                            |
| Asset Size            | 520,571 Bytes                     |

#### Asset Purpose : [.git]

Allows Git source control to function.

#### Asset Contents Description : [.git]

⚠️ *Modify these files with caution!*

 ℹ *The individual files in this directory will not be listed here because they are managed by Git therefore you should defer to the [Git Documentation][4].*

---

[BACK TO TOP](#markdownlint-cli2-cicd-pipeline-docker-project-programmers-manual)

---

### GITHUB FOLDER [.GITHUB] 📁

#### Attribute Table : [.github]

| Attribute             | Value                             |
|-----------------------|-----------------------------------|
| Asset Name            | .github                           |
| Relative Path         | ./                                |
| Hidden                | Yes                               |
| Include in Repository | Yes                               |
| Managed               | Yes                               |
| Asset Type            | FOLDER                            |
| Asset Size            | 12,475 Bytes                      |

#### Asset Purpose : [.github]

GitHub Actions relies on this folder for workflow functionality.

#### Asset Contents Description : [.github]

Stores files related to the GitHub [CI/CD](#glossary) pipeline workflow such as linting configurations and GitHub YAML forms.

---

[BACK TO TOP](#markdownlint-cli2-cicd-pipeline-docker-project-programmers-manual)

---

### ISSUE TEMPLATE FOLDER [ISSUE_TEMPLATE] 📁

#### Attribute Table : [issue_template]

| Attribute             | Value                             |
|-----------------------|-----------------------------------|
| Asset Name            | ISSUE_TEMPLATE                    |
| Relative Path         | .github                           |
| Hidden                | Inherited                         |
| Include in Repository | Yes                               |
| Managed               | Yes                               |
| Asset Type            | FOLDER                            |
| Asset Size            | 8,308 Bytes                       |

#### Asset Purpose : [issue_template]

Enforces consistency when submitting issues and feature requests.

#### Asset Contents Description : [issue_template]

Contains templates for GitHub issue forms.

##### YAML GitHub Issue Forms Keyword Glossary

⚠️ *Note that the 'required:' key will only work when the project is made public.*

| Ref         | Description                                                           |
|-------------|-----------------------------------------------------------------------|
| Name        | Identifiable name to describe the purpose of the form.                |
| Description | Describes the function of the form.                                   |
| Title       | Default title that will be pre-populated in the issue submission form.|
| Labels      | Identify the type categories the issue belongs.                       |
| Projects    | Assigns to a specific GitHub project.                                 |
| Body        | Initialises form.                                                     |
| Type        | Form element type E.G. text-box, checkbox, dropdown.                  |
| Attributes  | Specifies sub-settings for a particular element type.                 |
| Label       | Text appears above form element describing what it is.                |
| Value       | Sets markdown text.                                                   |
| ID          | A unique identifier for the field.                                    |
| Placeholder | Text that appears inside the element itself.                          |
| Validations | Checks if form is valid before form can be submitted.                 |
| Required    | Determines if field is required to submit the form.                   |
| Options     | Provides a list of options to select from dropdown box.               |

See. GitHub YAML issue forms schema syntax [documentation][5].

---

[BACK TO TOP](#markdownlint-cli2-cicd-pipeline-docker-project-programmers-manual)

---

### BUG REPORT TEMPLATE [BUG-REPORT-TEMPLATE.YAML] 📄

#### Attribute Table : [bug-report-template.yaml]

| Attribute             | Value                             |
|-----------------------|-----------------------------------|
| Asset Name            | bug-report-template.yaml          |
| Relative Path         | .github/ISSUE_TEMPLATE            |
| Hidden                | Inherited                         |
| Include in Repository | Yes                               |
| Managed               | Yes                               |
| Asset Type            | YAML                              |
| Asset Size            | 4,179 Bytes                       |

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

ℹ️ *The code section of this asset has been presented in table form for eledgeability purposes.*

##### Meta data : [bug-report-template.yaml] - [CODE]

This section of YAML script provides meta data for the form but is not an element of the form itself.

```yaml
1. name: 🐞 Bug Report
2. description: File a bug report
3. title: "[Bug]: "
4. labels: ["bug", "new"]
5. projects: ["NinjaMonkeyGames/12"]
```

##### Meta data attribute table : [bug-report-template.yaml] - [CODE DESCRIPTION]

| Attribute Description | Attribute Value         |
|-----------------------|-------------------------|
| name                  | 🐞 Bug Report           |
| description           | File a bug report       |
| title                 | [Bug]:                  |
| labels                | ["bug", "new"]          |
| projects              | ["NinjaMonkeyGames/12"] |

⚠️ *GitHub once used project names but the new system uses numerical identifiers. 12 being the project 'name'*

##### Initialise form : [bug-report-template.yaml] - [CODE]

```yaml
# Initialise Form

1. body:
```

##### Initialise form : [bug-report-template.yaml] - [CODE DESCRIPTION]

```markdown
1. body: Initialises YAML form body.
```

```yaml
# Introduction Text

1.  - type: markdown
2.    attributes:
3.      value: |
4.        Thanks for taking the time to report this issue! Please fill out the form below to           provide detailed information about the bug.
```

##### Introduction text attribute table : [bug-report-template.yaml] - [CODE DESCRIPTION]

| Attribute Description | Attribute Value         |
|-----------------------|-------------------------|
| type                  | markdown                |
| attributes            | List attributes         |
| value                 | Fig 1.4                 |

```markdown
Fig 1.4
Thanks for taking the time to report this issue! Please fill out the form below to provide detailed information about the bug.
```

##### Email input : [bug-report-template.yaml] - [CODE]

```yaml
# Email Input

1.  - type: input
2.    id: contact-email
3.    attributes:
4.      label: Contact Email
5.      description: Please provide an email where we can reach you if more information is           needed.
6.      placeholder: info@ninjamonkeygames.com
7.    validations:
8.      required: true
```

##### Email input attribute table: [bug-report-template.yaml] - [CODE DESCRIPTION]

| Attribute Description | Attribute Value                                                                             |
|-----------------------|---------------------------------------------------------------------------------------------|
| type                  | input                                                                                       |
| id                    | contact-email                                                                               |
| attributes            | List attributes                                                                             |
| label                 | Contact Email                                                                               |
| description           | Please provide an email where we can reach you if we need more information.                 |
| placeholder           | <info@ninjamonkeygames.com>                                                                 |
| validations           | Check if form is valid                                                                      |
| required              | true                                                                                        |

```markdown
##### OS Selection : [bug-report-template.yaml] - [CODE]

```yaml
# OS Selection

1.   - type: dropdown
2.     id: os
3.     attributes:
4.       label: Operating System
5.       description: What operating system are you using?
6.       options:
7.         - Chrome
8.         - Firefox
9.         - Safari
10.        - Microsoft Edge
11.        - Opera
12.        - Other
13.    validations:
14.      required: true
```

##### OS Selection attribute table : [bug-report-template.yaml] - [CODE DESCRIPTION]

| Attribute Description | Attribute Value                               |
|-----------------------|-----------------------------------------------|
| type                  | dropdown                                      |
| id                    | os                                            |
| attributes            | List attributes                               |
| label                 | Operating System                              |
| description           | What operating system are you using?          |
| options               | List of options                               |
| Windows               | Windows OS                                    |
| MacOS                 | MacOS OS                                      |
| Linux                 | Linux OS                                      |
| Other                 | Other OS                                      |
| validations           | Check if form is valid                        |
| required              | true                                          |

##### Browser selection : [bug-report-template.yaml] - [CODE]

```yaml
# Browser Selection

1.   - type: dropdown
2.     id: browser
3.     attributes:
4.       label: Browser
5.       description: What browser are you using?
6.       options:
7.         - Chrome
8.         - Firefox
9.         - Safari
10.         - Microsoft Edge
11.         - Opera
12.         - Other
13.     validations:
14.       required: true
```

##### Browser selection : [bug-report-template.yaml] - [CODE DESCRIPTION]

| Attribute Description | Attribute Value                               |
|-----------------------|-----------------------------------------------|
| type                  | dropdown                                      |
| id                    | browser                                       |
| attributes            | List attributes                               |
| label                 | Browser                                       |
| description           | What operating system are you using?          |
| options               | List of options                               |
| Chrome                | Chrome browser                                |
| Firefox               | Firefox browser                               |
| Safari                | Safari browser                                |
| Microsoft Edge        | Microsoft Edge browser                        |
| Opera                 | Opera browser                                 |
| Other                 | Other browser                                 |
| validations           | Check if form is valid                        |
| required              | true                                          |

##### Bug type : [bug-report-template.yaml] - [CODE]

```yaml
# Bug Type

1.   - type: dropdown
2.     id: bug-type
3.     attributes:
4.       label: Bug Type
5.       description: Select the type of issue you are reporting.
6.       options:
7.         - Application Bug
8.         - Documentation Problem
9.     validations:
10.       required: true 
```

##### Bug type attribute table : [bug-report-template.yaml] - [CODE DESCRIPTION]

| Attribute Description | Attribute Value                               |
|-----------------------|-----------------------------------------------|
| type                  | dropdown                                      |
| id                    | bug-type                                      |
| attributes            | List attributes                               |
| label                 | Bug Type                                      |
| description           | Select the type of issue you are reporting.   |
| options               | List of options                               |
| Application Bug       | Application Bug                               |
| Documentation Problem | Documentation Problem                         |
| validations           | Check if form is valid                        |
| required              | true                                          |

##### Severity : [bug-report-template.yaml] - [CODE]

```yaml
# Severity

1.   - type: dropdown
2.     id: severity
3.     attributes:
4.       label: Severity
5.       description: How serious is the problem?
6.       options:
7.         - Low
8.         - Medium
9.         - High
10.         - Critical
11.     validations:
12.       required: true
```

##### Severity attribute table : [bug-report-template.yaml] - [CODE DESCRIPTION]

| Attribute Description | Attribute Value                               |
|-----------------------|-----------------------------------------------|
| type                  | dropdown                                      |
| id                    | severity                                      |
| attributes            | List attributes                               |
| label                 | Severity                                      |
| description           | How serious is the problem?                   |
| options               | List of options                               |
| Low                   | Low option                                    |
| Medium                | Medium option                                 |
| High                  | High option                                   |
| Critical              | Critical option                               |
| validations           | Check if form is valid                        |
| required              | true                                          |

##### Problem summary : [bug-report-template.yaml] - [CODE]

```yaml
# Problem Summary

1.   - type: textarea
2.     id: problem-summary
3.     attributes:
4.       label: Problem Summary
5.       description: Please describe the issue in a few sentences.
6.       placeholder: A brief summary of the issue.
7.     validations:
8.       required: true
```

##### Problem summary attribute table : [bug-report-template.yaml] - [CODE DESCRIPTION]

| Attribute Description | Attribute Value                               |
|-----------------------|-----------------------------------------------|
| type                  | textarea                                      |
| id                    | problem-summary                               |
| attributes            | List attributes                               |
| label                 | Problem Summary                               |
| description           | Please describe the issue in a few sentences. |
| placeholder           | A brief summary of the issue.                 |
| validations           | Check if form is valid                        |
| required              | true                                          |

##### Expected behaviour : [bug-report-template.yaml] - [CODE]

```yaml
# Expected Behaviour

1.   - type: textarea
2.     id: expected-behaviour
3.     attributes:
4.       label: Expected Behaviour
5.       description: What did you expect to happen?
6.     validations:
7.       required: true
```

##### Expected behaviour attribute table : [bug-report-template.yaml] - [CODE DESCRIPTION]

| Attribute Description | Attribute Value                               |
|-----------------------|-----------------------------------------------|
| type                  | textarea                                      |
| id                    | expected-behaviour                            |
| attributes            | List attributes                               |
| label                 | Expected Behaviour                            |
| description           | What did you expect to happen?                |
| validations           | Check if form is valid                        |
| required              | true                                          |

##### Steps to reproduce : [bug-report-template.yaml] - [CODE]

```yaml
# Steps To Reproduce

1.   - type: textarea
2.     id: steps-to-reproduce
3.     attributes:
4.       label: Steps to Reproduce
5.       description: Please list the steps to reproduce the issue.
6.       placeholder: "1. \n2. \n3."
7.     validations:
8.       required: true
```

##### Steps to reproduce attribute table : [bug-report-template.yaml] - [CODE DESCRIPTION]

| Attribute Description | Attribute Value                               |
|-----------------------|-----------------------------------------------|
| type                  | textarea                                      |
| id                    | steps-to-reproduce                            |
| attributes            | List attributes                               |
| label                 | Steps to Reproduce                            |
| description           | Please list the steps to reproduce the issue. |
| placeholder           | Numbered list                                 |
| validations           | Check if form is valid                        |
| required              | true                                          |

##### Actual behaviour : [bug-report-template.yaml] - [CODE]

```yaml
# Actual Behaviour

1.   - type: textarea
2.     id: actual-behaviour
3.     attributes:
4.       label: Actual Behaviour
5.       description: What actually happened? 
6.     validations:
7.       required: true
```

##### Actual behaviour attribute table : [bug-report-template.yaml] - [CODE DESCRIPTION]

| Attribute Description | Attribute Value                               |
|-----------------------|-----------------------------------------------|
| type                  | textarea                                      |
| id                    | actual-behaviour                              |
| attributes            | List attributes                               |
| label                 | Actual Behaviour                              |
| description           | What actually happened?                       |
| validations           | Check if form is valid                        |
| required              | true                                          |

##### Additional information : [bug-report-template.yaml] - [CODE]

```yaml
# Additional Information

1.   - type: textarea
2.     id: additional-information
3.     attributes:
4.       label: Additional Information
5.       description: Provide any additional information or context that might help us    6.       resolve the issue.
7.       placeholder: Additional context, error messages, or anything else that may be    8.       helpful.
9.     validations:
10.      required: false
```

##### Additional information attribute table : [bug-report-template.yaml] - [CODE DESCRIPTION]

| Attribute Description | Attribute Value                               |
|-----------------------|-----------------------------------------------|
| type                  | textarea                                      |
| id                    | additional-information                        |
| attributes            | List attributes                               |
| label                 | Additional Information                        |
| description           | Provide any additional information or context that might help us resolve the issue                                                       |
| placeholder           | Additional context, error messages, or anything else that may be helpful.                                                                |
| validations           | Check if form is valid                        |
| required              | true                                          |

```markdown
##### Agree to terms attribute table : [bug-report-template.yaml] - [CODE]

```yaml
# Agree To Terms

1.   - type: checkboxes
2.     id: terms
3.     attributes:
4.       label: Code of Conduct
5.       description: By submitting this bug report, you agree to follow our [Code of     6.       Conduct](./CODE_OF_CONDUCT.md).
7.       options:
8.         - label: I agree to follow this project's Code of conduct.
9.     validations:
10.       required: true
```

##### Agree to terms attribute table : [bug-report-template.yaml] - [CODE DESCRIPTION]

| Attribute Description | Attribute Value                                   |
|-----------------------|---------------------------------------------------|
| type                  | checkboxes                                        |
| id                    | terms                                             |
| attributes            | List attributes                                   |
| label                 | Code of Conduct                                   |
| description           | By submitting this bug report, you agree to follow our [Code of  Conduct](./CODE_OF_CONDUCT.md)                                              |
| options               | List of options                                   |
| label                 | I agree to follow this project's Code of conduct. |
| validations           | Check if form is valid                            |
| required              | true                                              |

---

[BACK TO TOP](#markdownlint-cli2-cicd-pipeline-docker-project-programmers-manual)

---

### FEATURE REQUEST TEMPLATE [FEATURE-REQUEST-TEMPLATE] 📄

#### Attribute Table : [feature-request-template.yaml]

| Attribute             | Value                             |
|-----------------------|-----------------------------------|
| Asset Name            | feature-request-template.yaml     |
| Relative Path         | .github/ISSUE_TEMPLATE            |
| Hidden                | Inherited                         |
| Include in Repository | Yes                               |
| Managed               | Yes                               |
| Asset Type            | YAML                              |
| Asset Size            | 4,129 Bytes                       |

#### Asset Purpose : [feature-request-template.yaml]

Provides a standard structure for reporting features.

#### Asset Contents Description : [feature-request-template.yaml]

YAML script that creates a feature submission form for GitHub issues.

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
1. name: 🚀 Feature Request
2. description: Submit a request for a new feature or improvement.
3. title: "[Feature Request]: "
4. labels: ["feature", "new"]
5. projects: ["NinjaMonkeyGames/12"]
```

##### Meta data attribute table: [feature-request-template.yaml] - [CODE DESCRIPTION]

| Attribute Description | Attribute Value                                   |
|-----------------------|---------------------------------------------------|
| name                  | 🚀 Feature Request                                |
| description           | Submit a request for a new feature or improvement.|
| title                 | [Bug]:                                            |
| labels                | ["feature", "new"]                                |
| projects              | ["NinjaMonkeyGames/12"]                           |

##### Initialise form : [feature-request-template.yaml] - [CODE]

```yaml
# Initialise Form

1. body:
```

##### Initialise form : [feature-request-template.yaml] - [CODE DESCRIPTION]

```markdown
1. body: Initialises YAML form body.
```

##### Introduction text : [feature-request-template.yaml] - [CODE]

```yaml
# Introduction Text

1.  - type: markdown
2.    attributes:
3.      value: |
4.        Thanks for taking the time to suggest a new feature! Please fill out the form               below to provide detailed information regarding the feature you desire.
```

##### Introduction text attribute table : [feature-request-template.yaml] - [CODE DESCRIPTION]

| Attribute Description | Attribute Value         |
|-----------------------|-------------------------|
| type                  | Markdown                |
| attributes            | List attributes         |
| value                 | Thanks for taking the time to suggest a new feature! Please fill out the form below to provide detailed information regarding the feature you desire.                                                          |

##### Email input : [feature-request-template.yaml] - [CODE]

```yaml
# Email Input

1.  - type: input
2.    id: contact-email
3.    attributes:
4.      label: Contact Email
5.      description: Please provide an email where we can reach you if more information is           needed.
6.      placeholder: info@ninjamonkeygames.com
7.    validations:
8.      required: true
```

##### Email input attribute table: [feature-request-template.yaml] - [CODE DESCRIPTION]

| Attribute Description | Attribute Value                                                                              |
|-----------------------|----------------------------------------------------------------------------------------------|
| type                  | input                                                                                        |
| id                    | contact-email                                                                                |
| attributes            | List attributes                                                                              |
| label                 | Contact Email                                                                                |
| description           | Please provide an email where we can reach you if we need more information.                  |
| placeholder           | <info@ninjamonkeygames.com>                                                                  |
| validations           | Check if form is valid                                                                       |
| required              | true                                                                                         |

##### OS Selection : [feature-request-template.yaml] - [CODE]

```yaml
# OS Selection

1.   - type: dropdown
2.     id: os
3.     attributes:
4.       label: Operating System
5.       description: What operating system are you using?
6.       options:
7.         - Windows
8.         - macOS
9.         - Linux
10.        - Other
11.    validations:
12.      required: true
```

##### OS Selection attribute table : [feature-request-template.yaml] - [CODE DESCRIPTION]

| Attribute Description | Attribute Value                               |
|-----------------------|-----------------------------------------------|
| type                  | dropdown                                      |
| id                    | os                                            |
| attributes            | List attributes                               |
| label                 | Operating System                              |
| description           | What operating system are you using?          |
| options               | List of options                               |
| Windows               | Windows OS                                    |
| MacOS                 | MacOS OS                                      |
| Linux                 | Linux OS                                      |
| Other                 | Other OS                                      |
| validations           | Check if form is valid                        |
| required              | true                                          |

##### Browser selection : [feature-request-template.yaml] - [CODE]

```yaml
# Browser Selection

1.   - type: dropdown
2.     id: browser
3.     attributes:
4.       label: Browser
5.       description: What browser are you using?
6.       options:
7.         - Chrome
8.         - Firefox
9.         - Safari
10.         - Microsoft Edge
11.         - Opera
12.         - Other
13.     validations:
14.       required: true
```

##### Browser selection : [feature-request-template.yaml] - [CODE DESCRIPTION]

| Attribute Description | Attribute Value                               |
|-----------------------|-----------------------------------------------|
| type                  | dropdown                                      |
| id                    | browser                                       |
| attributes            | List attributes                               |
| label                 | Browser                                       |
| description           | What operating system are you using?          |
| options               | List of options                               |
| Chrome                | Chrome browser                                |
| Firefox               | Firefox browser                               |
| Safari                | Safari browser                                |
| Microsoft Edge        | Microsoft Edge browser                        |
| Opera                 | Opera browser                                 |
| Other                 | Other browser                                 |
| validations           | Check if form is valid                        |
| required              | true                                          |

##### Feature type : [feature-request-template.yaml] - [CODE]

```yaml
# Feature Type

1.  - type: dropdown
2.    id: feature-type
3.    attributes:
4.      label: Feature Type
5.      description: Select the type of feature you are requesting.
6.      options:
7.        - New Feature
8.        - Improvement
9.        - Enhancement
10.    validations:
11.      required: true
```

##### Feature type attribute table: [feature-request-template.yaml] - [CODE DESCRIPTION]

| Attribute Description | Attribute Value                               |
|-----------------------|-----------------------------------------------|
| type                  | dropdown                                      |
| id                    | feature-type                                  |
| attributes            | List attributes                               |
| label                 | Feature Type                                  |
| description           | Select the type of feature you are requesting.|
| options               | List of options                               |
| New Feature           | New Feature                                   |
| Improvement           | Improvement                                   |
| Enhancement           | Enhancement                                   |
| validations           | Check if form is valid                        |
| required              | true                                          |

##### Priority : [feature-request-template.yaml] - [CODE]

```yaml
# Priority

1.   - type: dropdown
2.     id: priority
3.     attributes:
4.       label: Priority
5.       description: How important is this feature request?
6.       options:
7.         - Low
8.         - Medium
9.         - High
10.        - Critical
11.    validations:
12.      required: true
```

##### Priority attribute table: [feature-request-template.yaml] - [CODE DESCRIPTION]

| Attribute Description | Attribute Value                               |
|-----------------------|-----------------------------------------------|
| type                  | dropdown                                      |
| id                    | priority                                      |
| attributes            | List attributes                               |
| label                 | Priority                                      |
| description           | How important is this feature request?        |
| options               | List of options                               |
| Low                   | Low                                           |
| Medium                | Medium                                        |
| High                  | High                                          |
| Critical              | Critical                                      |
| validations           | Check if form is valid                        |
| required              | true                                          |

##### Feature summary : [feature-request-template.yaml] - [CODE]

```yaml
# Feature Summary

1.  - type: textarea
2.    id: feature-summary
3.    attributes:
4.      label: Feature Summary
5.      description: Please provide a brief summary of the feature you're requesting.
6.      placeholder: A short description of the feature.
7.    validations:
8.      required: true
```

##### Feature summary attribute table: [feature-request-template.yaml] - [CODE DESCRIPTION]

| Attribute Description | Attribute Value                                                 |
|-----------------------|-----------------------------------------------------------------|
| type                  | textarea                                                        |
| id                    | feature-summary                                                 |
| attributes            | List attributes                                                 |
| label                 | Feature Summary                                                 |
| description           | Please provide a brief summary of the feature you're requesting.|
| placeholder           | A short description of the feature.                             |
| validations           | Check if form is valid                                          |
| required              | true                                                            |

##### Expected behaviour : [feature-request-template.yaml] - [CODE]

```yaml
# Expected Behaviour

1.  - type: textarea
2.    id: expected-behaviour
3.    attributes:
4.      label: Expected Behaviour
5.      description: What should happen when this feature is implemented?
6.    validations:
7.      required: true
```

##### Expected behaviour attribute table : [feature-request-template.yaml] - [CODE DESCRIPTION]

| Attribute Description | Attribute Value                                                 |
|-----------------------|-----------------------------------------------------------------|
| type                  | textarea                                                        |
| id                    | expected-behaviour                                              |
| attributes            | List attributes                                                 |
| label                 | Expected Behaviour                                              |
| description           | What should happen when this feature is implemented?            |
| validations           | Check if form is valid                                          |
| required              | true                                                            |

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

##### Use case attribute table: [feature-request-template.yaml] - [CODE DESCRIPTION]

| Attribute Description | Attribute Value                                                 |
|-----------------------|-----------------------------------------------------------------|
| type                  | textarea                                                        |
| id                    | use-case                                                        |
| attributes            | List attributes                                                 |
| label                 | Use Case                                                        |
| description           | How would this feature benefit you or your workflow?            |
| placeholder           | Describe the scenario in which this feature would be useful.    |
| validations           | Check if form is valid                                          |
| required              | true                                                            |

##### Additional information : [feature-request-template.yaml] - [CODE]

```yaml
# Additional Information

1.  - type: textarea
2.    id: additional-information
3.    attributes:
4.      label: Additional Information
5.      description: Please provide any additional context, screenshots, or details that           may help us understand your request better.
6.      placeholder: Any extra details or resources that might help.
7.    validations:
8.      required: false
```

##### Additional information attribute table: [feature-request-template.yaml] - [CODE DESCRIPTION]

| Attribute Description | Attribute Value                                                 |
|-----------------------|-----------------------------------------------------------------|
| type                  | textarea                                                        |
| id                    | additional-information                                          |
| attributes            | List attributes                                                 |
| label                 | Additional Information                                          |
| description           | Please provide any additional context, screenshots, or details that may help us understand your request better.                                          |
| placeholder           | Any extra details or resources that might help.                 |
| validations           | Check if form is valid                                          |
| required              | false                                                           |

##### Agree to terms : [feature-request-template.yaml] - [CODE]

```yaml
# Agree To Terms

1.  - type: checkboxes
2.    id: terms
3.    attributes:
4.      label: Code of Conduct
5.      description: By submitting this feature request, you agree to follow our [Code of          Conduct](https://example.com).
6.      options:
7.        - label: I agree to follow this project's Code of Conduct
8.    validations:
9.      required: true
```

##### Agree to terms attribute table: [feature-request-template.yaml] - [CODE DESCRIPTION]

| Attribute Description | Attribute Value                                                 |
|-----------------------|-----------------------------------------------------------------|
| type                  | checkboxes                                                      |
| id                    | terms                                                           |
| attributes            | List attributes                                                 |
| label                 | Code of Conduct                                                 |
| description           | By submitting this feature request, you agree to follow our [Code of Conduct](https://example.com).                                                         |
| options               | List of options                                                 |
| label                 | I agree to follow this project's Code of Conduct.               |
| validations           | Check if form is valid                                          |
| required              | true                                                            |

---

[BACK TO TOP](#markdownlint-cli2-cicd-pipeline-docker-project-programmers-manual)

---

### WORKFLOWS FOLDER [WORKFLOWS] 📁

#### Attribute Table : [workflows]

| Attribute             | Value                             |
|-----------------------|-----------------------------------|
| Asset Name            | workflows                         |
| Relative Path         | .github                           |
| Hidden                | Inherited                         |
| Include in Repository | Yes                               |
| Managed               | Yes                               |
| Asset Type            | FOLDER                            |
| Asset Size            | 4,167 Bytes                       |

#### Asset Purpose : [workflows]

GitHub relies on this folder for workflow functionality.

#### Asset Contents Description : [workflows]

Stores YAML files that will be triggered by GitHub Actions as part of the [CI/CD](#glossary) workflow.

##### YAML GitHub actions keyword glossary

| Key         | Description                                                        |
|-------------|--------------------------------------------------------------------|
| name        | Text label displayed when GitHub Actions executes a YAML script.   |
| on          | Automatically triggers a workflow when 'on:' condition as been met.|
| push        | Execute event when pushed.                                         |
| paths       | Specifies the files and paths to be included.                      |
| jobs        | Defines a set of jobs to be run in the pipeline.                   |
| build       | Specifies the name of the job being configured.                    |
| runs-on     | Specifies an OS environment to run on.                             |
| steps       | Defines the sequence of steps that the job will execute.           |
| uses        | Tells GitHub Actions it is about to use a prebuild Actions script. |
| with        | Puts the workflow in at state ready to accept login credentials.   |
| username    | States that a username will follow.                                |
| password    | States that a password will follow.                                |
| run         | Executes command(s).                                               |
| lint        | A label to specify the category of job.                            |
| container   | Sets container options.                                          |
| image       | Specifies docker image.                                           |
| if          | Conditional statement.                                             |

---

[BACK TO TOP](#markdownlint-cli2-cicd-pipeline-docker-project-programmers-manual)

---

### BUILD AND PUSH DOCKER FILE [BUILD-DOCKER.YAML] 📄

#### Attribute Table : [build-docker.yaml]

| Attribute             | Value                             |
|-----------------------|-----------------------------------|
| Asset Name            | build-docker.yaml                 |
| Relative Path         | .github/workflows                 |
| Hidden                | Inherited                         |
| Include in Repository | Yes                               |
| Managed               | Yes                               |
| Asset Type            | YAML                              |
| Asset Size            | 1,670 Bytes                       |

#### Asset Purpose : [build-docker.yaml]

1. Build with [SBOM](#glossary) and Provenance (This satisfies Dockerhub container policy.)
2. Negates the need to build and push Dockerfile manually reducing the possibility of human error.

#### Asset Contents Description : [build-docker.yaml]

This file is triggered by GitHub Actions. It checks if 'Dockerfile' has been updated then
builds and pushes the changes to Dockerhub.

#### Asset Code Breakdown : [build-docker.yaml]

1. Set workflow title label.
2. Checks if 'Dockerfile' has been modified on push/pull.
3. Initialise pipeline.
4. Checkout code.
5. Set up Docker buildx.
6. Log in to Dockerhub.
7. Build and push Docker image with [SBOM](#glossary) and provenance.

The following link provides information about the syntax used in GitHub [YAML](#glossary) files.

See: [Workflow syntax for GitHub Actions][6]

##### Set workflow title label : [build-docker.yaml] - [CODE]

```yaml
# Set workflow title label

1: name: Build and Push Docker Image
```

##### Set workflow title label : [build-docker.yaml] - [CODE-DESCRIPTION]

```markdown
 1. Set name to 'Build and Push Docker Image'.
```

##### Checks if 'Dockerfile' has been modified on push : [build-docker.yaml] - [CODE]

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
2. push: execute event when pushed.
3. paths: specifies the files and paths to be included.
4. Include 'Dockerfile' as a path.
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
  a. runs-on: specifies an OS environment to run on.
  b. 'ubuntu-3.20.3' sets runner to 'ubuntu-3.20.3'.
4. steps: defines the sequence of steps that the job will execute.
```

ℹ *️ Note Ubuntu is the runner only and should not be confused with the alpine installation used as a base for the
markdownlint-cli docker.*

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

⚠️ Password is not the Dockerhub account password but a [personal personal access token][7] or  [PAT](#glossary).

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

### LINT MARKDOWN [LINT-MARKDOWN.YAML] 📄

#### Attribute Table : [lint-markdown.yaml]

| Attribute             | Value                             |
|-----------------------|-----------------------------------|
| Asset Name            | lint-markdown.yaml                |
| Relative Path         | .github/workflows                 |
| Hidden                | Inherited                         |
| Include in Repository | Yes                               |
| Managed               | Yes                               |
| Asset Type            | YAML                              |
| Asset Size            | 1,354 Bytes                       |

#### Asset Purpose : [lint-markdown.yaml]

Keeping clean markdown files and documentation makes it easier for new developers to contribute and maintains repository
integrity.

#### Asset Contents Description : [lint-markdown.yaml]

Contains YAML that will instruct GitHub Actions to lint markdown files.

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
1. jobs: defines a set of jobs to be run in the pipeline.
2. lint: identifies the type of job for organisational purposes.

3. runs-on: specifies an OS environment to run on.
    a. sets OS to Ubuntu version 3.20.3.
    
4. container: sets container options.

5. image: specifies docker image.
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
    
2. run: executes the following command(s).
    a. cp /app/.markdownlint.jsonc' copies the markdownlint configuration file '.markdownlint.jsonc' from the container
    'app' folder to $GITHUB_WORKSPACE.
```

##### Lint all markdown files : [lint-markdown.yaml] - [CODE]

```yaml
# Lint All Markdown Files
    
1.   - name: Run markdownlint-cli2
2.     run: markdownlint-cli2 "**/*.md" "#node_modules" "#markdown-fail"
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

| Attribute             | Value                             |
|-----------------------|-----------------------------------|
| Asset Name            | lint-spelling.yaml                |
| Relative Path         | .github/workflows                 |
| Hidden                | Inherited                         |
| Include in Repository | Yes                               |
| Managed               | Yes                               |
| Asset Type            | YAML                              |
| Asset Size            | 1,143 Bytes                       |

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
1. jobs: defines a set of jobs to be run in the pipeline.
2. spellcheck: identifies the type of job for organisational purposes.

3. runs-on: specifies an OS environment to run on.
    a. sets OS to Ubuntu version 3.20.3.
    
4. container: sets container options.

5. image: Specifies docker image.
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

### VSCODE SETTINGS FOLDER [.VSCODE] 📁

#### Attribute Table : [.vscode]

| Attribute             | Value                             |
|-----------------------|-----------------------------------|
| Asset Name            | .vscode                           |
| Relative Path         | ./                                |
| Hidden                | Yes                               |
| Include in Repository | Yes                               |
| Managed               | Yes                               |
| Asset Type            | FOLDER                            |
| Asset Size            | 5,564 Bytes                       |

#### Asset Purpose : [.vscode]

To maintain a consistent development environment for all developers working on the project.

#### Asset Contents Description : [.vscode]

Contains settings and configuration files relating to the setup of the [VSC](#glossary) [IDE](#glossary).

##### Dockerfile syntax glossary : [.vscode]

| Token       | Description                                                                |
|-------------|----------------------------------------------------------------------------|
| ""          | Encapsulates strings.                                                      |
| {}          | Opens and closes JSON for writing.                                         |
| []          | Opens and closes list of settings.                                         |
| ,           | Continues list.                                                            |
| .           | Access a specific property within a category or group of related settings. |
| :           | Assigns key value.                                                         |

---

[BACK TO TOP](#markdownlint-cli2-cicd-pipeline-docker-project-programmers-manual)

---

### VSC IDE EXTENSIONS [EXTENSIONS.JSON] 📄

#### Attribute Table : [extensions.json]

| Attribute             | Value                             |
|-----------------------|-----------------------------------|
| Asset Name            | extensions.json                   |
| Relative Path         | .vscode                           |
| Hidden                | Inherited                         |
| Include in Repository | Yes                               |
| Managed               | Yes                               |
| Asset Type            | JSON                              |
| Asset Size            | 707 Bytes                         |

#### Asset Purpose : [extensions.json]

Keeps a list of extensions needed to develop the project.

#### Asset Contents Description : [extensions.json]

Stores a list of extensions that the developer will be prompted to install when opening the project for the first time.

ℹ️ *The following file has been written in table form for legibility purposes.*

#### Extension packages table : [extensions.json]

| Package name          | Recommendation string                 |
|-----------------------|---------------------------------------|
| markdownlint          | DavidAnson.vscode-markdownlint        |
| cSpell                | streetsidesoftware.code-spell-checker |
| commitlint            | joshbolduc.commitlint                 |
| Docker                | ms-azuretools.vscode-docker           |
| WSL                   | ms-vscode-remote.remote-wsl           |

---

[BACK TO TOP](#markdownlint-cli2-cicd-pipeline-docker-project-programmers-manual)

---

### VSC IDE KEYBINDINGS [KEYBINDINGS.JSON] 📄

#### Attribute Table : [keybindings.json]

| Attribute             | Value                             |
|-----------------------|-----------------------------------|
| Asset Name            | keybindings.json                  |
| Relative Path         | .vscode                           |
| Hidden                | Inherited                         |
| Include in Repository | Yes                               |
| Managed               | Yes                               |
| Asset Type            | JSON                              |
| Asset Size            | 735 Bytes                         |

#### Asset Purpose : [keybindings.json]

Makes development smoother by binding common functions to key combinations.

#### Asset Contents Description : [keybindings.json]

Binds specific key combinations with commonly performed actions.

##### JSON VSC keybindings legend

| Key         | Description                                                              |
|-------------|--------------------------------------------------------------------------|
| Key         | Binds key combination                                                    |
| Command     | Execute command to convert selected text into title case.                |
| When        | Context in which the 'transformToTitlecase' script will run.             |

#### Asset Code Breakdown : [keybindings.json]

The entries for this file are written in table form for legibility purposes.

1. Convert Selected Text To Title Case.

| ID  | Key          | Command                            | when (Condition) |
|-----|--------------|------------------------------------|------------------|
|  1  | ctrl+shift+t | editor.action.transformToTitlecase | editorTextFocus  |

---

[BACK TO TOP](#markdownlint-cli2-cicd-pipeline-docker-project-programmers-manual)

---

### VSC IDE SETTINGS [SETTINGS.JSON] 📄

#### Attribute Table : [settings.json]

| Attribute             | Value                             |
|-----------------------|-----------------------------------|
| Asset Name            | settings.json                     |
| Relative Path         | .vscode                           |
| Hidden                | Inherited                         |
| Include in Repository | Yes                               |
| Managed               | Yes                               |
| Asset Type            | JSON                              |
| Asset Size            | 2,581 Bytes                       |

#### Asset Purpose : [settings.json]

Allows developers to set their IDE up automatically.

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

```json
// Automatic Actions

"editor.formatOnSave": true,    // Automatically format files when saving
"editor.formatOnType": true,    // Automatically format code as you type
"files.autoSave": "afterDelay", // All file changes will be saved periodically
"files.autoSaveDelay": 1000,    // Set autosave delay for 1000 milliseconds
```

##### Automatic actions : [settings.json] - [CODE-DESCRIPTION]

| Setting             | Value      | Description                                   |
|---------------------|------------|-----------------------------------------------|
| editor.formatOnSave | true       | Automatically format files when saving        |
| editor.formatOnType | true       | Automatically format code as you type         |
| files.autoSave      | afterDelay | All file changes will be saved periodically   |
| files.autoSaveDelay | 1000       | Set Set auto-save delay for 1000 milliseconds |

##### Add A visible ruler to the IDE : [settings.json] - [CODE]

```json
 // Add A Visible Ruler To The IDE

  "editor.rulers": 
  [
      120 // set ruler width to 120 characters
  ],
```

##### Add A visible ruler to the IDE : [settings.json] - [CODE DESCRIPTION]

| Setting             | Value      | Description                                   |
|---------------------|------------|-----------------------------------------------|
| editor.rulers       | 120        | set ruler width to 120 characters             |

##### Format settings : [settings.json] - [CODE]

```json
// Format Settings

"editor.wrappingIndent": "same",     // Keep indentation level of wrapped lines
"files.eol": "\n",                   // Force all new files to be in LF format opposed to CRLF 
"editor.wordWrap": "wordWrapColumn", // Automatically wrap lines of text
"editor.wordWrapColumn": 120,        // Set the wrap column to 120 characters
```

##### Format settings : [settings.json] - [CODE DESCRIPTION]

| Setting              | Value      | Description                                          |
|----------------------|------------|------------------------------------------------------|
| editor.wrappingIndent| same       | Keep indentation level of wrapped lines              |
| files.eol":          | \n         | Force new files to be in LF format opposed to CRLF   |
| editor.wordWrap      | wordWrapColumn | wordWrapColumn                                   |
| editor.wordWrapColumn| 120        | Set the wrap column to 120 characters                |

##### Confirmation settings : [settings.json] - [CODE]

```json
// Confirmation Settings

"explorer.confirmDelete": false,        // Prevents prompt when deleting files
"explorer.confirmDragAndDrop": false,   // Prevents prompt when moving files
```

##### Confirmation settings : [settings.json] - [CODE DESCRIPTION]

| Setting               | Value      | Description                                         |
|-----------------------|------------|-----------------------------------------------------|
| explorer.confirmDelete| false      | Prevents prompt when deleting files                 |
| explorer.confirmDragAndDrop | false | Prevents prompt when moving files                  |

##### Include otherwise hidden folders in the file tree view : [settings.json] - [CODE]

```json
// Include Otherwise Hidden Folders In The File Tree View

"files.exclude": 
{
    "**/.git": false,           // Show .git folder
    "**/node_modules": false,   // Show node_modules
},
```

##### Include otherwise hidden folders in the file tree view : [settings.json] - [CODE DESCRIPTION]

| Setting                | Value      | Description                                        |
|------------------------|------------|----------------------------------------------------|
| files.exclude [**/.git]| false      | Show .git folder                                   |
| files.exclude [**/node_modules] | false | Show node_modules                              |

##### Include otherwise excluded files in project file search : [settings.json] - [CODE]

```json
// Include Otherwise Excluded Files In Project File Search

"search.exclude": {
    "**/.git": false,           // Include (Exclude) .git folder
    "**/node_modules": false,   // Include (Exclude) node_modules folder
},
```

##### Include otherwise excluded files in project file search : [settings.json] - [CODE DESCRIPTION]

| Setting                | Value      | Description                                        |
|------------------------|------------|----------------------------------------------------|
| search.exclude[**/.git]| false      | Include .git folder                                |
| search.exclude[**/node_modules] | false | Include node_modules folder                    |

##### Markdownlint-Cli2 Configuration options : [settings.json] - [CODE]

```json
// Markdownlint-Cli2 Configuration Options

"markdownlint.config": {
    "extends": ".config/.markdownlint-cli2.jsonc" // Sets location of '.markdownlint.jsonc' config file

},
```

##### Markdownlint-Cli2 Configuration options : [settings.json] - [CODE DESCRIPTION]

| Setting                | Value      | Description                                        |
|------------------------|------------|----------------------------------------------------|
| markdownlint.config [extends] | .config/.markdownlint-cli2.jsonc | Sets location of '.markdownlint.jsonc' config file                                                          |

##### Custom markdownlint rules : [settings.json] - [CODE]

```json
// Custom Markdownlint Rules

"markdownlint.customRules": 
[
    ".config/custom-markdownlint-rules/capitalised-headings.js", // Sets locations of 'capitalised-heading.js'
],
```

##### Custom markdownlint rules : [settings.json] - [CODE DESCRIPTION]

| Setting                | Value      | Description                                        |
|------------------------|------------|----------------------------------------------------|
| markdownlint.customRules | .config/custom-markdownlint-rules/capitalised-headings.js | Sets locations of 'capitalised-heading.js' |

##### cSpell Configuration Options : [settings.json] - [CODE]

```json
// cSpell Configuration Options

"cSpell.import": 
[
    "./.config/cspell.json"
],
```

##### cSpell Configuration Options : [settings.json] - [CODE DESCRIPTION]

| Setting                | Value                 | Description                             |
|------------------------|-----------------------|-----------------------------------------|
| cSpell.import[]        | ./.config/cspell.json | cSpell Configuration Options            |

---

[BACK TO TOP](#markdownlint-cli2-cicd-pipeline-docker-project-programmers-manual)

---

### VSC IDE TASKS [TASKS.JSON] 📄

#### Attribute Table : [tasks.json]

| Attribute             | Value                             |
|-----------------------|-----------------------------------|
| Asset Name            | tasks.json                        |
| Relative Path         | .vscode                           |
| Hidden                | Inherited                         |
| Include in Repository | Yes                               |
| Managed               | Yes                               |
| Asset Type            | JSON                              |
| Asset Size            | 1,541 Bytes                       |

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

### MARKDOWN RULE VIOLATION EXAMPLES FOLDER [MARKDOWN-FAIL] 📁

#### Attribute Table : [markdown-fail]

| Attribute             | Value                             |
|-----------------------|-----------------------------------|
| Asset Name            | markdown-fail                     |
| Relative Path         | ./                                |
| Hidden                | No                                |
| Include in Repository | Yes                               |
| Managed               | Yes                               |
| Asset Type            | FOLDER                            |
| Asset Size            | 2,915 Bytes                       |

#### Asset Purpose : [markdown-fail]

To ensure all of the markdown settings are correct and markdownlint is operating as expected.

#### Asset Contents Description : [markdown-fail]

Contains as file for each markdownlint test.

Each file contains fail test code taken from the [markdownlint manual][8].

ℹ *These tests can be used to compare to the markdown configuration file in order to make sure everything is setup correctly.*

---

[BACK TO TOP](#markdownlint-cli2-cicd-pipeline-docker-project-programmers-manual)

---

### NODE MODULES FOLDER [NODE_MODULES] 📁

#### Attribute Table : [node_modules]

| Attribute             | Value                             |
|-----------------------|-----------------------------------|
| Asset Name            | node_modules                      |
| Relative Path         | ./                                |
| Hidden                | No                                |
| Include in Repository | No                                |
| Managed               | No                                |
| Asset Type            | FOLDER                            |
| Asset Size            | N/A                               |

#### Asset Purpose : [node_modules]

Used to run IDE related tools such as markdownlint.

#### Asset Contents Description : [node_modules]

Store source code for various plugins and utilities.

---

[BACK TO TOP](#markdownlint-cli2-cicd-pipeline-docker-project-programmers-manual)

---

### GIT IGNORE FILE [.GITIGNORE] 📄

#### Attribute Table : [.gitignore]

| Attribute             | Value                             |
|-----------------------|-----------------------------------|
| Asset Name            | .gitignore                        |
| Relative Path         | ./                                |
| Hidden                | Yes                               |
| Include in Repository | Yes                               |
| Managed               | Yes                               |
| Asset Type            | TEXT                              |
| Asset Size            | 977 Bytes                         |

#### Asset Purpose : [.gitignore]

Prevents code-base from becoming cluttered.

#### Asset Contents Description : [.gitignore]

Lists files to exclude from the repository when committing.

ℹ *The contents of this file has not been listed here as they are sufficiently commented within the file.*

---

[BACK TO TOP](#markdownlint-cli2-cicd-pipeline-docker-project-programmers-manual)

---

### CHANGELOG [CHANGELOG.MD] 📄

#### Attribute Table : [changelog.md]

| Attribute             | Value                             |
|-----------------------|-----------------------------------|
| Asset Name            | CHANGLELOG.md                     |
| Relative Path         | ./                                |
| Hidden                | No                                |
| Include in Repository | Yes                               |
| Managed               | Yes                               |
| Asset Type            | MARKDOWN                          |
| Asset Size            | 759 Bytes                         |

#### Asset Purpose : [changelog.md]

Keeps track of changes made to the repository.

#### Asset Contents Description : [changelog.md]

A changelog based on common changelog standards.

See. [Common Changelog][9]

---

[BACK TO TOP](#markdownlint-cli2-cicd-pipeline-docker-project-programmers-manual)

---

### CONTRIBUTING [CONTRIBUTING.MD] 📄

#### Attribute Table : [contributing.md]

| Attribute             | Value                             |
|-----------------------|-----------------------------------|
| Asset Name            | CONTRIBUTING.md                   |
| Relative Path         | ./                                |
| Hidden                | No                                |
| Include in Repository | Yes                               |
| Managed               | Yes                               |
| Asset Type            | MARKDOWN                          |
| Asset Size            | 9,732 Bytes                       |

#### Asset Purpose : [contributing.md]

To inform developers about the structure and standards for the project. This is essential to read for any new developer.

#### Asset Contents Description : [contributing.md]

Provides detailed information for developers on how to make changes and update documentation according to the project
standards.

---

[BACK TO TOP](#markdownlint-cli2-cicd-pipeline-docker-project-programmers-manual)

---

### DEVELOPER [DEVELOPER.MD] 📄

#### Attribute Table : [developer.md]

| Attribute             | Value                             |
|-----------------------|-----------------------------------|
| Asset Name            | DEVELOPER.md                      |
| Relative Path         | ./                                |
| Hidden                | No                                |
| Include in Repository | Yes                               |
| Managed               | Yes                               |
| Asset Type            | MARKDOWN                          |
| Asset Size            | /---/ Bytes                       |

#### Asset Purpose : [developer.md]

Inform the developer how the project performs functionally. This serves as development manual.

#### Asset Contents Description : [developer.md]

A detailed description of every asset in the project with a description of it's purpose and function.

---

[BACK TO TOP](#markdownlint-cli2-cicd-pipeline-docker-project-programmers-manual)

---

### DOCKERFILE [DOCKERFILE] 📄

#### Attribute Table : [dockerfile]

| Attribute             | Value                             |
|-----------------------|-----------------------------------|
| Asset Name            | Dockerfile                        |
| Relative Path         | ./                                |
| Hidden                | No                                |
| Include in Repository | Yes                               |
| Managed               | Yes                               |
| Asset Type            | DOCKERFILE                        |
| Asset Size            | 1,686 Bytes                       |

#### Asset Purpose : [dockerfile]

Build Dockerfile.

#### Asset Contents Description : [dockerfile]

Contains the build script required to create markdownlint-cli2 Docker container.

##### Dockerfile keyword glossary : [Dockerfile]

| Key         | Description                                                              |
|-------------|--------------------------------------------------------------------------|
| FROM        | Selects which base image to use.                                         |
| WORKDIR     | Set the working directory.                                               |
| RUN         | Executes program.                                                        |
| USER        | Set user to.                                                             |
| COPY        | Copies a file or folder from one place to another.                       |

##### Dockerfile syntax glossary : [Dockerfile]

| Token       | Description                                                                                            |
|-------------|--------------------------------------------------------------------------------------------------------|
| &&          | Logical operator to ensure this command was successful before continuing.                              |
| \           | Line continuation character.                                                                           |
| -g          | set global flag to install globally.                                                                   |
| install     | Installs a package.                                                                                    |
| npm         | Executes npm                                                                                           |
| mkdir       | Creates a new folder.                                                                                  |
| -p          | Ensures all sub directories are also created.                                                          |
| &&          | Logical operator to ensure this command was successful before continuing.                              |
| \           | Line continuation character.                                                                           |
| ""          | String encapsulation.                                                                                  |
| >           | Redirection operator. It writes the output of the echo command into a file.                            |
| set         | specifies that a configuration setting is being added or updated.                                      |
| apk         | Installs an application with apk.                                                                      |
| add         | Add package to Alpine Package Manager.                                                                 |
| --no-cache  | Clears or ignores previous cache to avoid unexpected errors.                                           |
| update      | Updates all apk packages.                                                                              |
| upgrade     | Upgrade selected packaged to a later version                                                           |

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

```dockerfile
# Install markdownlint-cli2 globally

1. RUN npm install -g markdownlint-cli2
```

##### Install markdownlint-cli2 globally : [Dockerfile] - [CODE-DESCRIPTION]

```markdown
1. Install markdownlint-cli2 globally
    a. RUN Executes program.
    b. Run npm with install flag
    c. '-g' set global flag to install globally.
    d. Mark markdownlint-cli2 as the package to install.
```

##### Update cross-spawn : [Dockerfile] - [CODE]

```dockerfile
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
    d. 'globalconfig' specifies that global npm configuration will be used.
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

##### Update OpenSSL to the latest version using APK : [Dockerfile] - [CODE]

```dockerfile
# Update OpenSSL to the latest version using APK

1. RUN apk update && \
2.    apk add --no-cache openssl && \
3.    apk upgrade openssl
```

##### Update OpenSSL to the latest version using APK : [Dockerfile] - [CODE - DESCRIPTION]

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

---

[BACK TO TOP](#markdownlint-cli2-cicd-pipeline-docker-project-programmers-manual)

---

### NODE PACKAGE LOCK FILE [PACKAGE-LOCK.JSON] 📄

#### Attribute Table : [package-lock.json]

| Attribute             | Value                             |
|-----------------------|-----------------------------------|
| Asset Name            | package-lock.json                 |
| Relative Path         | ./                                |
| Hidden                | No                                |
| Include in Repository | Yes                               |
| Managed               | No                                |
| Asset Type            | JSON                              |
| Asset Size            | 136,621 Bytes                     |

#### Asset Purpose : [package-lock.json]

Keeps all package dependency versions pinned. This ensures the environment is the same for all developers and minimises errors.

#### Asset Contents Description : [package-lock.json]

package-lock.json: A file automatically generated by npm to lock the exact versions of dependencies (and their sub-dependencies) installed. It ensures consistent installs across environments by tracking the precise dependency tree.

---

[BACK TO TOP](#markdownlint-cli2-cicd-pipeline-docker-project-programmers-manual)

---

### NODE PACKAGE FILE [PACKAGE.JSON] 📄

#### Attribute Table : [package.json]

| Attribute             | Value                             |
|-----------------------|-----------------------------------|
| Asset Name            | package.json                      |
| Relative Path         | ./                                |
| Hidden                | No                                |
| Include in Repository | Yes                               |
| Managed               | Yes                               |
| Asset Type            | JSON                              |
| Asset Size            | 250 Bytes                         |

#### Asset Purpose : [package.json]

Keeps all package dependency versions pinned. This ensures the environment is the same for all developers and minimises errors.

#### Asset Contents Description : [package.json]

A file that defines a Node.js project. It includes metadata about the project (e.g., name, version, description) and lists dependencies, scripts, and configuration for the project.

---

[BACK TO TOP](#markdownlint-cli2-cicd-pipeline-docker-project-programmers-manual)

---

### README [README.MD] 📄

#### Attribute Table : [readme.md]

| Attribute             | Value                             |
|-----------------------|-----------------------------------|
| Asset Name            | readme.MD                         |
| Relative Path         | ./                                |
| Hidden                | No                                |
| Include in Repository | Yes                               |
| Managed               | Yes                               |
| Asset Type            | JSON                              |
| Asset Size            | 10,587 Bytes                      |

#### Asset Purpose : [readme.md]

Provides general information about the project to enable users and developers to get an overview of what the project is about and how it's structured.

#### Asset Contents Description : [readme.md]

Provides an overall description of the project and other useful information.

---

[BACK TO TOP](#markdownlint-cli2-cicd-pipeline-docker-project-programmers-manual)

---

## GLOSSARY

| Term   | Definition                                                                     |
|--------|--------------------------------------------------------------------------------|
| APK    | Alpine Package Keeper. Alpine Linux package manager.                           |
| CI/CD  | Continues Integration Continues Development.                                   |
| CVSS   | Common Vulnerability Scoring System.                                           |
| Git    | Git source control used for managing code base.                                |
| GIT    | Source control software.                                                       |
| IDE    | Integrated Development Environment.                                            |
| JSONC  | JavaScript Object Notation Commented.                                          |
| MD     | Markdown.                                                                      |
| NMG    | Ninja Monkey Games™                                                            |
| NPM    | Network Package Manager. Used by Node.JS to manage plugins and other tools.    |
| OS     | Operating system.                                                              |
| PAT    | [Personal access tokens][10] are used instead of the Dockerhub account password.|
| PNG    | Portable Network Graphic.                                                      |
| RegEx  | Regular expression. A pattern of characters used to mask a string.             |
| SBOM   | Software Bill of Materials is list of package dependencies.                    |
| Secret | Encrypted key stored as an environment variable.                               |
| VSC    | Microsoft Visual Studio Code.                                                  |
| WCAG   | Web Content Accessibility Guidelines.                                          |
| WSL    | Windows Subsystem for Linux.                                                   |
| YAML   | Yet another markup language. Scripts that control CI/CD pipelines.             |

---

[BACK TO TOP](#markdownlint-cli2-cicd-pipeline-docker-project-programmers-manual)

---

## EXTERNAL RESOURCES

  [1]: https://github.com/DavidAnson/markdownlint/blob/main/schema/markdownlint-config-schema.json
  [2]: https://github.com/markdownlint/markdownlint/blob/main/docs/RULES.md
  [3]: https://www.conventionalcommits.org/en/v1.0.0/#specification
  [4]: https://git-scm.com/doc
  [5]: https://docs.github.com/en/communities/using-templates-to-encourage-useful-issues-and-pull-requests/syntax-for-githubs-form-schema
  [6]: https://docs.github.com/en/communities/using-templates-to-encourage-useful-issues-and-pull-requests/syntax-for-githubs-form-schema
  [7]: https://docs.docker.com/security/for-developers/access-tokens/
  [8]: https://github.com/markdownlint/markdownlint/blob/main/docs/RULES.md
  [9]: https://common-changelog.org/
  [10]: https://github.com/DavidAnson/markdownlint/blob/main/schema/markdownlint-config-schema.json
