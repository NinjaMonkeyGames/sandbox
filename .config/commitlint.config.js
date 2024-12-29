////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//                                              COMMIT LINT CONFIGURATION                                             //
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

// Export modules 

module.exports =
{
    // Extend configuration to conventional commits
  
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

      // Require a scope for commits

      'scope-empty': [2, 'never'],
  
      // Enforce a list of allowed types (basic types commonly used in conventional commits)
      
      'type-enum':
      [
        2,
        'always',
        [
          'feat',           // New feature
          'fix',            // Bug fix
          'docs',           // Documentation changes
          'style',          // Code style changes (formatting, etc., no code change)
          'refactor',       // Refactor without adding new features or fixing bugs
          'perf',           // Performance improvements
          'test',           // Adding or updating tests
          'build',          // Changes to build system or dependencies
          'security',       // Security fixes
          'ci',             // Continuous integration-related changes
          'chore',          // Other changes that don't modify source or test files
          'revert',         // Reverts a previous commit
          'depreciation',   // A feature or portion of code has become redundant.
          'accessibility',  // Updates for better accessibility compliance (e.g., WCAG)
          'analytics',      // Changes to analytics or tracking

        ]
      ],
  
      // Enforce a list of allowed scopes (basic types commonly used in conventional commits)
      
      'scope-enum':
      [
        2,
        'always',
          [
          'api',    // API-related changes
          'ui',     // UI-related changes
          'auth',   // Authentication changes
          'db',     // Database changes
          'deps',   // Dependency updates
          'tests',  // Test-related changes
          'config', // Configuration updates
        ]
      ],
    },
  };
  