module.exports = {
  branches: [
    'master',
    {
      name: 'release/**',
      prerelease: 'rc' // Generates version tags like 1.0.0-rc.1 on NPM
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