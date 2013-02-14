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
 * Observer
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
class Hackathon_MageGitInfo_Model_Observer
{
    /**
     * Append parcel announcement to html output.
     *
     * @param  $observer
     * @return void
     */
    public function appendGitInfoToFooter($observer)
    {
        if ($this->isFooterBlock($observer->getBlock())
            && $this->isAllowed()
            && Mage::getModel("magegitinfo/config")->getIsActive()) {
            $transport = $observer->getTransport();
            $block     = $observer->getBlock();
            $layout    = $block->getLayout();
            $html      = $transport->getHtml();

            $html = $html . $layout->getBlock("magegitinfo_wrapper")->renderView();

            $transport->setHtml($html);
        }
    }

    /**
     * Check if given block is instance of Adminhtml Footer Block
     *
     * @param Mage_Adminhtml_Block_Template $block
     * @return boolean
     */
    protected function isFooterBlock($block)
    {
        return ($block instanceof Mage_Adminhtml_Block_Page_Footer);
    }

    /**
     * Check if admin user has the rights to see git informations
     *
     * @return boolean
     */
    protected function isAllowed()
    {
        return Mage::getSingleton('admin/session')->isAllowed('admin/show_git_info');
    }
}
