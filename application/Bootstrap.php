<?php

class Bootstrap extends Zend_Application_Bootstrap_Bootstrap
{
    public function init()
    {

        $config = new Zend_Config_Ini('/path/to/config.ini',
            'staging');
    }
    
    /**
     * Activate and enable the Zend autoloader for the application
     * 
     * @return Zend_Loader_Autoloader
     */
    public function _initAutoloader() {
        $autoloader = Zend_Loader_Autoloader::getInstance();
        
        return $autoloader;
    }
    
    protected function _initSidebar()
    {
        $this->bootstrap('View');
        $view = $this->getResource('View');
        
        $view->placeholder('menu')
            ->setPrefix('<div class="menu">')
            ->setSeparator('<hr />')
            ->setPostfix("</div>");
    }
}