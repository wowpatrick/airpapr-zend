<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of MenuController
 *
 * @author Clay
 */
class MenuController extends Zend_Controller_Action
{
    public function indexAction() {
        
        $menuEntries = new Application_Model_DbTable_Posts();
        $this->view->menu = $menuEntries->getMenu();
        
    }
}
