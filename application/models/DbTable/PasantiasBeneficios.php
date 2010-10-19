<?php

/**
 * PasantiasBeneficios
 * 
 * @author john
 * @version 
 */

require_once 'Zend/Db/Table/Abstract.php';

class Model_DBTable_PasantiasBeneficios extends Zend_Db_Table_Abstract {
	/**
	 * The default table name 
	 */
	protected $_name = 'pasantia_beneficio';
	protected $_primary = array('id_pasantia');
	
	public function obtenerBeneficiosPasantia($id){ // Obtiene todos los beneficios por pasantia
		$id = (int)$id;
		
		$row = $this->fetchRow('id_pasantia = ?',3);
		if (!$row){
			throw new Exception("Count not find row $id");
		}
		return $row->toArray();
		//return $row;
	}
	
	public function obtenerPasantiasBeneficio($id){ // Obtiene todos las pasantias por beneficio
		$id = (int)$id;
		$row = $this->fetchRow('id_beneficio = ' . $id);
		if (!$row){
			throw new Exception("Count not find row $id");
		}
		return $row->toArray();
	}
	
	public function insertarBeneficioPasantia($p, $b , $cantidad){
		$data = array('id_pasasntia' => $p, 'id_beneficio' => $b, 'cantidad'=> $cantidad);
		$this->insert($data);
	}
	
	
	public function removerBeneficio($p, $b ){
		$this->delete('id_pasantia =' . (int)$p . 'id_beneficio'.(int)$b);
	}	

}

