# Mage Git Info

Magento Module to show the git branch of the current Magento (possible switch branches as well).

If the shop is under management of GIT you can see informations about the current branch, last commits and modified or untracked files in the Magento Backend Footer.

## Requirements

* Magento
* Git
* proc_open()
* Apache user needs rights to write .git-repository (only for change branch feature)

## Done
0. Show Git Branch in the Backend
0. List branches
0. Show current commit-sha-hash
0. Show unstaged or new files (Dirt checker)
0. Show commit logs
0. Show branch list as a drop-down with pre-selected current branch
0. Switch branches
0. Format Log Output
0. ACL-rules for
  * read information
  * switch branches

## Ideas

0. Show modified files in a popup (Tom)
0. Show new/untracked files in a popup (Tom)
0. Checking Branch state by AJAX every 2sek with configuration option to define the refreshing time (Anjey)
0. ACLs for different informations (show only branch, logs or modified/untracked files)
0. List branches
  * display merged/not merged branches differently
  * display branch descriptions
0. Submodule-Handling?

## Discarded features
0. Checkout/Revert modified files
0. removed new/untracked files
