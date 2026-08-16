/**
 * @type {import('semantic-release').GlobalConfig}
 */
module.exports = {
  branches: [
    'master',
    'main',
    {
      name: 'release/**',
      prerelease: 'staging',
      channel: 'staging'
    },
    {
      name: 'develop',
      prerelease: 'dev',
      channel: 'dev'
    }
  ],
  plugins: [
    '@semantic-release/commit-analyzer',
    '@semantic-release/release-notes-generator',
    [
      '@semantic-release/npm',
      {
        pkgRoot: '.',
        npmPublish: true
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