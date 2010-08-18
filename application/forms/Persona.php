<?php
class Form_Persona extends Zend_Form{

	public function __construct($options = null){
		parent::__construct($options);
		
		$this->setName('persona');
		$id = new Zend_Form_Element_Hidden('id');
		$rolId = $form->getValue('id_rol');
		$tipoId = $form->getValue('tipoId');
		$nombre = $form->getValue('nombre');
		$apellido = $form->getValue('apellido');
		$sexo = $form->getValue('sexo');
		$edad = $form->getValue('edad');
		$direccion = $form->getValue('direcion');
		$ciudad = $form->getValue('ciudad');
		$telefono = $form->getValue('telefono');
		$email = $form->getValue('email');
		//Creamos el modelo
		$Personas = new Model_DbTable_Personas();
		//Insertamos el nuevo Persona en nuestra BBDD
		$Personas->addPersona($rolId,	$tipoId, $nombre, $apellido, $sexo, $direccion, $ciudad , $telefono , $email) ;
		
		
		
		$rolId = new Zend_Form_Element_Text('Tipo_Rol');
		$rolId->setLabel('Tipo de Autor')
		->setRequired(true)
		->addFilter('StripTags')
		->addFilter('StringTrim')
		->addValidator('NotEmpty');
		
		$tipoId = new Zend_Form_Element_Text('tipoId');
		$tipoId->setLabel('tipoId')
		->setRequired(true)
		->addFilter('StripTags')
		->addFilter('StringTrim')
		->addValidator('NotEmpty');
		
		$nombre = new Zend_Form_Element_Text('nombre');
		$nombre->setLabel('nombre')
		->setRequired(true)
		->addFilter('StripTags')
		->addFilter('StringTrim')
		->addValidator('NotEmpty');
		
		$apellido = new Zend_Form_Element_Text('apellido');
		$apellido->setLabel('apellido')
		->setRequired(true)
		->addFilter('StripTags')
		->addFilter('StringTrim')
		->addValidator('NotEmpty');
		
		$sexo = new Zend_Form_Element_Text('sexo');
		$sexo->setLabel('sexo')
		->setRequired(true)
		->addFilter('StripTags')
		->addFilter('StringTrim')
		->addValidator('NotEmpty');
		
		$dirreccion = new Zend_Form_Element_Text('dirreccion');
		$dirreccion->setLabel('dirreccion')
		->setRequired(true)
		->addFilter('StripTags')
		->addFilter('StringTrim')
		->addValidator('NotEmpty');
		
		$ciudad = new Zend_Form_Element_Text('ciudad');
		$ciudad->setLabel('ciudad')
		->setRequired(true)
		->addFilter('StripTags')
		->addFilter('StringTrim')
		->addValidator('NotEmpty');
		
		$submit = new Zend_Form_Element_Submit('submit');
		$submit->setAttrib('id', 'submitbutton');
		$this->addElements(array($id, $autor, $dirreccion, $submit));
	}
}
?>