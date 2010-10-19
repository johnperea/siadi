<?php

/**
 * Pasantias
 * 
 * @author john
 * @version 
 */

require_once 'Zend/Db/Table/Abstract.php';

class Model_DBTable_Pasantias extends Zend_Db_Table_Abstract {
	/**
	 * The default table Pasantias
	 */
	protected $_name = 'pasantias';
	protected $_primary = 'id';
	
	public function obtenerPasantia($id){
		$id = (int)$id;
		$row = $this->fetchRow('id = ' . $id);
		if (!$row){
			throw new Exception("Count not find row $id");
		}
		return $row->toArray();
	}

	public function insertarPasantia($id, $idPersona, $ano, $periodo, $semestre, $pais_origen, $institucion_origen, $pais_destino, $institucion_destino, $duracion, $faculdad_dependencia, $programa ){
		$data = array('id' => $id, 'idPersona' => $idPersona, 'ano' => $ano, 'periodo' => $periodo, 'semestre' => $semestre, 'pais_origen' => $pais_origen, 'institucion_origen' => $institucion_origen, 'pais_destino' => $pais_destino, 'institucion_destino' => $institucion_destino, 'duracion' => $duracion, 'facultad_dependencia' => $faculdad_dependencia, 'programa' => $programa);
		$this->insert($data);
	}
	
	public function modificarPasantia($id, $idPersona, $ano, $periodo, $semestre, $pais_origen, $institucion_origen, $pais_destino, $institucion_destino, $duracion, $faculdad_dependencia, $programa ){
		$data = array('id' => $id, 'idPersona' => $idPersona, 'ano' => $ano, 'periodo' => $periodo, 'semestre' => $semestre, 'pais_origen' => $pais_origen, 'institucion_origen' => $institucion_origen, 'pais_destino' => $pais_destino, 'institucion_destino' => $institucion_destino, 'duracion' => $duracion, 'facultad_dependencia' => $faculdad_dependencia, 'programa' => $programa);
		$this->update($data, 'id = '. (int)$id);
	}
	
	public function removerPasantia($id){
		$this->delete('id =' . (int)$id);
	}	

}

