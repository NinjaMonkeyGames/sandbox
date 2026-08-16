module.exports = {
  branches: [
    'master',
    {
      name: 'release/v1.0.0',
      prerelease: 'rc' // Generates v1.0.0-rc.1, rc.2, etc. to avoid tag collision
    }
  ],
  plugins: [
    '@semantic-release/commit-analyzer',
    '@semantic-release/release-notes-generator',
    [
      '@semantic-release/npm',
      {
        npmPublish: true,
        pkgRoot: '.'
      }
    ]
  ]
};