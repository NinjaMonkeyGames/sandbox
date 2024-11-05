# Markdownlint-Cli2 CI/CD Pipeline Docker Project Programmers Manual

## PROJECT ASSETS

This section of the document details every file in the project with a description of what it does. Each asset has
several elements listed for each as follows:

**Asset Name** : *The name of the file or folder.*

**Relative Path** : *Relative path to asset.*

**Hidden** : *Hidden folders are prefixed with a dot. If the parent folder is hidden it will be marked as inherited.*

**Include in Repository** : *Indicates if the asset is included in the GitHub repository.*

**Asset Type** : *This will either be set to 'FOLDER' or the file extension I.E PNG, JSON, MD.*

**Purpose** : *Justifies the existence of said asset.*

**Asset Contents Description** : *This describes the contents of each file of folder in more detail. If the file*
*contains code then this will be broken down and explained in full.*

---

### ARTIFACTS [FOLDER]

#### Artifacts Folder Attribute Table

| Attribute             | Value        |
|-----------------------|--------------|
| Asset Name            | .artifacts   |
| Relative Path         | .artifacts   |
| Hidden                | Yes          |
| Include in Repository | Yes          |
| Managed               | Yes          |
| Asset Type            | FOLDER       |

#### Asset Purpose : [Artifacts Folder]

This folder is an attempt to keep files out of the root directory.

#### Asset Contents Description : [Artifacts Folder]

The '.artifacts' folder contains files that are used throughout the CI/CD pipeline process.

---

### LOGO [LOGO.PNG]

#### Logo Attribute Table : [logo.png]

| Attribute             | Value      |
|-----------------------|------------|
| Asset Name            | logo.png   |
| Relative Path         | .artifacts |
| Hidden                | Inherited  |
| Include in Repository | Yes        |
| Managed               | Yes        |
| Asset Type            | PNG        |

#### Asset Purpose : [logo.png]

Brand identification.

#### Asset Contents Description : [logo.png]

This file contains the NinjaMonkeyGames™ logo. This logo is used in internal markdown files for branding purposes.
This is a PNG logo that measures 32px x 32px.

![Company Logo](.artifacts/logo.png)

---

### MONKEY KNUCKLES AVATAR [MONKEY-KNUCKLES-AVATAR.PNG]

#### Monkey Knuckles Avatar Attribute Table : [monkey-knuckles-avatar.png]

| Attribute             | Value                         |
|-----------------------|-------------------------------|
| Asset Name            | monkey-knuckles-avatar.png    |
| Relative Path         | .artifacts                    |
| Hidden                | Inherited                     |
| Include in Repository | Yes                           |
| Managed               | Yes                           |
| Asset Type            | PNG                           |

#### Asset Purpose : [monkey-knuckles-avatar.png]

Brand identification.

#### Asset Contents Description : [monkey-knuckles-avatar.png]

This file contains the NinjaMonkeyGames™ logo. This logo is used in internal markdown files for branding purposes.
This is a PNG logo that measures 32px x 32px.

 ℹ *If you are a new developer and you have made a contribution to this project you should add your own avatar to the*
 *project and update the relevant parts of the documentation. See 'CONTRIBUTING.md'.*

![Monkey Knuckles Avatar](.artifacts/monkey-knuckles-avatar.png)

---

### CONFIGURATION [FOLDER]

#### Configuration Folder Attribute Table

| Attribute             | Value        |
|-----------------------|--------------|
| Asset Name            | .config      |
| Relative Path         | .config      |
| Hidden                | Yes          |
| Include in Repository | Yes          |
| Managed               | Yes          |
| Asset Type            | FOLDER       |

#### Asset Purpose : [Configuration Folder]

Keeps all plugin configuration files in the same place.

#### Asset Contents Description : [Configuration Folder]

Contains configuration files for various IDE plugins.

---

### MARKDOWNLINT CONFIGURATION FILE [.MARKDOWNLINT.JSONC]

#### markdownlint configuration file Attribute Table : [.markdownlint.jsonc]

| Attribute             | Value                 |
|-----------------------|-----------------------|
| Asset Name            | .markdownlint.jsonc   |
| Relative Path         | .config               |
| Hidden                | Yes                   |
| Include in Repository | Yes                   |
| Managed               | Yes                   |
| Asset Type            | JSON                  |

#### Asset Purpose : [.markdownlint.jsonc]

To consistently apply the same markdown linting rules across all markdown files within the project. This allows for
easier reading and rendering of markdown files.

#### Asset Contents Description : [.markdownlint.jsonc]

This file contains a list of rules written in JSONC format that dictate how markdownlint-cli2 will lint markdown files.
There are 49 Different rules. These rules are prefixed with 'MD' followed by a three digit number.

 ℹ *Some of the numbers appear to missing! These are legacy rules that were removed from markdownlint.
 MD002, MD006, MD008, MD014, MD015, MD016, MD0017 have been removed.*

