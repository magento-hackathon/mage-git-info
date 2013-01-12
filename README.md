# Mage Git Info

Magento Module to show the git branch of the current Magento (possible switch branches as well).


## Ideas


0. Show Git Branch in the Backend
0. List branches
0. Show current commit-sha-hash
0. Show unstaged or new files (Dirt checker)
0. If you click on the commit-sha you get a git log
0. Switch branches
0. Checkout/Revert modified files
0. removed new/untracked files
0. Checking Branch state by AJAX every 2sek
0. ACL-rules for
  * read information
  * switch branches
  * change or remove files (modified or untracked)
0. Submodule-Handling?

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


## Requirements

* Magento
* Git
* exec()
