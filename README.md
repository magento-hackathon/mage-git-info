# Mage Git Info

## Requirements

* Magento
* Git
* proc_open()
* Apache user needs rights to write .git-repository (only for change branch feature)

Magento Module to show the git branch of the current Magento (possible switch branches as well).

## Done
0. Show Git Branch in the Backend
0. List branches
0. Show current commit-sha-hash
0. Show unstaged or new files (Dirt checker)
0. Show commit logs
0. Show branch list as a drop-down with pre-selected current branch
0. Switch branches

## Ideas

0. Format Log Output (Tom)
0. Show modified files in a popup (Tom)
0. Show new/untracked files in a popup (Tom)
0. Checking Branch state by AJAX every 2sek with configuration option to define the refreshing time (Anjey)
0. List branches
  * display merged/not merged branches differently
  * display branch descriptions
0. ACL-rules for
  * read information
  * switch branches
0. Submodule-Handling?

## Discarded features
0. Checkout/Revert modified files
0. removed new/untracked files

## Roadmap

* Define priority of the features => Prio 1 (hackathon), Prio 2 (maybe hackathon), Prio 3 (later ) -> done
* Start and commit skeleton module
* Start Abstract class for shell access
* Assign todos to us

## Interface

* Footer of the admin-backend (Next to Magento Version)
* Next to admin username
* Exclamation: Shows unstages files
* DropDown for List-Branches
