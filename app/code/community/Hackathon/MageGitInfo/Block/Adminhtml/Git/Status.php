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
 * Status Block
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
class Hackathon_MageGitInfo_Block_Adminhtml_Git_Status extends Hackathon_MageGitInfo_Block_Adminhtml_Git_Abstract
{
    /**
     * @var Hackathon_MageGitInfo_Model_Git_Status
     */
    protected $status;

    /**
     * Constructor
     */
    protected function _construct()
    {
        try {
            $this->status = Mage::getModel("magegitinfo/git_status");
            $this->status->status();
        } catch (Hackathon_MageGitInfo_Model_Git_Exception $e) {
            // TODO: Add execption handling
        }
    }

    public function getStatus()
    {
        return $this->status;
    }

    /**
     * Show untracked files
     */
    public function showUntracked()
    {
        return Mage::getStoreConfigFlag('magegitinfo/params/show_untracked_files');
    }
}