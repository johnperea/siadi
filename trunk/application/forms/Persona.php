<?php
class Form_Persona extends Zend_Form{

		public $elementsDecorators = array(
        'ViewHelper',
        'Errors',
		//array('Errors', array('tag' => 'td', 'class' => 'Errors')),
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
		
		$this->setName('persona');
		
		
		$id = new Zend_Form_Element_Text('id');
		$id->setLabel('Numero Identificacion')
		->setRequired(true)
		->setDecorators($this->elementsDecorators)
		->addFilter('StripTags')
		->addFilter('StringTrim')
		->addValidator('NotEmpty');
		
		$tipoId = new Zend_Form_Element_Select('tipoId');
		$tipoId->setLabel('Tipo de Identificacion')
		->setDecorators($this->elementsDecorators)
		->setmultioptions(array('Registro Civil' =>'RC', 'Tarjeta Identidad'=>'TI', 'Cedula Ciudadania'=>'CC', 'Cedula Extranjeria'=>'CE', 'Pasaporte'=>'PP'))
		->setRequired(true);
		
		$rol = new Zend_Form_Element_Text('rol');
		$rol->setLabel('Tipo de Usuario')
		->setDecorators($this->elementsDecorators)
		->setRequired(true)
		->addFilter('StripTags')
		->addFilter('StringTrim')
		->addValidator('NotEmpty');
		
		$nombre = new Zend_Form_Element_Text('nombre');
		$nombre->setLabel('nombre')
		->setDecorators($this->elementsDecorators)
		->setRequired(true)
		->addFilter('StripTags')
		->addFilter('StringTrim')
		->addValidator('NotEmpty');
		
		$apellidos = new Zend_Form_Element_Text('apellidos');
		$apellidos->setLabel('apellidos')
		->setDecorators($this->elementsDecorators)
		->setRequired(true)
		->addFilter('StripTags')
		->addFilter('StringTrim')
		->addValidator('NotEmpty');
				
		$sexo = new Zend_Form_Element_Select('sexo');
		$sexo->setLabel('Sexo')
		->setDecorators($this->elementsDecorators)
		->setmultioptions(array('M' =>'Masculino', 'F'=>'Femenino'))
		->setRequired(true);
		
		//$edad = new Zend_Form_Element_Text('edad');
		$edad = new new ZendX_JQuery_Form_Element_DatePicker(
                    'dp1',
                    array('jQueryParams' => array('defaultDate' => '2007/10/10'))
                );
		$edad->setLabel('Edad')
		->setDecorators($this->elementsDecorators)
		->setRequired(true)
		->addFilter('StripTags')
		->addFilter('StringTrim')
		->addValidator('NotEmpty');
		
		$direccion = new Zend_Form_Element_Text('direccion');
		$direccion->setLabel('direccion')
		->setDecorators($this->elementsDecorators)
		->setRequired(true)
		->addFilter('StripTags')
		->addFilter('StringTrim')
		->addValidator('NotEmpty');
		
		$ciudad = new Zend_Form_Element_Text('ciudad');
		$ciudad->setLabel('ciudad')
		->setDecorators($this->elementsDecorators)
		->setRequired(true)
		->addFilter('StripTags')
		->addFilter('StringTrim')
		->addValidator('NotEmpty');
		
		$telefono = new Zend_Form_Element_Text('telefono');
		$telefono->setLabel('telefono')
		->setDecorators($this->elementsDecorators);
		
		$correo = new Zend_Form_Element_Text('correo');
		$correo->setLabel('correo')
		->setDecorators($this->elementsDecorators)
		->setRequired(true)
		->addFilter('StripTags')
		->addFilter('StringTrim')
		->addValidator('NotEmpty');
		
		$usuario = new Zend_Form_Element_Text('usuario');
		$usuario->setLabel('usuario')
		->setDecorators($this->elementsDecorators);
		
		
		$contrasena = new Zend_Form_Element_Text('contrasena');
		$contrasena->setLabel('contrasena')
		->setDecorators($this->elementsDecorators);
		
		
		$submit = new Zend_Form_Element_Submit('submit');
		$submit->setAttrib('id', 'submitbutton')
		->setDecorators($this->buttonsDecorators);
		
		$reset = new Zend_Form_Element_Reset('reset');
		$reset->setLabel('Cancelar')
		->setDecorators($this->buttonsDecorators)
		->setAttrib('onclick', 'history.back(-1);');
		
		$this->addElements(array($id, $tipoId, $rol, $nombre, $apellidos, $sexo, $edad, $direccion, $ciudad, $telefono, $correo, $usuario, $contrasena, $submit, $reset));
	}
}
?>