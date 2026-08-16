/**
 * @type {import('semantic-release').GlobalConfig}
 */
module.exports = {
  branches: [
    'master',
    'main'
  ],
  plugins: [
    '@semantic-release/commit-analyzer',
    '@semantic-release/release-notes-generator',
    [
      '@semantic-release/npm',
      {
        pkgRoot: '.',
        npmPublish: true,
        provenance: true // Tells semantic-release to attach OIDC provenance tokens
      }
    ],
    [
      '@semantic-release/github',
      {
        failComment: false,
        failTitle: false,
        labels: false // Prevents label missing errors
      }
    ]
  ]
};