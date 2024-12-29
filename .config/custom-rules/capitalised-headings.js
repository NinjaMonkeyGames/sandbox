/** @type {import("markdownlint").Rule} */
module.exports = {
  names: ["capitalized-headings"],
  description: "Ensure level 2 and 3 headings are fully capitalized.",
  information: new URL("https://example.com/CONTRIBUTING.md"), // Ensure the URL is valid
  tags: ["headings", "style"],
  function: (params, onError) => {
    // Iterate over each line in the Markdown content
    params.lines.forEach((line, index) => {
      // Match level 2 and level 3 headings
      const match = line.match(/^(#{2,3})\s+(.*)$/);
      if (match) {
        const headingText = match[2];

        // Check if the heading text is fully capitalized
        if (headingText !== headingText.toUpperCase()) {
          // Report the error if not fully capitalized
          onError({
            lineNumber: index + 1, // 1-based line number
            detail: `Heading not fully capitalized: "${headingText}"`,
            context: line.trim(), // Trim unnecessary whitespace
          });
        }
      }
    });
  },
};
