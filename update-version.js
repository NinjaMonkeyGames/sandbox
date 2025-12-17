const fs = require('fs');
const semver = require('semver');

// 1. Get the version from semantic-release (e.g. "1.2.3-beta.5")
const fullVersion = process.argv[2];
const parsed = semver.parse(fullVersion);

// 2. Map parts to GameMaker (Major.Minor.Patch.Revision)
const major = parsed.major;
const minor = parsed.minor;
const patch = parsed.patch;
// If there's a prerelease like ['beta', 5], use 5. Otherwise use 0.
const revision = parsed.prerelease[1] || 0; 

const gmVersion = `${major}.${minor}.${patch}.${revision}`;

// 3. Update the .yyp file
const yypPath = 'YourProjectName.yyp';
const yypContent = JSON.parse(fs.readFileSync(yypPath, 'utf8'));

yypContent.resourceVersion = gmVersion; // In GM Monthly
// Note: In some LTS versions, the key is "projectVersion"
// yypContent.projectVersion = gmVersion; 

fs.writeFileSync(yypPath, JSON.stringify(yypContent, null, 2));
console.log(`Updated GameMaker project to version: ${gmVersion}`);