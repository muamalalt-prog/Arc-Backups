---
name: Always Backup Before Editing
description: Ensures we never lose progress by mandating a backup before making any code edits.
---

# Backup Rule
Before making ANY edits to existing files (especially `Arcade.html`), you MUST first make a copy of the file into the `backups/` directory, appending a timestamp to the filename.

This is a critical requirement from the user to prevent data loss. 

If you are modifying multiple files, back up all of them before proceeding.
Use powershell or node to create the backup. Example:
`Copy-Item Arcade.html -Destination "backups\Arcade_$(Get-Date -Format 'yyyyMMdd_HHmmss').html"`
