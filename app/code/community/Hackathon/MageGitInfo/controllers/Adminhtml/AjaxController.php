<?php

class Hackathon_MageGitInfo_Adminhtml_AjaxController extends Mage_Adminhtml_Controller_Action
{

    public function mageGitUpdateAction()
    {
        die($this->getFullActionName());
        if ($this->getRequest()->isAjax()) {
            
        } else {
            $this->_forward('no_route');
        }
    }
    
}