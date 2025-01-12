////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//                                            CAPITALISED HEADINGS FUNCTION                                           //
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

// This function is a custom markdownlint-cli2 script that will check level one and two headings to ensure they are capitslasided in-line with NMG policy. 

// Module exports

module.exports =
{
  
  // Meta data

  names: ["capitalised-headings"],
  description: "Ensure level 2 and 3 headings are fully capitalised.",
  information: new URL("https://example.com/CONTRIBUTING.md"),
  tags: ["headings", "style"],

  /**
   * Custom markdownlint-cli2 rule to ensure level two and three headings are fully capitalized.
   * @author NinjaMonkeyGaames
   * @date 2025-01-10
   * @param {Object} params                   - Parameters provided by markdownlint.
   * @param {Object[]} params.lines           - Array of lines from the markdown file.
   * @param {function(Object): void} onError  - Callback to report errors.
   * @returns {void}
   */

  // Heading capitalisation function
  
  function: (params, onError) =>
  {
    params.lines.forEach((lineContent, lineIndex) =>
    {
      const headingMatch = lineContent.match(/^(#{2,3})\s+(.*)$/);
      if (headingMatch && headingMatch[2] !== headingMatch[2].toUpperCase())
      {
        onError
        ({
          lineNumber: lineIndex + 1,
          detail: `Heading not fully capitalised: "${headingMatch[2]}"`,
          context: lineContent.trim(),
        });
      }
    });
  },
};