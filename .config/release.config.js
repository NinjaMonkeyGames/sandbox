// Lives in .config/, matching every other tool's config in this repo -
// NOT the project root. semantic-release's own config resolution
// (cosmiconfig) only searches the root by default, but the CLI accepts
// -e/--extends <path>, which can point at an arbitrary local file (not
// just an npm package) to pull config from - confirmed working locally
// (--dry-run with --extends ./.config/release.config.js loads every
// plugin below correctly). See release.yaml for the actual flag.
//
// branches: 'release/*' (a glob, not the literal 'release') - this
// repo's actual release branches are versioned (release/1.0.0,
// release/cut, etc.), never a single permanent branch literally named
// "release". semantic-release's branch matching supports glob patterns
// in `name` via micromatch, same as any other maintenance/prerelease
// branch entry.
//
// @semantic-release/git commits package.json + CHANGELOG.md directly
// back to whichever branch released (master/develop/release/*) with
// "[skip ci]" - GitHub Actions natively skips triggering any workflow
// run for a push whose message contains that, so this doesn't loop.
// Pushing to master or develop needs nmg-bot's bypass on "require pull
// request" (see release.yaml) - release/* branches aren't PR-protected
// in this repo to begin with (CONTRIBUTING.md: fixes while stabilizing
// go on as direct commits to the branch itself).

export default {
    branches: [
        'master',
        { name: 'develop', prerelease: 'beta' },
        { name: 'release/*', prerelease: 'rc' },
    ],
    plugins: [
        // 1. Analyze commits (Needs @semantic-release/commit-analyzer)
        '@semantic-release/commit-analyzer',
        // 2. Generate Release Notes (Needs @semantic-release/release-notes-generator)
        [
            '@semantic-release/release-notes-generator',
            {
                preset: 'conventionalcommits',
                parserOpts: {
                    noteKeywords: ['BREAKING CHANGE', 'BREAKING CHANGES', 'IMPORTANT'],
                },
                writerOpts: {
                    // Builds committerDate into the copy below rather than
                    // assigning onto `commit` directly - confirmed live:
                    // conventional-changelog-writer@8.4.0 passes a frozen
                    // commit object, and `commit.committerDate = ...`
                    // throws "Cannot modify immutable object."
                    transform: (commit) => {
                        const committerDate = commit.committerDate && !(commit.committerDate instanceof Date)
                            ? new Date(commit.committerDate)
                            : commit.committerDate;
                        const newCommit = {
                            ...commit,
                            committerDate,
                            subject: commit.subject,
                            body: commit.body,
                            footer: commit.footer,
                        };
                        if (commit.body) {
                            newCommit.notes = (newCommit.notes || []).concat({
                                title: 'Details',
                                text: commit.body,
                            });
                        }
                        return newCommit;
                    },
                },
            },
        ],
        // 3. Update Changelog (Needs @semantic-release/changelog)
        '@semantic-release/changelog',
        // 4. Update package.json version (Needs @semantic-release/npm)
        [
            '@semantic-release/npm',
            {
                npmPublish: false,
                updatePackageJson: true,
            },
        ],
        // 5. Commit changes back to Git (Needs @semantic-release/git)
        [
            '@semantic-release/git',
            {
                assets: ['package.json', 'CHANGELOG.md'],
                message: 'chore(release): ${nextRelease.version} [skip ci]',
            },
        ],
        // 6. Create GitHub Release (Needs @semantic-release/github)
        '@semantic-release/github',
    ],
};