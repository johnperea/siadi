<?php
class Form_Persona extends Zend_Form{

	private $decoratorUser = array();
	
	
	public function __construct($options = null){
		parent::__construct($options);
		
		$this->setName('persona');
		$this->decoratorUser = array(
            'ViewHelper',
            'Errors',
            array('ViewScript', array('viewScript' => '/decorators/decoratorUser.phtml', 'placement' => false)),);
     
		
		$id = new Zend_Form_Element_Text('id');
		$id->setLabel('Numero Identificacion')
		->setRequired(true)
		//->setDecorators($this->decoratorUser)
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
				
		$sexo = new Zend_Form_Element_Select('sexo');
		$sexo->setLabel('Sexo')
		->setmultioptions(array('M' =>'Masculino', 'F'=>'Femenino'))
		->setRequired(true);
		
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
		
		
		$this->addElements(array($id, $tipoId, $rol, $nombre, $apellidos, $sexo, $edad, $direccion, $ciudad, $telefono, $correo, $usuario, $contrasena, $submit));
	}
}
?>