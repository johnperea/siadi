<?php
class Form_Persona extends Zend_Form{

	public function __construct($options = null){
		parent::__construct($options);
		
		$this->setName('persona');
		
		$id = new Zend_Form_Element_Text('id');
		$id->setLabel('Numero Identificacion')
		->setRequired(true)
		->addFilter('StripTags')
		->addFilter('StringTrim')
		->addValidator('NotEmpty');
		
		$tipoId = new Zend_Form_Element_Select('tipoId');
		$tipoId->setLabel('Tipo de Identificacion')
		->setmultioptions(array('Registro Civil' =>'RC', 'Tarjeta Identidad'=>'TI', 'Cedula Ciudadania'=>'CC', 'Cedula Extranjeria'=>'CE', 'Pasaporte'=>'PP'))
		->setRequired(true);
		
		$rol = new Zend_Form_Element_Text('rol');
		$rol->setLabel('Tipo de Usuario')
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
		
		$apellidos = new Zend_Form_Element_Text('apellidos');
		$apellidos->setLabel('apellidos')
		->setRequired(true)
		->addFilter('StripTags')
		->addFilter('StringTrim')
		->addValidator('NotEmpty');
				
		$sexo = new Zend_Form_Element_Text('sexo');
		$sexo->setLabel('Sexo')
		->setRequired(true)
		->addFilter('StripTags')
		->addFilter('StringTrim')
		->addValidator('NotEmpty');
		
		$edad = new Zend_Form_Element_Text('edad');
		$edad->setLabel('Edad')
		->setRequired(true)
		->addFilter('StripTags')
		->addFilter('StringTrim')
		->addValidator('NotEmpty');
		
		$direccion = new Zend_Form_Element_Text('direccion');
		$direccion->setLabel('direccion')
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
		
		$telefono = new Zend_Form_Element_Text('telefono');
		$telefono->setLabel('telefono')
		->setRequired(true)
		->addFilter('StripTags')
		->addFilter('StringTrim')
		->addValidator('NotEmpty');
		
		$correo = new Zend_Form_Element_Text('correo');
		$correo->setLabel('correo')
		->setRequired(true)
		->addFilter('StripTags')
		->addFilter('StringTrim')
		->addValidator('NotEmpty');
		
		$usuario = new Zend_Form_Element_Text('usuario');
		$usuario->setLabel('usuario')
		->setRequired(true)
		->addFilter('StripTags')
		->addFilter('StringTrim')
		->addValidator('NotEmpty');
		
		$contrasena = new Zend_Form_Element_Text('contrasena');
		$contrasena->setLabel('contrasena')
		->setRequired(true)
		->addFilter('StripTags')
		->addFilter('StringTrim')
		->addValidator('NotEmpty');
		
		$submit = new Zend_Form_Element_Submit('submit');
		$submit->setAttrib('id', 'submitbutton');
		
		$cancel = new Zend_Form_Element_Button('Cancel');
		
		$this->addElements(array($id, $tipoId, $rol, $nombre, $apellidos, $sexo, $edad, $direccion, $ciudad, $telefono, $correo, $usuario, $contrasena, $submit, $cancel));
	}
}
?>