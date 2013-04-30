<?php
namespace Wegener\Form;

use Zend\Form\Form;
use Zend\Form\Element;
use Zend\Validator;
use Zend\InputFilter\InputFilter;
use Zend\InputFilter\Input;

class SimpleForm extends Form
{
    public function __construct($name = 'SimpleForm')
    {
        parent::__construct($name);
        $this->setAttribute('methode', 'post');
        $this->setAttribute('class', 'form-horizontal');

        $bar = new Element\Text('bar');
        $bar->setLabel('Please enter something');
        $bar->setAttribute('placeholder', 'Please enter something');
        $bar->setLabelAttributes(array('class' => 'control-label'));

        $csrf = new Element\Csrf('security');
        
        $send = new Element('send');
        $send->setAttributes(
            array(
                'type' => 'Submit',
                'class' => 'btn btn-primary',
                'value' => 'Save',
            )
        );

        $this->addElementToForm($bar, $csrf, $send);
    }

    private function addElementToForm($bar, $csrf, $send)
    {
        $this->add($bar);
        $this->add($csrf);
        $this->add($send);

        $inputBar = new Input('bar');
        $inputBar->getValidatorChain()
            ->addValidator(new Validator\NotEmpty())
            ->addValidator(new Validator\StringLength(3));
        
        $inputFilter = new InputFilter();
        $inputFilter->add($inputBar);

        $this->setInputFilter($inputFilter);
    }
}
