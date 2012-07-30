<?php

class Application_Form_Post extends Zend_Form
{

    public function init() {
        // Set the name of the form
        $this->setName('Post');

        $id = new Zend_Form_Element_Hidden('id');
        $id->addFilter('Int');

        $title = new Zend_Form_Element_Text('title');
        $title->setLabel('Title')
                ->setRequired(true)
                ->addFilter('StripTags')
                ->addFilter('StringTrim')
                ->addValidator('NotEmpty');

        $text = new Zend_Form_Element_Text('text');
        $text->setLabel('Text')
                ->setRequired(true)
                ->addFilter('StripTags')
                ->addFilter('StringTrim')
                ->addValidator('NotEmpty');

        $submit = new Zend_Form_Element_Submit('Submit');
        $submit->setAttrib('id', 'submitbotton');

        $this->addElements(array($id, $title, $text, $submit));
    }

}

