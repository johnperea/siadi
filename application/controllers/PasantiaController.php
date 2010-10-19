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
	    	//T�tulo de la vista
	    	$this->view->title = "Pasantias";
	    	//A�adimos el t�tulo a la vista
			$this->view->headTitle($this->view->title, 'PREPEND');
			//Creamos el modelo, para la consulta de libros
			$pasantias = new Model_DbTable_Pasantias();
			//Devolvemos a la vista todos los libros
			$this->view->pasantia = $pasantias->fetchAll();
	}
	
	public function agregarAction(){
		//Indicamos el t�tulo de la p�gina
		$this->view->title = "Nueva Pasantia";
		//A�adimos el t�tulo, delante del t�tulo definido por defecto para nuestra aplicaci�n
		$this->view->headTitle($this->view->title, 'PREPEND');
		//Instanciamos el formulario
		$form = new Form_Pasantia();
		//Especificamos el nombre del bot�n de env�o del formulario
		$form->submit->setLabel('Agregar');
		//Asignamos a la vista el formulario
		$this->view->form = $form;

		if ($this->getRequest()->isPost()){ //Si se env�an los datos, los recuperamos del formulario
			$formData = $this->getRequest()->getPost();
			if ($form->isValid($formData)){ //Validamos que los datos recibidos sean correctos
				//Asignamos los valores recuperados a variables
				

				$id = $form->getValue('id');
				$idPersona = $form->getValue('idPersona');
				$ano = $form->getValue('ano');
				$periodo = $form->getValue('periodo');
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
				return $this->_forward('index');
				
			}else{ //Si los datos del formulario, no son v�lidos, se muestra el formulario con los datos de nuevo.
				$form->populate($formData);
			}
		}
	}
	
	public function editarAction(){
		//Indicamos el t�tulo de la p�gina
		$this->view->title = "Editar Pasantia";
		//A�adimos el t�tulo, delante del t�tulo definido por defecto para nuestra aplicaci�n
		$this->view->headTitle($this->view->title, 'PREPEND');
		//Instanciamos el formulario
		$form = new Form_Pasantia();
		//Especificamos el nombre del bot�n de env�o del formulario
		$form->submit->setLabel('Editar');
		//Asignamos a la vista el formulario
		$this->view->form = $form;
		
	if ($this->getRequest()->isPost()) {//Si se env�an los datos, los recuperamos del formulario
			$formData = $this->getRequest()->getPost();
			if ($form->isValid($formData)) {//Validamos que los datos recibidos sean correctos
				//Asignamos los valores recuperados a variables
				
				
				$id = $form->getValue('id');
				$idPersona = $form->getValue('idPersona');
				$ano = $form->getValue('ano');
				$periodo = $form->getValue('periodo');
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
				
				//Vamos a la p�gina principal de la aplicaci�n
				return $this->_forward('index');
				
			}else{//Si los datos del formulario, no son v�lidos, se muestra el formulario con los datos de nuevo.
				$form->populate($formData);
			}
		}else{//Mostramos los datos del Persona en caso de no haber enviado los datos al servidor para actualizar el Persona
			$id = $this->_getParam('id');
			if ($id > 0) {
				$pasantias = new Model_DbTable_Pasantias();
				$form->populate($pasantias->obtenerPasantia($id));
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
			return $this->_forward('index');
		}else{
			$id = $this->_getParam('id');
			$pasantias = new Model_DbTable_pasantias();
			$this->view->pasantia = $pasantias->obtenerPasantia($id);
		}		
	}
	
	public function verAction(){
			$id = $this->_getParam('id');
			$this->view->number =  $id;
			if ($id > 0) {
				$pasantias = new Model_DbTable_Pasantias();
				$this->view->pasantia = $pasantias->obtenerPasantia($id);
				
				$id = (int)$id;
			
				$beneficios = new Model_DbTable_Beneficios();
				//$this->view->pasantia = $pasantias->fetchAll();
				//$this->view->beneficios = $beneficios->obtenerBeneficiosPasantia($id);
				//$this->view->beneficio = $beneficios->obtenerBeneficio();
			}
	}
	public function agregar_beneficioAction(){}
	public function borrar_beneficioAction(){}
	
	
}

