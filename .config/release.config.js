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
        provenance: true,
        npmToken: false // CRITICAL: Forces semantic-release to bypass the NPM_TOKEN check and rely on OIDC
      }
    ],
    [
      '@semantic-release/github',
      {
        failComment: false,
        failTitle: false,
        labels: false
      }
    ]
  ]
};