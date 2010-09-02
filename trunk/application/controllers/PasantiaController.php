<?php

/**
 * PasantiaController
 * 
 * @author
 * @version 
 */

require_once 'Zend/Controller/Action.php';

class PasantiaController extends Zend_Controller_Action {
	/**
	 * The default action - show the home page
	 */
	public function indexAction(){
	    	//Título de la vista
	    	$this->view->title = "Pasantias";
	    	//Añadimos el título a la vista
			$this->view->headTitle($this->view->title, 'PREPEND');
			//Creamos el modelo, para la consulta de libros
			$pasantias = new Model_DbTable_Pasantias();
			//Devolvemos a la vista todos los libros
			$this->view->pasantia = $pasantias->fetchAll();
	}
	
	public function agregarAction(){
		//Indicamos el título de la página
		$this->view->title = "Añadir nueva Pasantia";
		//Añadimos el título, delante del título definido por defecto para nuestra aplicación
		$this->view->headTitle($this->view->title, 'PREPEND');
		//Instanciamos el formulario
		$form = new Form_Pasantia();
		//Especificamos el nombre del botón de envío del formulario
		$form->submit->setLabel('Añadir');
		//Asignamos a la vista el formulario
		$this->view->form = $form;

		if ($this->getRequest()->isPost()){ //Si se envían los datos, los recuperamos del formulario
			$formData = $this->getRequest()->getPost();
			if ($form->isValid($formData)){ //Validamos que los datos recibidos sean correctos
				//Asignamos los valores recuperados a variables
				

				$id = $form->getValue('id');
				$idPersona = $form->getValue('idPersona');
				$ano = $form->getValue('ano');
				$periodo = $form->getValue('contrasena');
				$semestre = $form->getValue('semestre');
				
				$pais_origen = $form->getValue('pais_origen');
				$institucion_origen = $form->getValue('institucion_origen');
				$pais_destino = $form->getValue('pais_destino');
				$institucion_destino = $form->getValue('institucion_destino');
				$duracion = $form->getValue('duracion');
				
				$facultad_dependencia = $form->getValue('facultad_dependencia');
				$programa = $form->getValue('programa');
				
				//Creamos el modelo
				$pasantias = new Model_DbTable_Pasantias();
				//Insertamos el nuevo Persona en nuestra BBDD
				$pasantias->insertarPasantia($id, $idPersona, $ano, $periodo, $semestre, $pais_origen, $institucion_origen, $pais_destino, $institucion_destino, $duracion, $facultad_dependencia, $programa );
		//Redireccionamos a la home, donde podremos ver el nuevo Persona introducido.
				$this->_redirect('/');
			}else{ //Si los datos del formulario, no son válidos, se muestra el formulario con los datos de nuevo.
				$form->populate($formData);
			}
		}
	}
	
	public function editarAction(){
		//Indicamos el título de la página
		$this->view->title = "Editar Pasantia";
		//Añadimos el título, delante del título definido por defecto para nuestra aplicación
		$this->view->headTitle($this->view->title, 'PREPEND');
		//Instanciamos el formulario
		$form = new Form_Pasantia();
		//Especificamos el nombre del botón de envío del formulario
		$form->submit->setLabel('Guardar');
		//Asignamos a la vista el formulario
		$this->view->form = $form;
		
	if ($this->getRequest()->isPost()) {//Si se envían los datos, los recuperamos del formulario
			$formData = $this->getRequest()->getPost();
			if ($form->isValid($formData)) {//Validamos que los datos recibidos sean correctos
				//Asignamos los valores recuperados a variables
				
				
				$id = $form->getValue('id');
				$idPersona = $form->getValue('idPersona');
				$ano = $form->getValue('ano');
				$periodo = $form->getValue('contrasena');
				$semestre = $form->getValue('semestre');
				
				$pais_origen = $form->getValue('pais_origen');
				$institucion_origen = $form->getValue('institucion_origen');
				$pais_destino = $form->getValue('pais_destino');
				$institucion_destino = $form->getValue('institucion_destino');
				$duracion = $form->getValue('duracion');
				
				$facultad_dependencia = $form->getValue('facultad_dependencia');
				$programa = $form->getValue('programa');
				
				//Creamos el modelo
				$pasantias = new Model_DbTable_Pasantias();
				//Insertamos el nuevo Persona en nuestra BBDD
				$pasantias->modificarPasantia($id, $idPersona, $periodo, $semestre, $pais_origen, $institucion_origen, $pais_destino, $institucion_destino, $duracion, $facultad_dependencia );
				
				//Vamos a la página principal de la aplicación
				$this->_redirect();
			}else{//Si los datos del formulario, no son válidos, se muestra el formulario con los datos de nuevo.
				$form->populate($formData);
			}
		}else{//Mostramos los datos del Persona en caso de no haber enviado los datos al servidor para actualizar el Persona
			$id = $this->_getParam('id', 0);
			if ($id > 0) {
				$albums = new Model_DbTable_Pasantias();
				$form->populate($albums->obtenerPasantia($id));
			}
		}
	}
	
	public function borrarAction(){
		$this->view->title = "Borrar Pasantia";
		$this->view->headTitle($this->view->titulo, 'PREPEND');
		if ($this->getRequest()->isPost()) {
			$del = $this->getRequest()->getPost('del');
			if ($del == 'Si') {
				$id = $this->getRequest()->getPost('id');
				$pasantias = new Model_DbTable_Pasantias();
				$pasantias->removerPasantia($id);
			}
			$this->_redirect('/');
		}else{
			$id = $this->_getParam('id', 0);
			$pasantias = new Model_DbTable_pasantias();
			$this->view->Pasantia = $pasantias->obtenerPasantia($id);
		}		
	}
	
}

