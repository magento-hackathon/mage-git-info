<?php
require '../app/Mage.php';
Mage::app();


Mage::getModel("magegitinfo/git")->exec("git checkout notexist");

