<?php

/**
 * PersonaController
 * 
 * @author
 * @version 
 */

require_once 'Zend/Controller/Action.php';

class PersonaController extends Zend_Controller_Action {
	/**
	 * The default action - show the home page
	 */
	public function indexAction(){
	    	//Título de la vista
	    	$this->view->title = "Personas";
	    	//Añadimos el título a la vista
			$this->view->headTitle($this->view->title, 'PREPEND');
			//Creamos el modelo, para la consulta de libros
			$personas = new Model_DbTable_Personas();
			//Devolvemos a la vista todos los libros
			$this->view->persona = $personas->fetchAll();
	}
	
	public function agregarAction(){
		//Indicamos el título de la página
		$this->view->title = "Añadir Persona";
		//Añadimos el título, delante del título definido por defecto para nuestra aplicación
		$this->view->headTitle($this->view->title, 'PREPEND');
		//Instanciamos el formulario
		$form = new Form_Persona();
		ZendX_JQuery::enableForm($form);
		//Especificamos el nombre del botón de envío del formulario
		$form->submit->setLabel('Agregar');
		
		
		//Asignamos a la vista el formulario
		$this->view->form = $form;

		if ($this->getRequest()->isPost()){ //Si se envían los datos, los recuperamos del formulario
			$formData = $this->getRequest()->getPost();
			if ($form->isValid($formData)){ //Validamos que los datos recibidos sean correctos
				//Asignamos los valores recuperados a variables
				$id = $form->getValue('id');
				$tipoId = $form->getValue('tipoId');
				$rol = $form->getValue('rol');
				$nombre = $form->getValue('nombre');
				$apellidos = $form->getValue('apellidos');
				$sexo = $form->getValue('sexo');
				$edad = $form->getValue('edad');
				$direccion = $form->getValue('direccion');
				$ciudad = $form->getValue('ciudad');
				$telefono = $form->getValue('telefono');
				$correo = $form->getValue('correo');
				$usuario = $form->getValue('usuario');
				$contrasena = $form->getValue('contrasena');
				//Creamos el modelo
				$Personas = new Model_DbTable_Personas();
				//Insertamos el nuevo Persona en nuestra BBDD
				$Personas->agregarPersona($id, $tipoId, $rol, $nombre, $apellidos, $sexo, $edad, $direccion, $ciudad , $telefono , $correo, $usuario, $contrasena );
				//Redireccionamos a la home, donde podremos ver el nuevo Persona introducido.
				
				return $this->_forward('index');
			}else{ //Si los datos del formulario, no son válidos, se muestra el formulario con los datos de nuevo.
				$form->populate($formData);
			}
		}
	}
	
	public function editarAction(){
		//Indicamos el título de la página
		$this->view->title = "Editar Persona";
		//Añadimos el título, delante del título definido por defecto para nuestra aplicación
		$this->view->headTitle($this->view->title, 'PREPEND');
		//Instanciamos el formulario
		$form = new Form_Persona();
		//Especificamos el nombre del botón de envío del formulario
		
		$form->submit->setLabel('Editar');
		//Asignamos a la vista el formulario
		$this->view->form = $form;
		
	if ($this->getRequest()->isPost()) {//Si se envían los datos, los recuperamos del formulario
			$formData = $this->getRequest()->getPost();
			if ($form->isValid($formData)) {//Validamos que los datos recibidos sean correctos
				//Asignamos los valores recuperados a variables
				
				$id = $form->getValue('id');
				$tipoId = $form->getValue('tipoId');
				$rol = $form->getValue('rol');
				$nombre = $form->getValue('nombre');
				$apellidos = $form->getValue('apellidos');
				$sexo = $form->getValue('sexo');
				$edad = $form->getValue('edad');
				$direccion = $form->getValue('direccion');
				$ciudad = $form->getValue('ciudad');
				$telefono = $form->getValue('telefono');
				$correo = $form->getValue('correo');
				$usuario = $form->getValue('usuario');
				$contrasena = $form->getValue('contrasena');
				
				$Personas = new Model_DbTable_Personas();
				
				
				$Personas->editarPersona($id, $tipoId, $rol, $nombre, $apellidos, $sexo, $edad, $direccion, $ciudad , $telefono , $correo, $usuario, $contrasena );
				
				return $this->_forward('index');
				
			}else{//Si los datos del formulario, no son válidos, se muestra el formulario con los datos de nuevo.
				$form->populate($formData);
			}
		}else{//Mostramos los datos del Persona en caso de no haber enviado los datos al servidor para actualizar el Persona
			$id = $this->_getParam('id');
			if ($id > 0) {
				$Personas = new Model_DbTable_Personas();
				$form->populate($Personas->obtenerPersona($id));
			}
		}
	}
	
	public function borrarAction(){
		$this->view->title = "Borrar Persona";
		$this->view->headTitle($this->view->titulo, 'PREPEND');
		if ($this->getRequest()->isPost()) {
			$del = $this->getRequest()->getPost('del');
			if ($del == 'Si') {
				$id = $this->getRequest()->getPost('id');
				$Personas = new Model_DbTable_Personas();
				$Personas->borrarPersona($id);
			}
			
			return $this->_forward('index');
		}else{
			$id = $this->_getParam('id');
			$Personas = new Model_DbTable_Personas();
			$this->view->persona = $Personas->obtenerPersona($id);
		}		
	}
}


