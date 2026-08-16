/* eslint-disable @typescript-eslint/no-unused-vars */
/* eslint-disable prefer-const */
// src/rules/gm1001.js
module.exports = {
  meta: {
    name: 'GM1001',
    description: 'The keyword continue must be used inside the body of a loop statement.'
  },
  lint(file, rawContent, cleanContent, config) {
    const errors = [];
    const lines = cleanContent.split('\n');

    let braceDepth = 0;
    const loopStack = [];

    lines.forEach((line, index) => {
      const trimmed = line.trim();
      const lineNumber = index + 1;

      // Check for loop declarations
      if (
        (trimmed.startsWith('for') || 
         trimmed.startsWith('while') || 
         trimmed.startsWith('repeat') || 
         trimmed.startsWith('with')) && 
        !trimmed.endsWith(';')
      ) {
        loopStack.push(braceDepth);
      }

      // Track scope depth via braces
      for (const char of line) {
        if (char === '{') {
          braceDepth++;
        } else if (char === '}') {
          if (braceDepth > 0) {
            braceDepth--;
          }
          if (loopStack.length > 0 && loopStack[loopStack.length - 1] >= braceDepth) {
            loopStack.pop();
          }
        }
      }

      // Check for 'continue' statement usage on the comment-free code
      const continueRegex = /\bcontinue\b\s*;/;
      if (continueRegex.test(trimmed)) {
        if (loopStack.length === 0) {
          errors.push({
            file: file,
            line: lineNumber,
            rule: 'GM1001',
            message: 'GM1001 - No enclosing loop from which to continue.'
          });
        }
      }
    });

    return errors;
  }
};