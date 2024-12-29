/** @type {import("markdownlint").Rule} */
module.exports = {
  "names": ["every-line-error"], // Name of the custom rule
  "description": "Rule that reports an error for every line in the Markdown file",
  "information": new URL("https://example.com/rules/every-line-error"),
  "tags": ["test"],
  "parser": "micromark", // Parser is still set to micromark (though not necessary for this rule)
  "function": (params, onError) => {
    // Loop through each line in the Markdown file
    params.lines.forEach((line, index) => {
      onError({
        "lineNumber": index + 1, // 1-based index for the line number
        "detail": `Every line is an issue: Line ${index + 1}.`, // Custom message for every line
        "context": line // Context of the line itself (what's on the line)
      });
    });
  }
};
