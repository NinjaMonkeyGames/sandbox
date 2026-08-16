// src/utils/comments.js

/**
 * Strips comments from GML code content while preserving line numbers.
 * Replaces characters inside comments with spaces or empty lines to keep line counts intact.
 */
function stripComments(content) {
  let inBlockComment = false;
  const lines = content.split('\n');
  
  const cleanedLines = lines.map(line => {
    let processedLine = '';
    let i = 0;
    
    while (i < line.length) {
      // Handle block comment opening
      if (!inBlockComment && line[i] === '/' && line[i + 1] === '*') {
        inBlockComment = true;
        processedLine += '  '; // preserve character length
        i += 2;
        continue;
      }
      
      // Handle block comment closing
      if (inBlockComment && line[i] === '*' && line[i + 1] === '/') {
        inBlockComment = false;
        processedLine += '  ';
        i += 2;
        continue;
      }
      
      if (inBlockComment) {
        processedLine += ' '; // replace block comment text with space
        i++;
        continue;
      }
      
      // Handle single-line comment
      if (!inBlockComment && line[i] === '/' && line[i + 1] === '/') {
        // Everything else on this line is a comment, stop processing this line
        break;
      }
      
      processedLine += line[i];
      i++;
    }
    
    return processedLine;
  });

  return cleanedLines.join('\n');
}

module.exports = { stripComments };