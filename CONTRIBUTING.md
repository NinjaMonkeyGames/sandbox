# Contributing

This document contains information about house-styles, project structure and instructions on how to successfully merge
your pull requests. There are strict rules about how documentation should be updated. There are also strong linting
rules to ensure a clean and consistent code base.

## NEW DEVELOPER ONBOARDING PROCESS

  - Add avatar to .artefacts folder.
  - Create a GPG key
  - Invite to github

## PULL REQUEST POLICY

Project must pass all CI/CD pipeline tests before merging with the master branch will be considered. Before a merge is
authorised all documentation must be updated to reflect any changes made to the code base.

### ENFORCEMENT RULES

1. If any of the CI/CD processes fail with and exit code other than zero the problem must be resolved before you will be
allowed to merge with the code base.

2. Authorisation from the repository administrator is required before a merge with the master branch can be performed.

3. Repository a requires linear history.

4. Stale commits will be dismissed.

5. GitHub conversations must be resolved before a merge with the master branch can be authorised.

6. Requests will automatically be referred for a code pilot review as an extra layer of precaution.

7. Brute force pushes are strictly prohibited.

8. CodeQL checks must pass.

9. branch data will be removed once a successful merge has been performed.

⚠️ *It is essential that the code base integrity is maintained at all times.*

## COMMIT AND PUSH PROTOCOL

### IDE PROBLEM CHECKING

### UPDATE DEVELOPER.MD

### CHECK COMMIT FORMATTING

### FINAL HUMAN SANITY CHECK

## DEVELOPER MANUAL STRUCTURE

This section of the document explains how 'DEVELOPER.md' is structured and how to modify it's contents. The
'DEVELOPER.md' document has been structured in a very specific way in order to maintain readability and to prepare for
future automation of document generation.

⚠️ *Please familiarise yourself thoroughly with the following documents before contributing to this project.*

  - README.md
  - DEVELOPER.md
  - CONTRIBUTING.md

### PROJECT ASSETS

The project assets section of the the 'DEVELOPER.md' is comprised of several sections serving different purposes. A list
and description of each is listed below.

1. Heading.
2. Attribute Table.
3. Asset Purpose.
4. Asset Contents Description.
5. Asset Code Breakdown.
6. Code.
7. Code Description.

#### Heading

The heading identifies the asset. It should always follow a specific format.

  1. Three hashes in a row followed by a space. '### '

  2. The title is the file name of the asset capitalised with all non-alphabetic characters removed and the file
    extension removed followed by a space. Example: example-file.yaml would become 'EXAMPLE FILE '.

  3. The full filename including non-alphabetic characters, fully capitalised with extension encapsulated in
    Square brackets, followed by a space. Example: '[EXAMPLE-FILE.YAML] '.

  4. Use an emoji to denote the type of resource. Either use 📄 for a file or 📁 for a folder.

##### Heading example

```markdown
### EXAMPLE FILE [EXAMPLE-FILE.YAML] 📄
```

#### Attribute Table

Every asset listing comes with an attribute table. The attribute table contains the following metrics:

  1. Asset Name.
  2. Relative path.
  3. Hidden.
  4. Include in Repository.
  5. Managed.
  6. Asset Type.

##### Asset Name

The asset name entry is the entire asset name including any capitalisation and file extensions.

##### Relative Path

The relative path of the asset should be './' if the asset is in the root directory. Other wise the path should be
listed up to the asset but not including it.

**Incorrect example:**

```markdown
example_directory/example_depth/example-file.yaml
```

**Correct example:**

```markdown
example_directory/example_depth
```

##### Hidden

There are three different options for this attribute.

  1. True means the asset is hidden with a '.' prefix.
  2. False means the asset is not hidden and is not stored within a hidden folder.
  3. Inherited means the asset itself is not hidden but resides inside a hidden folder.

ℹ️ *If an asset has both inherited and hidden it should be marked as 'true'.*

##### Include in Repository

This determines if the asset is managed by source control. For example 'bode_modules' is used in the development
environment but is not a part of the project itself. This means it is not subject to CD/CI pipeline code quality checks.

##### Managed

This is a similar attribute to 'Include in Repository'. The difference is an asset can be a part of the repository but
still not maintained. for example package-lock.json is included in the project but it is not edited manually under
normal circumstances and the contents are not described in the manual in any detail.

##### Asset Type

This attributed will either be a folder with the entry 'FOLDER' or it will be the file type usually the file extension
such as:

  - PNG
  - YAML
  - HTML
  - Dockerfile

