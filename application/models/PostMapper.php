<?php

class Application_Model_PostMapper
{

    protected $_dbTable;

    /**
     * Sets the Db table - not really sure what this thing dose
     *
     * @version 0.1
     * @since   0.1
     * @author  Patrick
     * @param   type $table
     */
    public function setDbTable($dbTable) {
        if (is_string(dbTable)) {
            $dbTable = new $dbTable();
        }
        if (!$dbTable instanceof Zend_Db_Table_Abstract) {
            throw new Exception('Invailid table data gatway provided');
        }
        $this->_dbTable = $dbTable;
        return $this;
    }

    /**
     * Getter for the current Db table
     *
     * @version     0.1
     * @since       0.1
     * @author      Patrick
     */
    public function getDbTable() {
        if (null === $this->_dbTable) {
            $this->setDbTable('Application_Model_PostMapper');
        }
        return $this->_dbTable;
    }

    /**
     * Save data to the Db
     *
     * @version     0.1
     * @since       0.1
     * @author      Patrick
     */
    public function save(Application_Model_Page $post) {
        $data = array(
            'content1' => $post->getContent1(),
            'content2' => $post->getContent2()
        );


        if (null === ($id = $guestbook->getId())) {
            unset($data['id']);
            $this->getDbTable()->insert($data);
        } else {
            $this->getDbTable()->update($data, array('id' = ? => $id));
        }
    }

}

