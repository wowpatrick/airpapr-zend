<?php

class Bootstrap extends Zend_Application_Bootstrap_Bootstrap
{
    public function init()
    {

        $config = new Zend_Config_Ini('/path/to/config.ini',
            'staging');
    }
}