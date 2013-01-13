# Mage Git Info

This Magento Module shows current git status of the shops repository in 
the Footer section of the admin. It shows all available branches and current
status incl. all untrackt and modified files.

If the webserver has appropriate configuration also switching branches is
possible.

## Requirements

* Magento
* Git
* proc_open()
* Apache user needs rights to write .git-repository (only for change branch feature)

## Installation

Install it with modman

    modman clone https://github.com/magento-hackathon/mage-git-info.git

Install with composer

Add the module to your dependencies in your composer.json

    "require": {
      "hackathon/magegitinfo": "dev-master"
    },

After that, run
  
    $ composer.phar install

See https://github.com/magento-hackathon/composer-repository for more information.

## Configuration

In *System->Configuration->Git info* you can enable the module. There are also
several ACL configurations to manage access to all functions.

## Ideas

0. Show modified files in a popup (Tom)
0. Show new/untracked files in a popup (Tom)
0. Testing with ecomdev
0. ACLs for different informations (show only branch, logs or modified/untracked files)
0. List branches
  * display merged/not merged branches differently
  * display branch descriptions
0. Submodule-Handling?

## Discarded features
0. Checkout/Revert modified files
0. removed new/untracked files
