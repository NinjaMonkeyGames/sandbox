#!/bin/bash

# --- Script Configuration ---
# Set the desired exit code for failure
FAILURE_EXIT_CODE=1
# Set the error message
ERROR_MESSAGE="Commit Message Title can't be the same as the previous one."

# --- Get Commit Titles ---

# Get the subject (title) of the current commit (HEAD)
CURRENT_TITLE=$(git log -1 --pretty=%s HEAD)

# Get the subject (title) of the previous commit (HEAD^)
# Note: This command will fail if HEAD^ does not exist (e.g., in a fresh repo with only one commit).
# We use '|| exit 0' to handle the single-commit case gracefully, as there's no previous title to compare.
PREVIOUS_TITLE=$(git log -1 --pretty=%s HEAD^ 2>/dev/null || echo "SINGLE_COMMIT_HISTORY")

# --- Comparison Logic ---

echo "Current Commit Title:  '${CURRENT_TITLE}'"
echo "Previous Commit Title: '${PREVIOUS_TITLE}'"
echo "---"

# Check if the titles are identical
if [ "${CURRENT_TITLE}" == "${PREVIOUS_TITLE}" ]; then
    
    # Check if this is the initial single commit case, which should pass
    if [ "${CURRENT_TITLE}" == "SINGLE_COMMIT_HISTORY" ]; then
        echo "PASS: Only one commit found in history. Skipping duplicate check."
        exit 0
    fi
    
    # Titles are duplicates (and it's not the single-commit case)
    echo "🚨 FAILURE: Duplicate Commit Title Detected!"
    echo "ERROR: ${ERROR_MESSAGE}"
    exit ${FAILURE_EXIT_CODE}
else
    # Titles are different
    echo "✅ PASS: Commit titles are unique."
    exit 0
fi