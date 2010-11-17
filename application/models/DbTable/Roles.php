<?php

/**
 * Roles
 *  
 * @author john
 * @version 
 */
	
require_once 'Zend/Db/Table/Abstract.php';

class Model_DBTable_Roles extends Zend_Db_Table_Abstract{
	/**
	 * The default table name 
	 */
    protected $_name = 'roles';
    protected $_primary = 'id';
    protected $_dependentTables = array('Model_DBTable_Personas');
    
    public function agregarRol($id, $nombre, $acceso){
    	$data = array('id' => $id, 'nombre' => $nombre, 'acceso' => $acceso);
		$this->insert($data);
    }
	
    public function editarRol($id, $nombre, $acceso){
    	$data = array('id' => $id, 'nombre' => $nombre, 'acceso' => $acceso);
		$this->update($data, 'id='.(int)$id);
    }
	
    public function borrarRol($id){
    	$this->delete('id='.(int)$id);    
    }
	
    public function obtenerRol($id){}
    
}

