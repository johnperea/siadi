<?php
class Form_Beneficio extends Zend_Form{

	public function __construct($options = null){
		parent::__construct($options);
		
		$this->setName('beneficios');
		 $id = new Zend_Form_Element_Hidden('id'); 
		 
		$nombre = new Zend_Form_Element_Text('nombre');
		$nombre->setLabel('Nombre Beneficio')
		->setRequired(true)
		->addFilter('StripTags')
		->addFilter('StringTrim')
		->addValidator('NotEmpty');
		
		
		
		
		$submit = new Zend_Form_Element_Submit('submit');
		$submit->setAttrib('id', 'submitbutton');
		
		$cancel = new Zend_Form_Element_Button('Cancel');
		
		$this->addElements(array($id, $nombre, $submit));
	}
}
?>