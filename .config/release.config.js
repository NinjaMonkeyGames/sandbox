module.exports = {
  branches: [
    'master',
    {
      name: 'release/**',
      prerelease: 'rc'
    }
  ],
  plugins: [
    '@semantic-release/commit-analyzer',
    '@semantic-release/release-notes-generator',
    [
      '@semantic-release/npm',
      {
        npmPublish: false // Bumps package.json version without running standard npm publish
      }
    ],
    [
      '@semantic-release/exec',
      {
        publishCmd: 'npm stage publish --tag ${nextRelease.channel || "latest"}'
      }
    ]
  ]
};