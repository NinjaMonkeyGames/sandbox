# CONTRIBUTING

This document contains important information for anyone who wants to develop for this project. It covers processes that
need to be followed in order to complete a successful [PR](#glossary). This document also contains standards and
conventions which must be observed in order to maintain a healthy repository.

⚠️ *You will NOT be able to merge into the `master` branch unless the contribution process has been followed correctly.*

ℹ️ *While many repositories now use main as the default branch name, this repository retains `master` to remain
consistent with its established workflow.*

[![Common Changelog](https://common-changelog.org/badge.svg)](https://common-changelog.org)
![Conventional Commits](https://img.shields.io/badge/Conventional%20Commits-1.0.0-yellow.svg)

## TABLE OF CONTENTS

- [CONTRIBUTING](#contributing)
  - [TABLE OF CONTENTS](#table-of-contents)
  - [DOCUMENT SYMBOLS LEGEND](#document-symbols-legend)
  - [PROJECT STANDARDS](#project-standards)
    - [DOCUMENT FORMATTING](#document-formatting)
      - [MARKDOWN DOCUMENTS](#markdown-documents)
        - [HEADINGS](#headings)
    - [POLICY](#policy)
      - [SIGNED COMMITS](#signed-commits)
    - [CONVENTIONS](#conventions)
      - [GITFLOW BRANCHING STRATEGY](#gitflow-branching-strategy)
      - [FILE NAMING CONVENTION](#file-naming-convention)
        - [Snake Case](#snake-case)
        - [File Extensions](#file-extensions)
        - [Exceptions](#exceptions)
      - [SPELLING CONVENTION](#spelling-convention)
      - [DATE STAMP CONVENTION](#date-stamp-convention)
      - [CONVENTIONAL COMMITS](#conventional-commits)
  - [PROCESSES](#processes)
    - [FEATURE COMMIT PROCEDURE](#feature-commit-procedure)
      - [FETCH ORIGIN (1)](#fetch-origin-1)
      - [SYNCHRONISE FEATURE BRANCH WITH DEVELOP (2)](#synchronise-feature-branch-with-develop-2)
      - [PERFORM PRE-STAGE VISUAL CHECKS (3)](#perform-pre-stage-visual-checks-3)
      - [CREATE A VALID COMMIT MESSAGE (4)](#create-a-valid-commit-message-4)
      - [STAGE ALL CHANGES (5)](#stage-all-changes-5)
      - [COMMIT CHANGES (6)](#commit-changes-6)
      - [PERFORM FINAL VISUAL CHECKS (7)](#perform-final-visual-checks-7)
      - [PUSH CHANGES (8)](#push-changes-8)
    - [CREATING A VALID COMMIT MESSAGE](#creating-a-valid-commit-message)
      - [TITLE](#title)
        - [Type](#type)
        - [Scope](#scope)
      - [TITLE DESCRIPTION](#title-description)
      - [COMMIT BODY TEXT](#commit-body-text)
        - [Fix](#fix)
        - [Update](#update)
        - [Add](#add)
        - [Delete](#delete)
      - [Git Trailers](#git-trailers)
        - [Fixes](#fixes)
        - [Closes](#closes)
        - [References](#references)
      - [FOOTER](#footer)
  - [CONTACT INFORMATION](#contact-information)
  - [GLOSSARY](#glossary)
  - [RESOURCES](#resources)
  - [COPYRIGHT](#copyright)

---

## DOCUMENT SYMBOLS LEGEND

ℹ️ **Information:** *Provides additional details or context about a specific issue but does not require any immediate
action, unlike a pro-tip.*

⚠️ **Caution:** *Alerts you to a point where overlooking it could lead to potential problems down the line.*

⛔ **Warning:** *Signals a critical issue that, if ignored, will almost certainly cause problems. This symbol marks
actions or situations you should avoid.*

💡 **Pro-tip:** *Offers a helpful shortcut or technique to make a task easier or more efficient.*

---

## PROJECT STANDARDS

This project employs a number of standards, some of which are enforced by CI, while others are conventions. Please also
see our [Code of Conduct](./CODE_OF_CONDUCT.md) for guidelines on inclusive and respectful communication.

### DOCUMENT FORMATTING

This is a professional project, so clarity and consistency are essential. This section outlines the various types of documents and how they are constructed and formatted.

#### MARKDOWN DOCUMENTS

This section outlines the general formatting rules for all Markdown documents. It does not address the linting policy; it strictly focuses on the formatting standards for this project.

##### HEADINGS

| Level     | Case     |
|-----------|----------|
| 1         | UPPER    |
| 2         | UPPER    |
| 3         | UPPER    |
| 4         | UPPER    |
| 5         | TITLE    |
| 6         | TITLE    |



### POLICY

#### SIGNED COMMITS

All commits must be signed with a [GPG](#glossary) key. This is to ensure traceability, code quality and accountability
which helps maintain the integrity of the repository.

ℹ️ Need help signing commits? *See: [conventional commit][2]*

### CONVENTIONS

#### GITFLOW BRANCHING STRATEGY

This project follows the [GitFlow][3] branching model.

**Branch Naming Convention:**

- `feature/<short-description>`
- `bugfix/<issue-id>-<short-description>`
- `hotfix/<short-description>`
- `release/<version>`

#### FILE NAMING CONVENTION

##### Snake Case

Most files in this project follow the lower-case, snake-case convention. There are some exceptions to this rule due to
other standardised industry practices. For example 'Dockerfile' would break this convention.

##### File Extensions

Most file names in this project should include their file extensions. However, there are exceptions based on
standardised industry practices. For example, LICENSE is typically created without an extension because that’s how
GitHub generates and recognises it when initialising a new repository.

##### Exceptions

- README.md
- CONTRIBUTING.md
- .gitignore
- .gitattributes
- TODO.md

ℹ️ *This is not an exhaustive list and should be updated when a new exception is noted.*

#### SPELLING CONVENTION

Please use British-English spellings (e.g., "standardised" instead of "standardized") to ensure consistency throughout
the project.

#### DATE STAMP CONVENTION

Date stamps must be in the format YYYY-MM-DD. This is in line with conventional changelog conventions.

#### CONVENTIONAL COMMITS

All commit messages must comply with the [conventional commit][1] v1.0.0 standard.

---

## PROCESSES

This section of the document explains what procedures must be followed to perform various actions within the project.
Such as how to:

- Contribute a new feature.
- Modify the supporting project documentation.
- Submit an issue.

### FEATURE COMMIT PROCEDURE

1. Fetch origin.
2. Synchronise the feature branch with develop.
   - Check out your `feature branch`.
   - Stash uncommitted changes (optional but recommended).
   - Pull the latest changes from `develop`.
   - Resolve merge conflicts, if any.
3. Perform pre-stage visual checks.
4. Create a valid commit message.
5. Stage all changes.
6. Commit changes.
7. Perform final visual checks.
8. Push changes.

#### FETCH ORIGIN (1)

Update all local references, tags, and branches:

```bash
    git fetch origin
```

#### SYNCHRONISE FEATURE BRANCH WITH DEVELOP (2)

Ensure your feature branch includes the latest updates from `develop`. This helps avoid merge conflicts and keeps your
work based on the most current code.

**a. Checkout your feature branch:**

```bash
    git checkout your-feature-branch
```

**b. Stash any local changes (optional but recommended):**

```bash
    git stash push -m "WIP: saving work before syncing with develop"
```

**c. Pull the latest changes from develop into your feature branch:**

```bash
    git pull origin develop
```

⚠️ *If there are merge conflicts, resolve them carefully. After resolving, commit the changes using a
signed commit.*

#### PERFORM PRE-STAGE VISUAL CHECKS (3)

- Resolve all issues shown in the editor’s Problems panel.
- Run a spell check on comments and documentation.
- Perform a final visual pass for formatting and syntax consistency.

#### CREATE A VALID COMMIT MESSAGE (4)

Follow the [Creating a Valid Commit Message](#creating-a-valid-commit-message) procedure. Make sure your message adheres
to the Conventional Commits standard.

#### STAGE ALL CHANGES (5)

Add all modified, new, and deleted files to the staging area:

```bash
    git add .
```

#### COMMIT CHANGES (6)

⚠️ **Reminder:** *Use a signed commit and ensure the message is properly formatted.*

```bash
    git commit -S -F .git/COMMIT_EDITMSG
```

#### PERFORM FINAL VISUAL CHECKS (7)

- Make sure that the commit message matches what you expect before final push.

#### PUSH CHANGES (8)

Push your local feature branch to the remote repository:

```bash
    git push
```

---

### CREATING A VALID COMMIT MESSAGE

In this project, commit messages are edited directly in .git/COMMIT_EDITMSG

⚠️ *All commit messages must comply with the conventional commit v1.0.0 standard.*

*Example:*

```text
<type>(<scope>): <short summary>

Fix:

- file-example-0.php
- file-example-1.php

What was fixed?

<Brief description what fixes were applied>

Why was it fixed?

<Brief description of why the fixes were applied>

Update:

- file-example-0.md
- file-example-1.md

What was changed?

<Brief description of the changes made>

Why was it changed?

<Brief description of why the changes were made>

Add:

- file-example-2.php
- file-example-3.php

What was added?
<Brief description of what was added>

Why was it added?

<Brief description of why it was added>

Delete:

- file-example-4.php
- file-example-5.php

What was deleted?

<Brief description of what was deleted>

Why was it deleted?

<Brief description of why it was deleted>

Fixes: #123
References: #456
Signed-off-by: Your Name <your@email.com>
```

⛔ *Please refrain from using emojis anywhere in commit title, body, or footer.*

#### TITLE

The title is the most important part of the commit message as this section is used by CI tooling in order to bump
version numbers and generate conventional changelogs. The title is composed of three parts: type, scope, and
description.

The commit `type` and `scope` values are based on the [Conventional Commits v1.0.0][2] specification, with additional
project-specific entries included below for consistency and broader coverage.

##### Type

| Type     | Description                                           | Semantic Version Bump |
|----------|-------------------------------------------------------|:---------------------:|
| feat     | New feature                                           |        ✅             |
| fix      | Bug fix                                               |        ✅             |
| docs     | Documentation changes                                 |        ❌             |
| style    | Code style changes (formatting, etc., no code change) |        ❌             |
| refactor | Refactor without adding new features or fixing bugs   |        ❌             |
| perf     | Performance improvements                              |        ❌             |
| test     | Adding or updating tests                              |        ❌             |
| build    | Changes to build system or dependencies               |        ❌             |
| ci       | Continuous integration-related changes                |        ❌             |
| chore    | Other changes that don't modify source or test files  |        ❌             |
| revert   | Reverts a previous commit                             |        ❌             |

*Legend:*

- ✅ *Indicates that keyword will trigger Semantic Release to bump the version.*
- ❌ *Indicates that keyword will NOT trigger Semantic Release to bump the version.*

💡 *Place ! after the scope of your conventional commit to indicate a breaking change and thus bump a major version.*

*Example:*

```text
feat(api)!: drop support for legacy auth token

BREAKING CHANGE: Legacy auth tokens are no longer supported. All API clients must now use OAuth2.
```

##### Scope

| Scope    | Description                                           |
|----------|-------------------------------------------------------|
| core     | For core changes                                      |
| api      | For API-related changes                               |
| ui       | For UI-related changes                                |
| auth     | For authentication changes                            |
| db       | For database changes                                  |
| deps     | For dependency updates                                |
| tests    | For test-related changes                              |
| config   | For configuration updates                             |
| security | For security-related changes                          |
| rebase   | For rebase-related changes                            |

#### TITLE DESCRIPTION

The title description is limited to 72 characters including the scope and the type text. Therefore you must quickly
describe the nature of the change in just a few words.

⚠️*You must not ignore this limit.*

This limit is to prevent too many changes from happening in a single commit. Commits should be small, meaningful,
articulable changes.

*Example:*

✅ **Correct**

```text
docs(core): update contributing document
```

❌ **Incorrect**

```text
Example: docs(core): update contributing document, here is a longer description of what was changed.
```

#### COMMIT BODY TEXT

Under conventional commit standards the description contains a more detailed explanation of the code changes. This
project has additional requirements for how the body should be constructed.

The first step is to select the correct keywords to use to describe what type of change has occurred. The options are:

- Fix:
- Update:
- Add:
- Delete:

##### Fix

This tag should be used if the project has fixed something. For a file containing code this might be fixing a bug, for a
document it may be fixing markdown syntax or correcting a spelling mistake.

What was fixed?

Brief description of the fixes applied.

Why was it fixed?

Brief description of why the fixes were applied.

##### Update

This tag should be used if the project has modified an existing asset to improve its function or added additional
sub-functionality. For a document this might be something like adding an item to a list of categorised items.

What was updated?

Brief description of the updates applied.

Why was it updated?

Brief description of why the updates were applied.

##### Add

This tag should be used if the project has introduced a new file or added a new section of information to a file. For
example this might be a new sub-routine for code or it might be a heading if it's a document.

What was added?

Brief description of what was added to the code base. This could be a function, section in a new section in a document
or a file.

Why was it added?

Briefly describe the purpose behind what was added.

##### Delete

This tag should only be used when removing something from the project entirely. This may mean removing an entire section
of a manual that describes code that was deprecated or it may mean deleting an entire file.

What was deleted?

Brief description of what was deleted.

Why was it deleted?

Brief description justifying the removal.

⚠️ *You must include the What? and Why? headings text in the commit itself.*

💡*Copy and paste the example given at the beginning of this section and replace with details for your commit.*

#### Git Trailers

Git trailers are metadata lines added to the end of a commit message. When used correctly, GitHub parses them to update
issue statuses automatically. This project utilises the following
Git Trailers:

- Fixes
- Closes
- References

Example:

```text
Fixes: #123
```

⚠️ *Observe the formatting otherwise GitHub will not link the issues correctly.*

##### Fixes

If a specific bug or problem is raised as an issue this will mark that issue as fixed in that commit.

##### Closes

If a request for a change that does not involve a bug fix is completed the 'closes:' tag should be used.

ℹ️ *Closes and Fixes both have the same effect of closing an issue, but are used differently for semantic purposes. For
example: An issue is raised to change the
colour of a button. It is considered closed opposed to fixed because it was not broken per se.*

##### References

The 'References:' tag adds metadata to the referenced issue history to indicate that some work has been done on this
issue or there is some relevance to that commit.

#### FOOTER

The footer section of the commit message is reserved for signature. This is used for [DCO](#glossary) compliance.

*Example:*

```text
Signed-off-by: Daniel Mallett <daniel.mallett@ninjamonkeygames.com>
```

---

## CONTACT INFORMATION

Author: Daniel Mallett (Monkey Knuckles)

If you have any problems with the repository or have any suggestions please contact us at <info@ninjamonkeygames.com>.

You may also contact us via our [website](https://ninjamonkeygames.com).

Any bugs should be raised as an [issue](https://github.com/NinjaMonkeyGames/markdownlint-cli2/issues) on GitHub.

---

## GLOSSARY

| Term   | Definition                                                                       |
|--------|----------------------------------------------------------------------------------|
| PR     | Pull Request.                                                                    |
| TOC    | Table of Contents.                                                               |
| GPG    | GNU Privacy Guard.                                                               |
| DCO    | Developer Certificate of Origin.                                                 |
| CI/CD  | Continuous integration / continuous development.                                 |
| VSC    | Visual Studio Code.                                                              |

---

## RESOURCES

[1]: https://www.conventionalcommits.org/en/v1.0.0/
[2]: https://docs.github.com/en/authentication/managing-commit-signature-verification/about-commit-signature-verification
[3]: https://nvie.com/posts/a-successful-git-branching-model/

---

## COPYRIGHT

*NinjaMonkeyGames™ Copyright © 2025 All rights reserved.*
