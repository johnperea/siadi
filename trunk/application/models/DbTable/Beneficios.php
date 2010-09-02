<?php

/**
 * Beneficios
 * 
 * @author john
 * @version 
 */

require_once 'Zend/Db/Table/Abstract.php';

class Model_DBTable_Beneficios extends Zend_Db_Table_Abstract {
	/**
	 * The default table name 
	 */
	protected $_name = 'beneficios';
	protected $_primary = 'id';
	
	public function obtenerBeneficio($id){
		$id = (int)$id;
		$row = $this->fetchRow('id = ' . $id);
		if (!$row){
			throw new Exception("Count not find row $id");
		}
		return $row->toArray();
	}
	
	public function insertarBeneficio($id, $nombre ){
		$data = array('id' => $id, 'nombre' => $nombre);
		$this->insert($data);
	}
	
	public function modificarBeneficio($id, $nombre ){
		$data = array('id' => $id, 'nombre' => $nombre);
		$this->update($data, 'id = '. (int)$id);
	}
	
	public function removerBeneficio($id){
		$this->delete('id =' . (int)$id);
	}	

}

