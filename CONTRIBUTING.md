# CONTRIBUTING

This document contains information about house-styles, project structure and instructions on how to successfully merge
your pull requests. There are strict rules about how documentation should be updated. There are also robust linting
rules to ensure a clean and consistent code base.

## DEVELOPMENT ENVIRONMENT PREREQUISITES

| Software package   | Vendor              | Version |
|--------------------|---------------------|---------|
| Windows            | Microsoft | 11      |         |
| Visual Studio Code | Microsoft | 1.96.4  |         |
| NodeJS             | Node.js Foundation  |         |

## CODING STANDARDS

The following code standards should be adhered to at all times. Linting processes are in place to catch code that is 
out of specification.

⛔ If you do not comply with NGG™ policy you will be challenged and likely rejected at PULL time!.

See. [pull requests.](#pull-requests)

## PULL REQUESTS

## DEVELOPER MANUAL

This section of the document explains how the developers manual is structured and how it should be updated.

ℹ️ *Updating the manual correctly is extremely important.  It does take extra time but will ultimately make the project
more manageable in the long term. Thank you for respecting our house standards*

### DEVELOPER MANUAL LAYOUT AND STRUCTURE

The project developer manual is broken down into sections. The main bulk of the document comes under the heading
'project assets'. Under this heading is where we store the information about each file in the project.

1. Asset heading.                           (Applies to all asset listings)
2. Attribute table.                         (Applies to all asset listings)
3. Asset purpose.                           (Applies to all asset listings)
4. Asset contents description.              (Applies to all asset listings)
5. Keyword glossary.                        (Applies to some code assets)

6. Asset code breakdown.                    (Applies to code assets)
    a. Section heading code.                (Applies to code assets)
    b. Section heading code description.    (Applies to code assets)

#### Asset heading

The asset heading is a level 3 markdown heading that contains a title describing the file purpose followed by the actual file name in square brackets.

Example: '### EXAMPLE FILE[EXAMPLE-FILE.JS] 📄'.

As you can see the asset heading is broken into 4 sections.
    
    1. '###' Indicates a level 3 markdown heading.
    2. 'EXAMPLE FILE' similar to file name but all CAPS can use spaces.
    3. '[EXAMPLE-FILE.JS]' is the actual file name including extension but in all CAPS regardless of the case the file name is written.
    4. 📄 Indicates the asset is a file and not a folder as indicated with 📁.

#### Attribute table

The attribute table is a list of properties relating to the asset (file or folder). See example below.

| Attribute             | Value                             |
|-----------------------|-----------------------------------|
| Asset Name            | example-file-name-as-written.js   |
| Relative Path         | ./example-test-folder             |
| Hidden                | No                                |
| Include in Repository | Yes                               |
| Managed               | Yes                               |
| Asset Type            | JavaScript                        |
| Asset Size            | 4,129 Bytes                       |

ℹ️ *Every single asset should contain this table.*

##### Asset name

This is the exact file or folder name including any case sensitive characters including the extension.

##### Relative path

This is the relative path of the asset. This can be easily obtained in VSC by context clicking on the file and then selecting 'Copy Relative Path'.

##### Hidden

If an asset name is prefixed with a dot '.' then that file or folder is considered to be hidden.

##### Include in repository

This indicates if an asset is managed by Git.

ℹ️ *Most assets are managed by Git. However there are exceptions to this rule. 'node_modules' for example is not included in the repository.*

##### Managed

Managed indicates if an asset is commented and explained in the manual.

ℹ️ *For example configuration files in the Git folder are required by git but are not a part of the project and thus are not documented beyond the fact they exist.*

##### Asset type

The asset type will either be entered as 'FOLDER' or the file extension description. For example a JS file would be written as JavaScript and a MD file would be written as Markdown.

##### Asset size

This is the size on disk of the asset. The purpose of this is to keep the developer focused on the quality documentation and can be used as a metric to test if full concentration has been put into proper development manual entries. 

⚠️ *If you forgot to update the file size when modified what else has been missed!*

#### Asset purpose

The asset purpose field describes why that asset exists. What purpose does it serve.

#### Asset description

The asset description describes what the file contains and what the file does. 

ℹ️ *To summerise asset purpose is why and asset description is what.*

#### Keyword glossary

With some sections of code it makes sense to have a key terms table. For example in the YAML forms assets you will see the same keywords being used multiple times. Each form element has a name, ID, Title etc.

The glossary table provides an explanation of these terms.

#### Asset code breakdown

Directly below the 'Asset Code Breakdown' field you should use an ordered, numbered list. Each asset contain code is broken up into sections. These sections contain logical units of code such as a single method or function. These sections of code are always commented with heading text describing what that code block does.

Each numbered line of text should be the same text as found in the code block heading.

```markdown
Example:

#### Asset Code Breakdown : [hello-world-example.js]

1. Prompt user with 'Hello World!' message.
2. Prompt user with 'Goodbye cruel world.' message.
```

##### Prompt user with 'Hello World!' message : [hello-world-example.js] - [CODE]

```javascript
1. function sayHelloWorld() 
2. {
3.     console.log("Hello World!");
4. }
```

##### Prompt user with 'Hello World!' message : [hello-world-example.js] - [CODE DESCRIPTION]

```markdown
1. Declare 'sayHelloWorld' function.
    a. 'function' declares a function is being created.
    b. 'sayHelloWorld' is the name of the function.
    c. '()' contains function arguments.
        i. '(' opens function for arguments.
        ii. ')' closes function for arguments.
    
2. Open function for writing.

3. Write 'Hello World!' to the console.
    a. 'console.log' outputs a string to the console.
    b. ("Hello World!"); passes a 'Hello World!' string to the console.
        i. 'console' is a built-in method for accesing the console.
        ii. '.' is an accessor for 'console'.
        iii. 'log' is a built-in method to access log.
        iv. '(' opens the function for arguments.
        v. '"' declares that the following argument will be a string.
        vi. 'Hello World!' Is the string of text to output to the console.
        vii. '"' closes the 'Hello World!' string.
        viii. ')' closes function for arguments.
        ix. ';' terminates line.

4. Close function for writing.
```