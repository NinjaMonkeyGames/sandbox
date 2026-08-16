/* eslint-disable @typescript-eslint/no-require-imports */
// src/engine.js
const fs = require('fs');
const path = require('path');
const { stripComments } = require('./utils/comments');

function runAllRules(filePath, content, config) {
  let allErrors = [];
  const rulesDir = path.join(__dirname, 'rules');

  // Generate a comment-stripped version of the code for rules to use
  const cleanContent = stripComments(content);

  if (fs.existsSync(rulesDir)) {
    const ruleFiles = fs.readdirSync(rulesDir);

    ruleFiles.forEach(file => {
      if (file.endsWith('.js')) {
        const ruleModule = require(path.join(rulesDir, file));
        const ruleName = ruleModule.meta.name;

        if (config[ruleName] === true) {
          // Pass both raw content (if rules need exact tokens) and cleanContent
          const ruleErrors = ruleModule.lint(filePath, content, cleanContent, config);
          allErrors = allErrors.concat(ruleErrors);
        }
      }
    });
  }

  return allErrors;
}

module.exports = { runAllRules };