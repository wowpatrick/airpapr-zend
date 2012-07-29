<?php

class Application_Model_Page
{
    private $db;     // The database connection

    public function __construct() {
        $this->db = Zend_Db::factory('Pdo_Mysql', array(
                    'host' => '127.0.0.1',
                    'username' => 'webuser',
                    'password' => 'xxxxxxxx',
                    'dbname' => 'test'
                ));
    }

}

