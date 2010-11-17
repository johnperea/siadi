<?php

/**
 * TiposEvento
 * 
 * @author john
 * @version 
 */

require_once 'Zend/Db/Table/Abstract.php';

class Model_DBTable_TiposEvento extends Zend_Db_Table_Abstract {
	/**
	 * The default table name 
	 */
	protected $_name = 'tipos';
	protected $_primary = 'id';
	
	protected $_dependentTables = array('Model_DBTable_Eventos');
	
	
	public function obtenerPractica($id){
		$id = (int)$id;
		$row = $this->fetchRow('id = ' . $id);
		if (!$row){
			throw new Exception("Count not find row $id");
		}
		return $row->toArray();
	}
	
	public function insertarPractica($id, $nombre ){
		$data = array('id' => $id, 'nombre' => $nombre);
		$this->insert($data);
	}
	
	public function modificarPractica($id, $nombre ){
		$data = array('id' => $id, 'nombre' => $nombre);
		$this->update($data, 'id = '. (int)$id);
	}
	
	public function removerPractica($id){
		$this->delete('id =' . (int)$id);
	}	
	
	
}

