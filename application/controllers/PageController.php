<?php

class PageController extends Zend_Controller_Action
{

    public function init() {
        /* Initialize action controller here */
    }

    /**
     * 
     * Pre dispatch medthod used to include the _menu.phtml placeholder defined in the bootstrap
     * http://framework.zend.com/manual/1.12/en/learning.view.placeholders.basics.html
     */
    public function preDispatch() {
        $this->view->render('_menu.phtml');
    }

    public function indexAction() {
        // Create a new db table object
        $post = new Application_Model_DbTable_Posts();
        // Get the data from the db object and assign it to the view object
        $this->view->post = $post->fetchAll(null, "article_content_date ASC");
    }

    public function addAction() {
        // Create a new form object that we defined
        $form = new Application_Form_Post();

        $this->view->form = $form;

        if ($this->getRequest()->isPost()) {
            $formData = $this->getRequest()->getPost();
            if ($form->isValid($formData)) {
                $article_content_title_en = $form->getValue('article_content_title_en');
                $article_content_text_en = $form->getValue('article_content_text_en');
                $posts = new Application_Model_DbTable_Posts();
                $posts->addPost($article_content_title_en, $article_content_text_en);

                $this->_helper->redirector('index');
            } else {
                $form->populate($formData);
            }
        }
    }

    /**
     * Edit existing posts from the database
     *
     */
    public function editAction() {
        $form = new Application_Form_Post();
        $this->view->form = $form;

        if ($this->getRequest()->isPost()) {
            $formData = $this->getRequest()->getPost();
            if ($form->isValid($formData)) {
                $id = (int) $form->getValue('id');
                $title = $form->getValue('article_content_title_en');
                $text = $form->getValue('article_content_text_en');

                $posts = new Application_Model_DbTable_Posts();
                $posts->updatePost($id, $title, $text);

                $this->_helper->redirector('index');
            } else {
                $form->populate($formData);
            }
        } else {
            $id = $this->_getParam('id', 0);
            if ($id > 0) {
                $posts = new Application_Model_DbTable_Posts();
                $form->populate($posts->getPost($id));
            }
        }
    }

    public function deleteAction() {
        if ($this->getRequest()->isPost()) {
            $del = $this->getRequest()->getPost('del');
            if ($del == 'Yes') {
                $id = $this->getRequest()->getPost('id');
                $posts = new Application_Model_DbTable_Posts();
                $posts->deletePost($id);
            }

            $this->_helper->redirector('index');
        } else {
            $id = $this->_getParam('id', 0);
            $posts = new Application_Model_DbTable_Posts();
            $this->view->post = $posts->getPost($id);
        }
    }

    public function viewAction() {
        // The the id form the URL (the rquest object)
        $articleName = $this->_getParam('article', 0);
        $post = new Application_Model_DbTable_Posts();
        $this->view->post = $post->getPost($articleName);
    }

}