⚠️ *Some times the file type is not the same as the extension. For example 'settings.json' is actually a JSONC file.*
*However VSC will not work if you rename it as such.*

##### Attribute table example

```markdown
| Attribute             | Value        |
|-----------------------|--------------|
| Asset Name            | example.yaml |
| Relative Path         | .example     |
| Hidden                | Inherited    |
| Include in Repository | Yes          |
| Managed               | Yes          |
| Asset Type            | JSONC        |
```

#### Asset Purpose

This section describes not the contents of the asset but the purpose of it. Why does this asset exist. With the
'example.json' example stated previously it's purpose would be 'To provide an example of how assets should be referenced
throughout the manual'.

#### Asset Contents Description

This section gives an overview of what the asset does. For example 'settings.json' stores IDE settings for Microsoft
VSC.

#### Asset Code Breakdown

This section breaks down the code contained in an asset first by block then by line then by tokens of code in longer
lines of code.

Each block of code has a comment heading with a short description of what that block of code does. These block comment
headings should be copied an pasted one at a time in list form.

##### Asset code breakdown and description example

1. Show message.
2. Don't show message.

##### Show message : [example.js] - [CODE]

```javascript
1. if (1 + 1 === 2)
2. {
3.  alert("Hello world!");
4. }
```

##### Show message : [example.js] - [CODE DESCRIPTION]

```markdown
1. Check if the sum of 1 + 1 is equal to 2.
  a. 'if' is a conditional statement.
  b. '()' encapsulates the conditional statement.
  c. '1 + 1 === 2' checks if 1 + 1 is equal to 2.
    i. '1 + 1' is summed up as 2.
    ii. '===' is a strict comparison. (That is both data type and value)
    iii. '2' is the comparator value.

2. '{' is equivalent of a then statement.

3. Popup an alert message with a 'Hello world!' message.
  a. 'alert' is a JavaScript function that pops up a textbox.
  b. '()' contains the conditional statement.
  c. "Hello world!" Contains the popup message text string.
  d. ';' terminates the line.

4. '}' is equivalent of an end if statement.
```

##### don't show message : [example.js] - [CODE]

```javascript
1. if (1 + 1 === 1)
2. {
3.  alert("Hello world!");
4. }
```

##### Don't show message : [example.js] - [CODE DESCRIPTION]

```markdown
1. Check if the sum of 1 + 1 is equal to 1.
  a. 'if' is a conditional statement.
  b. '()' encapsulates the conditional statement.
  c. '1 + 1 === 1' checks if 1 + 1 is equal to 1.
    i. '1 + 1' is summed up as 2.
    ii. '===' is a strict comparison. (That is both data type and value)
    iii. '2' is the comparator value.

2. '{' is equivalent of a then statement.

3. Popup an alert message with a 'Hello world!' message.
  a. 'alert' is a JavaScript function that pops up a textbox.
  b. '()' contains the conditional statement.
  c. "Hello world!" Contains the popup message text string.
  d. ';' terminates the line.

4. '}' is equivalent of an end if statement.
```

##### Asset code breakdown formatting

The code breakdown hierarchy is as follows:

  1. A single file containing code.
  2. Code is then broken down into blocks of logical functionality.
  3. The code is then broken down by line.
  4. Code is then further broken down into parts we will refer to as tokens.
  5. Sometimes a token is broken down further if the token description is too expansive. We will refer to these as
  sub-tokens.

You can see form the example above:

  1. 'Show message' is a functional block.
  2. 'if (1 + 1 === 1)' is an example line of code.
  3. 'if', '()' and 1 + 1 === 1 are examples of code tokens.
  4. '1 + 1', '===', and '2' are examples of sub-tokens.

There are some stylistic rules that need to be taken into consideration when making asset entries in the manual.

###### Listing format

  1. Numbered bullets '1.' are used to indicate the line of code the description refers to.
  2. Lettered bullet points 'a.' are used to indicate this is a tokenised section of the line above.
  3. Roman numerals 'i' are then used for sub-tokens.

###### Token and line formatting

  1. This is a description of the entire line of code.
    a. Describes a tokenised section of code.
      i. Describes the sub-section of code if it needs to be tokenised further.

  The formatting for the tokens and sub-tokens should usually start the line with the token in single quotes unless the
  token already contains them.

  For example: 'alert("Hello World!")' displays an alert message. The document has been designed like this for
  readability purposes.
