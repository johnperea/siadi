<?php
class Form_Beneficio extends Zend_Form{
		
		public $elementsDecorators = array(
        'ViewHelper',
        'Errors',
        array(array('data' => 'HtmlTag'), array('tag' => 'td', 'class' => 'element')),
        array('Label', array('tag' => 'td')),
        array(array('row' => 'HtmlTag'), array('tag' => 'tr')),
		);

		public $buttonsDecorators = array(
			'ViewHelper',
			array(array('data' => 'HtmlTag'), array('tag' => 'td', 'class' => 'button')),
			//array(array('label' => 'HtmlTag'), array('tag' => 'td', 'placement' => 'prepend')),
			//array(array('row' => 'HtmlTag'), array('tag' => 'tr')),
		);

	public function loadDefaultDecorators(){
        $this->setDecorators(array(
            'FormElements',
            array('HtmlTag', array('tag' => 'table')),
            'Form',
        ));
		}
		
	public function __construct($options = null){
		parent::__construct($options);
		
		$this->setName('beneficios');
		 $id = new Zend_Form_Element_Hidden('id'); 
		 
		$nombre = new Zend_Form_Element_Text('nombre');
		$nombre->setLabel('Nombre Beneficio')
		->setDecorators($this->elementsDecorators)
		->setRequired(true)
		->addFilter('StripTags')
		->addFilter('StringTrim')
		->addValidator('NotEmpty');
		
		
		
		
		$submit = new Zend_Form_Element_Submit('submit');
		$submit->setAttrib('id', 'submitbutton')
		->setDecorators($this->buttonsDecorators);
		
		$reset = new Zend_Form_Element_Reset('reset');
		$reset->setLabel('Cancelar')
		->setDecorators($this->buttonsDecorators)
		->setAttrib('onclick', 'history.back(-1);');
		
		$this->addElements(array($id, $nombre, $submit, $reset));
	}
}
?>