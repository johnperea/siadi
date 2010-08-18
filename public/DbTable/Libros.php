<?php

/**
 * Libros
 *  
 * @author Administrador
 * @version 
 */

require_once 'Zend/Db/Table/Abstract.php';

class Model_DBTable_Libros extends Zend_Db_Table_Abstract {
	/**
	 * The default table name 
	 */
	protected $_name = 'libros';
	
	public function getLibro($id){
		$id = (int)$id;
		$row = $this->fetchRow('id = ' . $id);
		if (!$row){
			throw new Exception("Count not find row $id");
		}
		return $row->toArray();
	}
	
	public function addLibro($titulo, $autor){
		$data = array('titulo' => $titulo, 'autor' => $autor,);
		$this->insert($data);
	}
	
	public function updateLibro($id, $titulo, $autor){
		$data = array('titulo' => $titulo, 'autor' => $autor,);
		$this->update($data, 'id = '. (int)$id);
	}
	
	public function deleteLibro($id){
		$this->delete('id =' . (int)$id);
	}	
}