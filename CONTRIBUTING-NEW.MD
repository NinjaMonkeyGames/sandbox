# Contributing

This document contains information about house-styles, project structure and instructions on how to successfully merge
your pull requests. There are strict rules about how documentation should be updated. There are also strong linting
rules to ensure a clean and consistent code base.

## GOLDEN RULES

1. 'Magic numbers' are forbidden at all times.
2. Each time a file is modified, it's documentation counter-part must be updated before changes should be pushed.

ℹ️ *You will NOT be able to merge with the master branch if you have not documented your changes correctly.*

There are a number of attributes associated with each file that if modified will necessarily require an update of the
documentation. This is by design in order to maintain development focus and workflow.

## CONTRIBUTE TO DEVELOPER.MD

### STYLE GUIDE

#### Text Formatting

| Style Description         | Case            |
|---------------------------|-----------------|
| Level 1 heading (#)       | Title Case      |
| Level 2 heading (##)      | ALL CAPS        |
| Level 3 heading (###)     | ALL CAPS        |
| Level 4 heading (####)    | Title Case      |
| Level 5 heading (#####)   | Sentence case   |
| Table Headings            | Title Case      |
| Attribute Table Contents  | Title Case      |
| Regular markdown text     | Sentence case   |
| Emoji text                | Italic          |
| Asset Code Breakdown List | Sentence case   |

#### Heading Structure

##### Level 3 project asset headings for folders structure

```markdown
### EXAMPLE [FOLDER] 📁
```

```markdown
###       : Indicates a level 3 heading.
EXAMPLE   : is the name of the folder.
[FOLDER]  : describes the type of asset.
📁        : Is a visual cue to indicate this is a folder asset.
```

##### Level 3 project asset headings for files structure

```markdown
### EXAMPLE [EXAMPLE.JS] 📄
```

```markdown
###       : Indicates a level 3 heading.
EXAMPLE   : is the name of the folder.
[FOLDER]  : describes the type of asset.
📄        : Is a visual cue to indicate this is a file asset.
```

##### Level 4 project asset headings structure

```markdown
#### Sub-heading name : [example-file.js]
```

```markdown
####              : Indicates level 4 heading.
Sub-heading name  : Examples 'Attribute Table', 'Asset Purpose'.
:                 : Seperation character.
[example-file.js] : The name of the file which is being refered to.
```

ℹ️ *[example-file.js] is repeated for each sub-section in order to make the document easier to read. As you scroll
through the document you still have a reference to scope.*

##### Level 5 project asset headings structure

```markdown
##### Example code heading : [.markdownlint.jsonc] - [CODE]
```

```markdown
#####                         : Indicates level 5 heading.
Example code heading          : This is the same as the heading from a code block.
:                             : Seperation character.
[example-file.js]             : The name of the file which is being refered to.
-                             : Seperates file name from block type description.
[CODE] or [CODE DESCRIPTION]  : This describes the type of level 5 heading.
```

## NEW DEVELOPER ONBOARDING PROCESS

### ENVIRONMENT SETUP

#### Software Requirements

This list of software packages must be installed in order to set up the development environment.

| Vendor    | Software           | Version | Link                                           |
|-----------|--------------------|---------|------------------------------------------------|
| Microsoft | Visual Studio Code | 1.96.2  | [https://code.visualstudio.com/download][1]   |
| Microsoft | Windows            | 10.0.26 | [Windows 11][2]                                |
| Intevation| Gpg4win            | 4.4.0   | [Gpg4win][3]                                   |
| Microsoft | GitHub Desktop     | 2.46.0  | [GitHub Desktop][4]                            |
| Apache    | XAMPP              | 8.2.12  | [XAMPP][5]                                     |

ℹ️ *These are the versions of the software that everything has been tested to work on. As long as the Pull requirements
are met you may use this list as a recommendation.*

### ADD AVATAR TO ARTIFACTS FOLDER

All developers must include their avatar in the project.

1. Your avatar must be named in the following format.
  a. All lowercase
  b. Kebab case
  c. Your avatar handle name
  d. Must be a PNG
  e. Text 'avatar' must be placed just before the file extension
  f. Avatar must be 32px x 32px

**Example:**

```text
my-example-handle-name-avatar.png
```

2. Place your avatar in the .artefacts folder located in the root of the project directory.

3. In 'DEVELOPER.md' navigate to the 'Project Assets' section and locate an existing avatar.

4. Copy and edit existing avatar entry.

  a. Copy and paste an existing avatar section and paste it in the order the appear in VSC file tree view.

  b. Modify the details to match your own avatar details.

5. Add TOC reference.

  a. Find the correct location in the table of contents to place the link to the avatar you just created.

  b. Create a link to your avatar section in the document.

### INVITE TO GITHUB

1. Login to [GitHub][6] teams.
2. Click, 'Add a member'.
3. Search for the user to add or enter en email address.
4. Click, invite.

The user should now receive an invitation and are now able to join 'Team Ninja'.

### SETUP GPG SIGNED COMMITS

#### Create GPG key

1. Open 'Gpg4win'(Kleopatra tool).
2. Press CTRL + N.
3. Enter your name or your handle.
4. Enter your email address.
5. Click, 'Protect the generated key with a passphrase.'.
6. Select, 'Advanced options'.
7. Select 'rsa4096' from the 'Key Material' menu.
8. Click OK.
9. Enter your password.
10. Repeat your password.
11. Press OK.
12. Right-click on the newly created key and click export.
13. Browse to a location of your choice and click 'Save'.

#### Copy Private Key

1. Open Visual Studio Code.
2. Select the terminal tab.
3. Enter command: gpg --list-secret-keys --keyid-format LONG
4. Copy the signin key printed in the terminal output.

ℹ️ *This is everying after 'rsa4096/' but before the date.*

5. Configure Git
  a. In the VSC terminal type git config --global user.name "YOUR_USERNAME"
  b. In the VSC terminal type git config --global user.name "YOUR_EMAIL"
  c. In the VSC terminal type git config --global user.name "YOUR_SIGNINKEY"

  ℹ️ *Including the quotes.*

  d. In the VSC terminal type git config --global commit.gpgsign true
  e. In the VSC terminal type git config --global tag.gpgsign true
  f. In the VSC terminal type git config --global gpg.program "C:\Program Files (x86)\GnuPG\bin\gpg.exe"

ℹ️ *Run git config --global --list will list all the details you have just entered. You can use this command to check the details you input are correct.*

#### Copy Public Key

5. Enter gpg --armor --export
6. Copy the Public GPG key from the terminal including the header and footer block text.

#### Summary

You should now be asked for a password every time you commit.

#### Copy Public Key To GitHub

1. Login to GitHub and navigate to [GPG keys][7].
2. Click, 'New GPG key'.
3. Provide the developers name or handle as the title.
4. Paste the public GPG in the 'Key' field.
5. Click, 'Add GPG Key'.

## EXTERNAL LINKS

  [1]: https://code.visualstudio.com/download
  [2]: https://www.microsoft.com/en-gb/software-download/windows11/?msockid=2f79e1425ae96a8f39c2f5a65b2b6b1b
  [3]: https://www.gpg4win.org/get-gpg4win.html
  [4]: https://desktop.github.com/download/
  [5]: https://www.apachefriends.org/download_success.html
  [6]: https://github.com/orgs/NinjaMonkeyGames/teams/team-ninja
  [7]: https://github.com/settings/keys
