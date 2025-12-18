export default {
  branches: [
    "master",
    { "name": "develop", "prerelease": "beta" },
    { "name": "release", "prerelease": "rc" }
  ],
  plugins: [
    "@semantic-release/commit-analyzer",
    "@semantic-release/release-notes-generator",
    [
      "@semantic-release/changelog",
      { "changelogFile": "CHANGELOG.md" }
    ],
    [
      "@semantic-release/npm",
      { "npmPublish": false }
    ],
    [
      "@semantic-release/github",
      {
        "successCommentCondition": "false",
        "failCommentCondition": "false"
      }
    ],
    [
      "@semantic-release/git",
      {
        "assets": ["package.json", "CHANGELOG.md"],
        "message": "chore(release): ${nextRelease.version} [skip ci]\n\n${nextRelease.notes}"
      }
    ]
  ]
};