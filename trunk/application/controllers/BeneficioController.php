<?php

/**
 * BeneficioController
 * 
 * @author
 * @version 
 */

require_once 'Zend/Controller/Action.php';

class BeneficioController extends Zend_Controller_Action {
	/**
	 * The default action - show the home page
	 */
	public function indexAction(){
	    	//T�tulo de la vista
	    	$this->view->title = "Beneficios";
	    	//A�adimos el t�tulo a la vista
			$this->view->headTitle($this->view->title, 'PREPEND');
			//Creamos el modelo, para la consulta de libros
			$beneficios = new Model_DbTable_Beneficios();
			//Devolvemos a la vista todos los libros
			$this->view->beneficio = $beneficios->fetchAll();
	}
	
	public function agregarAction(){
		//Indicamos el t�tulo de la p�gina
		$this->view->title = "Nuevo Beneficio";
		//A�adimos el t�tulo, delante del t�tulo definido por defecto para nuestra aplicaci�n
		$this->view->headTitle($this->view->title, 'PREPEND');
		//Instanciamos el formulario
		$form = new Form_Beneficio();
		//Especificamos el nombre del bot�n de env�o del formulario
		$form->submit->setLabel('Agregar');
		//Asignamos a la vista el formulario
		$this->view->form = $form;

		if ($this->getRequest()->isPost()){ //Si se env�an los datos, los recuperamos del formulario
			$formData = $this->getRequest()->getPost();
			if ($form->isValid($formData)){ //Validamos que los datos recibidos sean correctos
				//Asignamos los valores recuperados a variables
				

				$id = $form->getValue('id');
				$nombre = $form->getValue('nombre');
			
				
				
				//Creamos el modelo
				$beneficios = new Model_Dbtable_Beneficios();
				//Insertamos el nuevo Persona en nuestra BBDD
				$beneficios->insertarBeneficio($id, $nombre );
		//Redireccionamos a la home, donde podremos ver el nuevo Persona introducido.
				return $this->_forward('index');
				
			}else{ //Si los datos del formulario, no son v�lidos, se muestra el formulario con los datos de nuevo.
				$form->populate($formData);
			}
		}
	}
	
	public function editarAction(){
		//Indicamos el t�tulo de la p�gina
		$this->view->title = "Editar Beneficio";
		//A�adimos el t�tulo, delante del t�tulo definido por defecto para nuestra aplicaci�n
		$this->view->headTitle($this->view->title, 'PREPEND');
		//Instanciamos el formulario
		$form = new Form_Beneficio();
		//Especificamos el nombre del bot�n de env�o del formulario
		$form->submit->setLabel('Editar');
		//Asignamos a la vista el formulario
		$this->view->form = $form;
		
	if ($this->getRequest()->isPost()) {//Si se env�an los datos, los recuperamos del formulario
			$formData = $this->getRequest()->getPost();
			if ($form->isValid($formData)) {//Validamos que los datos recibidos sean correctos
				//Asignamos los valores recuperados a variables
				
				
				$id = $form->getValue('id');
				$nombre = $form->getValue('nombre');
				
				//Creamos el modelo
				$beneficios = new Model_DbTable_Beneficios();
				//Insertamos el nuevo Persona en nuestra BBDD
				$beneficios->modificarBeneficio($id, $nombre );
				
				//Vamos a la p�gina principal de la aplicaci�n
				return $this->_forward('index');
				
			}else{//Si los datos del formulario, no son v�lidos, se muestra el formulario con los datos de nuevo.
				$form->populate($formData);
			}
		}else{//Mostramos los datos del Persona en caso de no haber enviado los datos al servidor para actualizar el Persona
			$id = $this->_getParam('id');
			if ($id > 0) {
				$albums = new Model_DbTable_Beneficios();
				$form->populate($albums->obtenerBeneficio($id));
			}
		}
	}
	
	public function borrarAction(){
		$this->view->title = "Borrar Beneficio";
		$this->view->headTitle($this->view->titulo, 'PREPEND');
		if ($this->getRequest()->isPost()) {
			$del = $this->getRequest()->getPost('del');
			if ($del == 'Si') {
				$id = $this->getRequest()->getPost('id');
				$beneficios = new Model_DbTable_Beneficios();
				$beneficios->removerBeneficio($id);
			}
			return $this->_forward('index');
		}else{
			$id = $this->_getParam('id');
			$beneficios = new Model_DbTable_Beneficios();
			$this->view->Beneficio = $beneficios->obtenerBeneficio($id);
		}		
	}
	
}