#### Asset Code Description : [.markdownlint.jsonc]

##### Base Setup : [build-docker.yaml] - [CODE]

```yaml
// BASE SETUP

"default": true, // Set defaults for all rules as true by default.
"extends": null, // Explicitly specifies there are no extended configurations.
```

**Asset code description** : *default*

All rules will be considered true unless the configuration specifically states otherwise.

**Asset Code Description** : *extends*

This is set to null because this is the only configuration file that will be used in this project.

##### markdownlint-cli2 Configuration File Rule Table : [.markdownlint.jsonc]

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

### GIT [FOLDER]

#### Git Folder Attribute Table

| Attribute             | Value        |
|-----------------------|--------------|
| Asset Name            | .git         |
| Relative Path         | .git         |
| Hidden                | Yes          |
| Include in Repository | Yes          |
| Managed               | No           |
| Asset Type            | FOLDER       |

#### Asset Purpose : [Git Folder]

Allows Git source control to function.

#### Asset Contents Description : [Git Folder]

This folder contains configuration files required for Git to function and operate
 correctly. Under most circumstances this directory and it's contents should not be modified manually.

 ℹ *The individual files in this directory will not be listed here because they are managed by Git therefor you should
 defer to the [Git][1] and [GitHub][2] documentation*

---

### GITHUB [FOLDER]

#### GitHub Folder Attribute Table

| Attribute             | Value        |
|-----------------------|--------------|
| Asset Name            | .github      |
| Relative Path         | .github      |
| Hidden                | Yes          |
| Include in Repository | Yes          |
| Managed               | Yes          |
| Asset Type            | FOLDER       |

#### Asset Purpose : [GitHub Folder]

GitHub relies on this folder for workflow functionality.

#### Asset Contents Description : [GitHub Folder]

Stores files related to the GitHub CI/CD pipeline. Project documentation is also stored here.

---

### WORKFLOWS [FOLDER]

#### Workflow Folder Attribute Table

| Attribute             | Value             |
|-----------------------|-------------------|
| Asset Name            | workflows         |
| Relative Path         | .github\workflows |
| Hidden                | Inherited         |
| Include in Repository | Yes               |
| Managed               | Yes               |
| Asset Type            | FOLDER            |

#### Asset Purpose : [Workflows Folder]

GitHub relies on this folder for workflow functionality.

#### Asset Contents Description : [Workflows Folder]

Stores YAML files that will be triggered by GitHub Actions.

---

### BUILD DOCKERFILE [BUILD-DOCKER.YAML]

#### Dockerfile Attribute Table

| Attribute             | Value             |
|-----------------------|-------------------|
| Asset Name            | build-docker.yaml |
| Relative Path         | .github\workflows |
| Hidden                | Inherited         |
| Include in Repository | Yes               |
| Managed               | Yes               |
| Asset Type            | FOLDER            |

#### Asset Purpose : [build-docker.yaml]

1. Build with SBOM and Provenance (This satisfies Dockerhub container policy.)
2. Prevents the need to build and push Dockerfile manually reducing the possibility of human error.

#### Asset Contents Description : [build-docker.yaml]

This file is triggered by GitHub Actions. It checks if 'Dockerfile' has been updated then
builds and pushes the changes to Dockerhub.

#### Asset Code Description : [build-docker.yaml]

This section contains sequential breakdown of the code found in 'build-docker.yaml'. Below is a list of common keywords
and their function.

*See:* [Workflow syntax for GitHub Actions - GitHub Docs][3]

1. Set workflow title label.
2. Detect modifications to 'build-docker.yaml' on push / pull.
3. Initialise pipeline (Setup GitHub runner).
4. Checkout code.
5. Prepare docker buildx.
6. Login to Dockerhub with environment secrets. (Username and PAT)
7. Build and push container with SBOM and provenance.

##### Set workflow title label : [build-docker.yaml] - [CODE]

```yaml
# Set workflow title label

1. name: Build and Push Docker Image
```

##### Set workflow title label : [build-docker.yaml] - [PSEUDO-CODE]

```text
1. Set the title label for the entire file to 'Build and Push Docker Image'.
```

##### Performs Actions on push or pull requests if listed files are modified : [build-docker.yaml] - [CODE]

```yaml
# Performs Actions on push or pull requests if listed files are modified.

1. on:
2.  push:
3.    paths:
4.      - 'Dockerfile'

5.  pull_request:
6.    paths:
7.      - 'Dockerfile'
```

##### Performs Actions on push or pull requests if listed files are modified : [build-docker.yaml] - [PSEUDO-CODE]

```text
1. Waits for an action.
2. Detects push event.
3. Tells GitHub that a list of files and paths will follow.
4. Checks 'Dockerfile'.
    
2. Check if Dockerfile has been modified.
```

