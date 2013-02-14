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
class Hackathon_MageGitInfo_Adminhtml_Hackathon_MagegitInfoController 
    extends Mage_Adminhtml_Controller_Action
{
    public function getSession()
    {
        return Mage::getSingleton('core/session');
    }

    /**
     * Update the git information block
     */
    public function changeBranchAction()
    {
        $session = $this->getSession();
        $helper = Mage::helper("magegitinfo/data");
        if (!$this->isAllowed() || !Mage::getModel("magegitinfo/config")->getIsSwitchingBranchesIsAllowed()) {
            $msg = 'You are not allowed to switch branches';
            $session->addError($helper->__($msg));
        } else {
            $branch = $this->getRequest()->getParam("branch");
            //Security - check if branch exist
            if (false === in_array($branch, $this->getBranches())) {
                $msg = 'Branch %d does not exists';
                $session->addError($helper->__($msg, $branch));
            } else {
                $this->switchBranch($branch);
            }
        }
        $this->_redirectReferer();
    }

    protected function switchBranch($branch)
    {
        $session = $this->getSession();
        $helper = Mage::helper("magegitinfo/data");
        try {
            Mage::getModel("magegitinfo/git_checkout")->changeBranch($branch);
            $msg = 'Successfully switched to branch "%s"';
            $session->addSuccess($helper->__($msg , $branch));
        } catch (Hackathon_MageGitInfo_Model_Git_Exception $e) {
            switch ($e->getErrorCode()) {
            case 128:
                $msg = $helper->__('Your webserver has no permissions to switch branches');
                break;
            case 1:
                $output = $e->getGitOutput();
                $msg = array_shift($output) . "<hr/>" . implode("<br/>", $output);
                break;
            default:
                $msg = $e->getMessage();
                $msg .= "<hr/>" . implode("<br/>", $e->getGitOutput());
                Mage::logException($e);
            }
            $session->addError($msg);
        }
    }

    protected function getBranches()
    {
        return Mage::getModel("magegitinfo/git_branch")
            ->branch()
            ->getBranches();
    }

    protected function isAllowed()
    {
        return Mage::getSingleton('admin/session')->isAllowed('admin/switch_branches');
    }
}
