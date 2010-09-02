<?php
class Form_LoginUsuario extends Zend_Form{

	public function __construct($options = null){
		parent::__construct($options);
		
		$this->setName('Autenticador');
			
		$usuario = new Zend_Form_Element_Text('usuario');
		$usuario->setLabel('usuario')
		->setRequired(true)
		->addFilter('StripTags')
		->addFilter('StringTrim')
		->addValidator('NotEmpty');
		
		$contrasena = new Zend_Form_Element_Password('contrasena');
		$contrasena->setLabel('contrasena')
		->setRequired(true)
		->addFilter('StripTags')
		->addFilter('StringTrim')
		->addValidator('NotEmpty');
		
		$submit = new Zend_Form_Element_Submit('submit');
		$submit->setAttrib('id', 'submitbutton');
		
		$cancel = new Zend_Form_Element_Button('Cancel');
		
		$this->addElements(array( $usuario, $contrasena, $submit, $cancel));
		
		$this->setDecorators(array('FormElements',
			array('HtmlTag', array('tag' => 'dl', 'class' => 'zend_form')),
			array('Description', array('placement' => 'prepend')),
			'Form'));
		
	}
}
?>