##### Initialise pipeline : [build-docker.yaml] -[CODE]

```yaml
# Initialise Pipeline

1. jobs:
2.  build:
3.    runs-on: ubuntu-3.20.3
```

##### Initialise pipeline : [build-docker.yaml] - [PSEUDO-CODE]

```text
1. Initialise job.
2. Specifies type of job.
3. Set runner to run job on ubuntu-3.20.3.
    a. 'runs-on:' tells GitHub an O/S is about to be specified.
    b. 'ubuntu-3.20.3' Specifies O/S version.
```

##### Checkout Code : [build-docker.yaml] - [CODE]

```yaml
# Checkout Code

1. - name: Checkout code
2.   uses: actions/checkout@v3
```

##### Checkout Code : [build-docker.yaml] - [PSEUDO-CODE]

```text
1. Set 'Checkout Code' label.
2. Checkout code with GitHub Actions checkout script.
    a. 'actions/' instructs Github to enter the actions namespace.
    b. 'checkout' instructs GitHub to checkout code.
    c. '@' Tells GitHub that a specific version of GitHub Actions will be used.
    d. v3 Specfies that version 3 should be used when calling pre-built Actions.
```

##### Set Up Docker Buildx : [build-docker.yaml] - [CODE]

```yaml
- name: Set up Docker Buildx
  uses: docker/setup-buildx-action@v3
```

##### Set Up Docker Buildx : [build-docker.yaml] - [PSEUDO-CODE]

```text
1. Set 'Set Up Docker Buildx' label.
2. Tells GitHub to use the 'docker/setup-buildx-action@v3' docker setup script.
    a. 'docker/' Sets namespace to GitHub Actions Docker script.
    b. 'setup-buildx-action' instructs GitHub to prepare buildx.
    c. '@' Tells GitHub that a specific version of GitHub Actions will be used.
    d. v3 Specfies that version 3 should be used when calling pre-built Actions.
```

##### Log In To Dockerhub : [build-docker.yaml] - [CODE]

```yaml
1. - name: Log in to Dockerhub
2.   uses: docker/login-action@v3
3.      with:
4.          username: ${{ secrets.DOCKER_USERNAME }}
5.          password: ${{ secrets.DOCKER_HUB_PAT }}
```

##### Login To Dockerhub : [build-docker.yaml] - [PSEUDO-CODE]

```text
1. Set 'Login to Dockerhub' label.
2. Tells GitHub to use the 'docker/login-action@v3' docker login script.
    a. 'uses:' Indicates to GitHub that an Actions script will be called upon.
    b. 'docker/' Sets namespace to GitHub Actions Docker script.
    c. 'login-action' prepares GitHub to authenticate with Dockerhub.
    d. '@' Tells GitHub that a specific version of GitHub Actions will be used.
    e. v3 Specfies that version 3 should be used when calling pre-built Actions.
3. Puts the GitHub Actions script in a state where it is ready to accept credentials.
4. Points to username secret.
    a. 'username:' tells the 'login-action' script that the following string will be the username.
    b. '$' Indicates that the following string will be a variable.
    c. '{{ secrets.DOCKER_USERNAME }}' specifies the name of the secret variable username.
5. Points to the password secret.
    a. 'password:' tells the 'login-action' script that the following string will be the password.
    b. '$' Indicates that the following string will be a variable.
    c. '{{ secrets.DOCKER_HUB_PAT }}' specifies the name of the secret variable PAT.
```

##### Build and push container with SBOM and provenance : [build-docker.yaml] - [CODE]

```yaml
- name: Build and push Docker image with SBOM and Provenance
  if: github.event.before != github.event.after
  run: |
    docker buildx build \
      --sbom=true \
      --provenance=true \
      --tag monkeyknuckles/markdownlint-cli2:latest \
      --push .
```

##### Build and push container with SBOM and provenance : [build-docker.yaml] - [PSEUDO-CODE]

```text
1. Set 'Build and push Docker image with SBOM and Provenance' label.
2. Check if Dockerfile has been modifed.
3. 'run: |' Executes script in list form. (One flag / switch after another)
4. Set SBOM to true.
5. Set provenance to true.
6. Push built Docker file to container 'monkeyknuckles/markdownlint-cli2:latest'.
```


---

## Glossary

| Term | Meaning                                                                        |
|------|--------------------------------------------------------------------------------|
| PAT  | Personal access token. This is used instead of the Dockerhub account password. |
| SBOM | Software Bill of Materials is list of package dependencies.                    |
| VSC  | Microsoft Visual Studio Code.                                                  |
| IDE  | Integrated Development Environment.                                            |

---

## External Resources

  [1]: https://git-scm.com/docs
  [2]: https://docs.github.com/en
  [3]: https://docs.github.com/en/actions/writing-workflows/workflow-syntax-for-github-actions
