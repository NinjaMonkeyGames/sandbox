export default {
  branches: [
    'master',
    { name: 'release/*', prerelease: 'rc', channel: 'staging' },
    { name: 'feature/*', prerelease: 'dev' }
  ],
  plugins: [
    '@semantic-release/commit-analyzer',
    '@semantic-release/release-notes-generator',
    '@semantic-release/changelog',
    [
      '@semantic-release/npm',
      {
        npmPublish: true
      }
    ],
    '@semantic-release/git',
    '@semantic-release/github'
  ]
};