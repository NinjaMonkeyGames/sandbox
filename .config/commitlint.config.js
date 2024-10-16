module.exports = {
    // Extend the conventional commit config
    extends: ['@commitlint/config-conventional'],
    
    // You can add additional rules here if needed
    rules: {
      // Examples of custom rules (uncomment and modify as needed)
      // 'header-max-length': [2, 'always', 72], // Limit header length to 72 characters
      // 'type-empty': [2, 'never'], // Disallow empty types
      // 'subject-empty': [2, 'never'], // Disallow empty subjects
    },
  };
  