#!/bin/bash

# Define the input file and the temporary file for the list
DOC_FILE="DEVELOPER.md"
TEMP_FILE="FILES_FROM_DOC.txt"
IGNORE_FILE=".gitignore"

# --- 1. Cleanup and Pre-Check ---
rm -f "$TEMP_FILE"

if [ ! -f "$DOC_FILE" ]; then
    echo "Error: Documentation file '$DOC_FILE' not found." >&2
    exit 1
fi

# --- 2. Extract Unique, Case-Insensitive File References ---
echo "✅ Extracting unique file references from '$DOC_FILE'..."

# Find lines with ### and [content], extract content, and remove duplicates (sort -u)
grep -E '^\#\#\#.*\[.*\]' "$DOC_FILE" |
    sed -E 's/.*\[(.*)\].*/\1/' |
    sort -u > "$TEMP_FILE"

if [ ! -s "$TEMP_FILE" ]; then
    echo "Warning: No file references found in level 3 headings (###) in '$DOC_FILE'."
    rm -f "$TEMP_FILE"
    exit 0
fi

FILE_COUNT=$(wc -l < "$TEMP_FILE")
echo "Found $FILE_COUNT unique file references."

# --- 3. Comparison Results Header ---
echo -e "\n--- Comparison Results ---"

# --- 4. Compare Extracted List with Git Repository Files (Case-Insensitive) ---

# Loop through each extracted filename/path
while IFS= read -r extracted_file; do
    
    # Trim leading/trailing whitespace which can break path checks
    extracted_file=$(echo "$extracted_file" | sed 's/^[[:space:]]*//;s/[[:space:]]*$//')

    # 4a. Check 1: Is it a physical directory? (Handles folder in folder issue)
    if [ -d "$extracted_file" ]; then
        # Use 'git ls-files -i' to check, case-insensitively, if the directory path
        # contains ANY tracked file. This is the most accurate way to check a folder's Git status.
        if git ls-files -i --error-unmatch -- "$extracted_file/" 2>/dev/null; then
            echo "🟢 DIRECTORY: '$extracted_file' exists and contains tracked files."
        else
            # Check if the directory is explicitly ignored
            if git check-ignore -q -- "$extracted_file" 2>/dev/null; then
                echo "🟡 IGNORED DIRECTORY: '$extracted_file' exists but is excluded by .gitignore."
            else
                echo "🟡 DIRECTORY: '$extracted_file' exists but contains no tracked files (empty or only untracked files)."
            fi
        fi
        
    # 4b. Check 2: Is it a tracked/unignored file? (The primary file check)
    elif git ls-files -i --error-unmatch -- "$extracted_file" 2>/dev/null; then
        echo "🟢 MATCH: '$extracted_file' exists and is tracked."
    
    # 4c. Check 3: Is it explicitly ignored by Git rules?
    elif git check-ignore -q -- "$extracted_file" 2>/dev/null; then
        echo "🟡 IGNORED FILE: '$extracted_file' is excluded by .gitignore."
        
    # 4d. Final Check: Missing or Genuinely Untracked?
    else
        # Check if the file exists physically (case-insensitive globbing is risky here, 
        # relying on the documented path being correct relative to the repo root)
        if test -e "$extracted_file"; then
             echo "🔴 UNTRACKED FILE: '$extracted_file' exists physically but is not in the Git index."
        else
             echo "🔴 MISSING: '$extracted_file' is not found on disk or in the Git index."
        fi
    fi

done < "$TEMP_FILE"

# --- 5. Cleanup ---
rm -f "$TEMP_FILE"

echo -e "\n--- Script finished ---"