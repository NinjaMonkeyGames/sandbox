# CONTRIBUTING

This document covers information needed to effectively contribute to this project.

---

## TABLE OF CONTENTS

- [CONTRIBUTING](#contributing)
  - [TABLE OF CONTENTS](#table-of-contents)
  - [QUALITY CONTROL](#quality-control)
    - [GITFLOW](#gitflow)
    - [FILE NAMING](#file-naming)
    - [LINTERS](#linters)
    - [MERGE CHECKLIST](#merge-checklist)
  - [USEFUL COMMANDS](#useful-commands)
    - [STAGE ALL CHANGES](#stage-all-changes)
    - [COMMIT CHANGES](#commit-changes)
    - [PUSH REFS](#push-refs)
    - [BUILD DOCKER LOCALLY](#build-docker-locally)
    - [CONFIRM DOCKER ENTRY POINT IS WORKING](#confirm-docker-entry-point-is-working)
    - [BUILD AND PUSH TO REMOTE WITH ATTESTATIONS](#build-and-push-to-remote-with-attestations)
    - [SCAN DOCKER FOR SECURITY ISSUES](#scan-docker-for-security-issues)
    - [REMOVE ALL LOCALLY BUILD IMAGES](#remove-all-locally-build-images)
  - [CONTACT INFORMATION](#contact-information)
  - [COPYRIGHT](#copyright)

---

## QUALITY CONTROL

Quality control is of utmost importance to maintain project integrity and robustness. The philosophy is that each and
every file needs to be checked for integrity. If by doing so other file types are created they need to be managed too.

This is achieved by local and CI level checks via linter packages and other QL related extensions. It is also important
that the developer takes care when creating a PR as we can't automate checks for everything so diligence is still key.

### GITFLOW

This project aligns closely with the GitFlow branching strategy.

### FILE NAMING

All files in this project should be:

- lower case
- kebab-case

With the following exceptions:

- README.md
- DEVELOPER.md
- CONTRIBUTING.md
- LICENSE
- .git/**
- node_modules (Not actually part of the remote repo)

### LINTERS

| Linter                  | Purpose                                                             |
|-------------------------|---------------------------------------------------------------------|
| cSpell                  | Checks documents for spelling mistakes                              |
| Commitlint              | Ensures commit messages conform to the conventional commit standard |
| Markdownlint-cli2       | Ensures all markdown documents conform to internal standards        |
| ESLint                  | Lints JSON, JSDOC, JS, TYpeScript                                   |
| Hadolint                | Lint Dockerfiles                                                    |

### MERGE CHECKLIST

1. Visual Studio Code Problems field should be empty.
2. Cross reference any modified files with `DEVELOPER.md` to ensure the asset description and details are correct and
   up to date.
3. All files conform the file naming convention for this project.
4. Commit message conforms to Conventional Commit standards.
5. Commit message is in the bare infinitive.

## USEFUL COMMANDS

### STAGE ALL CHANGES

```bash
git add .
```

### COMMIT CHANGES

```bash
git commit --file .git/COMMIT_EDITMSG
```

### PUSH REFS

```bash
git push .
```

### BUILD DOCKER LOCALLY

```bash
docker build -t markdownlint-cli2-ci .
```

### CONFIRM DOCKER ENTRY POINT IS WORKING

```bash
docker run --rm markdownlint-cli2-ci --version
```

### BUILD AND PUSH TO REMOTE WITH ATTESTATIONS

```bash
docker buildx build --platform linux/amd64,linux/arm64 
  -t monkeyknuckles/markdownlint-cli2-ci:debug
  --attest type=provenance,mode=max 
  --attest type=sbom 
  --push .
```

### SCAN DOCKER FOR SECURITY ISSUES

```bash
docker scout cves --only-fixed monkeyknuckles/markdownlint-cli2-ci:debug
```

### REMOVE ALL LOCALLY BUILD IMAGES

```bash
docker system prune -a --volumes
```

## CONTACT INFORMATION

Author: Daniel Mallett (Monkey Knuckles)

If you have any problems with the repository or have any suggestions please contact us at <info@ninjamonkeygames.com>.

You may also contact us via our [website](https://ninjamonkeygames.com).

Any bugs should be raised as an [issue](https://github.com/NinjaMonkeyGames/markdownlint-cli2/issues) on GitHub.

---

## COPYRIGHT

*NinjaMonkeyGames™ Copyright © 2026 All rights reserved.*
