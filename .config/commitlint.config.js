////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//                                              COMMIT LINT CONFIGURATION                                             //
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

module.exports =
{
    // Extend the conventional commit config
  
    extends: ['@commitlint/config-conventional'],
  
    // Define custom types and enforce specific rules
    
    rules:
    {
      // Limit header length to 72 characters
      
      'header-max-length': [2, 'always', 72],
  
      // Disallow empty types in commit messages
      
      'type-empty': [2, 'never'],
  
      // Disallow empty subjects in commit messages
      
      'subject-empty': [2, 'never'],
  
      // Enforce a list of allowed types (basic types commonly used in conventional commits)
      
      'type-enum':
      [
        2,
        'always',
        [
          'feat',     // New feature
          'fix',      // Bug fix
          'docs',     // Documentation changes
          'style',    // Code style changes (formatting, etc., no code change)
          'refactor', // Refactor without adding new features or fixing bugs
          'perf',     // Performance improvements
          'test',     // Adding or updating tests
          'build',    // Changes to build system or dependencies
          'security', // Security fixes
          'ci',       // Continuous integration-related changes
          'chore',    // Other changes that don't modify source or test files
          'revert',   // Reverts a previous commit
        ]
      ],
  
      // Enforce scope format (optional, but recommended for organized commit history)
      
      'scope-enum':
      [
        2,
        'always',
          [
          'api',    // For API-related changes
          'ui',     // For UI-related changes
          'auth',   // For authentication changes
          'db',     // For database changes
          'deps',   // For dependency updates
          'tests',  // For test-related changes
          'config', // For configuration updates
        ]
      ],
  
      // Optional: Require a scope for commits
      
      'scope-empty': [2, 'never'],
    },
  };
  