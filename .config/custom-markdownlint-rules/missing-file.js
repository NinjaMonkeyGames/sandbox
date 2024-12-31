/** @type {import("markdownlint").Rule} */
const fs = require("fs");
const path = require("path");

module.exports = {
  names: ["check-file-names-in-developer-md"],
  description: "Ensure every file and folder name is mentioned in DEVELOPER.md.",
  information: new URL("https://example.com/CONTRIBUTING.md"), // Replace with a valid URL if needed
  tags: ["files", "folders", "documentation"],
  function: (params, onError) => {
    const rootDir = process.cwd(); // Get the current working directory
    console.log("Current working directory:", rootDir); // Add this line for debugging
    const developerFilePath = path.join(rootDir, "DEVELOPER.md");

    if (fs.existsSync(developerFilePath)) {
      const developerFileContent = fs.readFileSync(developerFilePath, "utf8");

      // Recursively check files and folders
      const checkFiles = (dir) => {
        const files = fs.readdirSync(dir);

        files.forEach((file) => {
          const fullPath = path.join(dir, file);
          const stats = fs.statSync(fullPath);

          // Ignore .git and node_modules directories
          if (file === ".git" || file === "node_modules") {
            return;
          }

          // If it's a directory, check its name in DEVELOPER.md
          if (stats.isDirectory()) {
            if (!developerFileContent.includes(file)) {
              onError({
                lineNumber: 1, // Placeholder, update to reflect actual line if necessary
                detail: `Folder name "${file}" is not mentioned in DEVELOPER.md.`,
                context: file,
              });
            }
            checkFiles(fullPath); // Recurse into subdirectories
          } else {
            // If it's a file, check its name in DEVELOPER.md
            if (!developerFileContent.includes(file)) {
              onError({
                lineNumber: 1, // Placeholder, update to reflect actual line if necessary
                detail: `File name "${file}" is not mentioned in DEVELOPER.md.`,
                context: file,
              });
            }
          }
        });
      };

      // Start checking from the root directory
      checkFiles(rootDir);
    } else {
      // If DEVELOPER.md doesn't exist, report an error
      onError({
        lineNumber: 1,
        detail: `DEVELOPER.md file not found in the root directory (looked in: ${developerFilePath}).`,
        context: "DEVELOPER.md",
      });
    }
  },
};
