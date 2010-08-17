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
	public function indexAction() {
		
//T�tulo de la vista
    	$this->view->title = "Personas";
    	//A�adimos el t�tulo a la vista
	$this->view->headTitle($this->view->title, 'PREPEND');
	//Creamos el modelo, para la consulta de libros
	$personas = new Model_DbTable_Persona();
	//Devolvemos a la vista todos los libros
	$this->view->personas = $personas->fetchAll();
}
		
	}


