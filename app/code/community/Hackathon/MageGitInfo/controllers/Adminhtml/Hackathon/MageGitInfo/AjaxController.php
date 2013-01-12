<?php

class Hackathon_MageGitInfo_Adminhtml_Hackathon_MageGitInfo_AjaxController extends Mage_Adminhtml_Controller_Action
{

    public function mageGitUpdateAction()
    {
        if ($this->getRequest()->isAjax()) {
            $this->loadLayout(array('adminhtml_hackathon_magegitinfo_ajax_magegitupdate'));
            $this->renderLayout();
        } else {
            $this->_forward('no_route');
        }
    }
    
}