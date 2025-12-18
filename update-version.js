const fs = require('fs');
const semver = require('semver');

// 1. Get the version from semantic-release (e.g. "1.0.0-alpha.1")
const fullVersion = process.argv[2];

if (!fullVersion) {
    console.error("Error: No version argument provided.");
    process.exit(1);
}

const parsed = semver.parse(fullVersion);

if (!parsed) {
    console.error(`Error: Could not parse semver from "${fullVersion}"`);
    process.exit(1);
}

// 2. Map parts to GameMaker (Major.Minor.Patch.Revision)
const major = parsed.major;
const minor = parsed.minor;
const patch = parsed.patch;

// If prerelease is ['alpha', 1], revision becomes 1. Otherwise 0.
const revision = (parsed.prerelease && parsed.prerelease.length > 1) ? parsed.prerelease[1] : 0; 

const gmVersion = `${major}.${minor}.${patch}.${revision}`;

// 3. Update the .yyp file
const yypPath = 'Grid Utility.yyp';

try {
    const rawContent = fs.readFileSync(yypPath, 'utf8');

    /**
     * FIX: Remove trailing commas
     * GameMaker .yyp files often contain trailing commas (e.g., {"a":1,})
     * which native JSON.parse() forbids. This regex finds commas followed 
     * by a closing brace or bracket and removes them.
     */
    const cleanedContent = rawContent.replace(/,[ \t\r\n]*([}\]])/g, '$1');

    const yypContent = JSON.parse(cleanedContent);

    // Update the version fields
    // Most modern GM versions use resourceVersion for the project versioning
    yypContent.resourceVersion = gmVersion; 
    
    // Some versions/templates also use projectVersion; updating both covers all bases
    if (yypContent.hasOwnProperty('projectVersion')) {
        yypContent.projectVersion = gmVersion;
    }

    fs.writeFileSync(yypPath, JSON.stringify(yypContent, null, 2));
    console.log(`✅ Updated ${yypPath} to GameMaker version: ${gmVersion}`);

} catch (error) {
    console.error(`❌ Failed to update ${yypPath}:`, error.message);
    process.exit(1);
}