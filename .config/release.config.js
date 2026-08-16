module.exports = {
  branches: [
    'master',
    'release/**',
    {
      name: 'release/v1.0.0',
      prerelease: 'rc' // Generates tags like v1.0.0-rc.1, v1.0.0-rc.2
    },
    {
      name: 'beta',
      prerelease: true
    }
  ],
  plugins: [
    '@semantic-release/commit-analyzer',
    '@semantic-release/release-notes-generator',
    '@semantic-release/changelog',
    '@semantic-release/npm',
    '@semantic-release/git',
    '@semantic-release/github'
  ]
};