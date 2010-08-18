<?php

class IndexController extends Zend_Controller_Action
{

    public function init()
    {
        /* Initialize action controller here */
    }

	public function indexAction(){
	    	//Título de la vista
	    	$this->view->title = "Mis Libros";
	    	//Añadimos el título a la vista
			$this->view->headTitle($this->view->title, 'PREPEND');
			//Creamos el modelo, para la consulta de libros
			$personas = new Model_DbTable_Personas();
			//Devolvemos a la vista todos los libros
			$this->view->persona = $personas->fetchAll();
	}


}

?>