<?php

class PageController extends Zend_Controller_Action
{

    public function init() {
        /* Initialize action controller here */
    }

    public function indexAction() {
        // Create a new db table object
        $post = new Application_Model_DbTable_Posts();
        // Get the data from the db object and assign it to the view object
        $this->view->post = $post->fetchAll();
    }

    public function addAction() {
        // Create a new form object that we defined
        $form = new Application_Form_Post();

        $this->view->form = $form;

        if ($this->getRequest()->isPost()) {
            $formData = $this->getRequest()->getPost();
            if ($form->isValid($formData)) {
                $article_content_title_en = $form->getValue('title');
                $article_content_text_en = $form->getValue('text');
                $posts = new Application_Model_DbTable_Posts();
                $posts->addPost($article_content_title_en, $article_content_text_en);

                $this->_helper->redirector('index');
            } else {
                $form->populate($formData);
            }
        }
    }

    public

    function editAction() {
        // action body
    }

    public

    function deleteAction() {
        // action body
    }

}

