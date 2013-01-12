<?php
/**
 * This file is part of the MAGEGITINFO project.
 *
 * Hackathon MageGitInfo is free software; you can redistribute it and/or
 * modify it under the terms of the GNU General Public License version 3 as
 * published by the Free Software Foundation.
 *
 * This script is distributed in the hope that it will be useful, but WITHOUT
 * ANY WARRANTY; without even the implied warranty of MERCHANTABILITY or FITNESS
 * FOR A PARTICULAR PURPOSE. See the GNU General Public License for more details.
 *
 * PHP version 5
 *
 * @category  MageGitInfo
 * @package   Hackathon_MageGitInfo
 * @author    Tom Kadwill <tomkadwill@gmail.com>
 * @author    Stephan Hoyer <ste.hoyer@gmail.com>
 * @author    André Herrn <info@andre-herrn.de>
 * @author    Anjey Lobas <anjey.lobas@goodahead.com>
 * @license   http://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
 * @version   $Id:$
 * @since     0.1.0
 */
/**
 * Index Controller
 *
 * @category  MageGitInfo
 * @package   Hackathon_MageGitInfo
 * @author    Tom Kadwill <tomkadwill@gmail.com>
 * @author    Stephan Hoyer <ste.hoyer@gmail.com>
 * @author    André Herrn <info@andre-herrn.de>
 * @author    Anjey Lobas <anjey.lobas@goodahead.com>
 * @license   http://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
 * @version   $Id:$
 * @since     0.1.0
 */
class Hackathon_MageGitInfo_Adminhtml_Hackathon_MagegitInfoController extends Mage_Adminhtml_Controller_Action
{
    /**
     * Update the git information block
     */
    public function changeBranchAction()
    {
        $branch = $this->getRequest()->getParam("branch");
        $helper = Mage::helper("magegitinfo/data");

        try {
            //Security - check if branch exist
            if (false === in_array($branch, Mage::getModel("magegitinfo/git_branch")->branch()->getBranches())) {
                throw new Exception("Branch is not existing");
            }
            Mage::getModel("magegitinfo/git_checkout")->changeBranch($branch);
        } catch (Exception $e) {
            $helper->log(
                $helper->__("Couldn't change branch to '%s' because of '%s'", $branch, $e->getMessage())
            );
        }

        $this->_redirectReferer();

    }

}