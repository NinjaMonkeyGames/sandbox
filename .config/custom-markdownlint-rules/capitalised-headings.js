////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//                                    CAPITALISED HEADINGS CUSTOM MARKDOWNLINT RULE                                   //
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

/**
 * Custom MarkdownLint rule to ensure level 2 and 3 headings are fully capitalized.
 * This rule checks all level 2 (##) and level 3 (###) headings in a Markdown file
 * and reports an error if any of the headings are not fully capitalized.
 * 
 * @type {import("markdownlint").Rule}
 * @name capitalized-headings
 * @description A MarkdownLint rule to enforce capitalization of level 2 and 3 headings.
 * @see {@link https://example.com/CONTRIBUTING.md} for more information on contributing.
 * @tags ["headings", "style"]
 */

module.exports =
{
  /**
   * Rule metadata including rule name, description, help URL, and tags.
   * 
   * @property {string[]} names - The aliases for this rule.
   * @property {string} description - A brief explanation of what the rule checks.
   * @property {URL} information - A URL pointing to documentation or help resources for this rule.
   * @property {string[]} tags - Tags categorizing this rule.
   */
  names: ["capitalized-headings"],
  description: "Ensure level 2 and 3 headings are fully capitalized.",
  information: new URL("https://example.com/CONTRIBUTING.md"),
  tags: ["headings", "style"],

  /**
   * The function that implements the rule.
   * 
   * @function
   * @param {Object} params - The parameters passed by MarkdownLint.
   * @param {string[]} params.lines - The lines of the Markdown file being linted.
   * @param {function(Object):void} onError - Callback to report errors.
   * 
   * @example
   * // Example error reported by the rule:
   * // Heading not fully capitalized: "some heading"
   * // Context: ## some heading
   */

  function: (params, onError) =>
  {
    params.lines.forEach((line, index) =>
    {
      // Match level 2 (##) and level 3 (###) headings.

      const match = line.match(/^(#{2,3})\s+(.*)$/);
      if (match)
      {
        const headingText = match[2];

        // Check if the heading text is fully capitalized.

        if (headingText !== headingText.toUpperCase())
        {
          // Report the error if the heading text is not fully capitalized.

          onError
          ({
            lineNumber: index + 1, // 1-based line number.
            detail: `Heading not fully capitalized: "${headingText}"`,
            context: line.trim(), // Trim unnecessary whitespace for clarity.
          });
        }
      }
    });
  },
};
