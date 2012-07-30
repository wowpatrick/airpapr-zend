<?php

/**
 * Table data gatway. It already has the Db connection data from the ini
 *
 */
class Application_Model_DbTable_Posts extends Zend_Db_Table_Abstract
{

    protected $_name = 'airpapr_base';

    public function getPost($id) {
        $id = (int)$id;
        $row = $this->fetchRow('id = ' . $id);
        if(!$row) {
            throw new Exception("Could not find row $id");
        }
        return $row->toArray();
    }

    public function addPost($title, $text) {
        $data = array(
            'title' => $title,
            'text' => $text
        );
        $this->insert($data);
    }

    public function updatePost($title, $text) {
        $data = array(
            'title' => $title,
            'text' => $text
        );
        $this->update($data, 'id = ' . (int)$id);
    }

    public function deleteAlbum($id) {
        $this->delete('id = '.(int)$id);
    }
}

