<?php

/**
 * Table data gatway. It already has the database connection data from the ini.
 * It provides methodes to CRUD to the database.
 *
 */
class Application_Model_DbTable_Posts extends Zend_Db_Table_Abstract
{

    protected $_name = 'airpapr_base';

    /**
     * Get a article form the database
     */
    public function getPost($articleName) {              
        $row = $this->fetchRow(
            $this->select()
            ->where('article_name = ?', $articleName)
            ->order('id ASC')
        );
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
    
    public function getMenu() {
        $row = $this->fetchRow(
                $this->select()
                ->where('parent = ?', '')
                ->order('id ASC')
                );
        
        return $row->toArray();
    }
}

