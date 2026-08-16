// src/lint.js

function runLinter(filePath, inputData, config) {
  const errors = [];

  // Rule 1: no-foo (checks if the word "foo" appears in the text)
  if (config['no-foo'] === true) {
    const lines = inputData.split('\n');
    lines.forEach((line, index) => {
      if (line.includes('foo')) {
        errors.push({
          file: filePath,
          line: index + 1,
          rule: 'no-foo',
          message: 'The word "foo" is not allowed.'
        });
      }
    });
  }

  return errors;
}

module.exports = { runLinter };