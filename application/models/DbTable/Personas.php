<?php

/**
 * Personas
 * 
 * @author john
 * @version 
 */

require_once 'Zend/Db/Table/Abstract.php';

class Personas extends Zend_Db_Table_Abstract {
	/**
	 * The default table name 
	 */
	protected $_name = 'personas';
	protected $_primary = 'id';
	
	public function obtenerPersona($id){
		$id = (int)$id;
		$row = $this->fetchRow('id = ' . $id);
		if (!$row){
			throw new Exception("Count not find row $id");
		}
		return $row->toArray();
	}
	
	public function agregarPersona($nombre, $apellido, $rol){
		$data = array('nombre' => $nombre, 'apellido' => $apellido, 'rol' => $rol);
		$this->insert($data);
	}
	
	public function actualizarPersona($id, $titulo, $autor){
		$data = array('titulo' => $titulo, 'autor' => $autor,);
		$this->update($data, 'id = '. (int)$id);
	}
	
	public function eliminarPersona($id){
		$this->delete('id =' . (int)$id);
	}	

}

