<?php

/**
 * Table data gatway. It already has the database connection data from the ini.
 * It provides methodes to CRUD to the database.
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
            'article_content_title_en' => $title,
            'article_content_text_en' => $text
        );
        $this->insert($data);
    }

    public function updatePost($id, $title, $text) {
        $data = array(
            'article_content_title_en' => $title,
            'article_content_text_en' => $text
        );
        $this->update($data, 'id = ' . (int)$id);
    }

    public function deletePost($id) {
        $this->delete('id = '.(int)$id);
    }
}

