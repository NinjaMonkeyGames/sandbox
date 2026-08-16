// release.config.js
module.exports = {
  branches: [
    'master',
    {
      name: 'release/**',
      prerelease: 'staging',   // publishes versions like 1.2.0-staging.1
      channel: 'staging'       // npm dist-tag: npm install pkg@staging
    }
  ],
  plugins: [
    '@semantic-release/commit-analyzer',
    '@semantic-release/release-notes-generator',
    '@semantic-release/changelog',
    '@semantic-release/npm',
    '@semantic-release/github',
    '@semantic-release/git'
  ]
};