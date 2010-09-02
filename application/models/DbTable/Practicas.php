<?php

/**
 * Personas
 * 
 * @author john
 * @version 
 */

require_once 'Zend/Db/Table/Abstract.php';

class Model_DBTable_Practicas extends Zend_Db_Table_Abstract {
	/**
	 * The default table name 
	 */
	protected $_name = 'practicas';
	protected $_primary = 'id';
	
	public function obtenerPractica($id){
		$id = (int)$id;
		$row = $this->fetchRow('id = ' . $id);
		if (!$row){
			throw new Exception("Count not find row $id");
		}
		return $row->toArray();
	}
	
	public function insertarPractica($id, $idPersona, $ano, $periodo, $semestre, $pais_origen, $institucion_origen, $pais_destino, $institucion_destino, $duracion, $faculdad_dependencia, $programa, $remuneracion, $cantidad ){
		$data = array('id' => $id, 'idPersona' => $idPersona, 'ano' => $ano, 'periodo' => $periodo, 'semestre' => $semestre, 'pais_origen' => $pais_origen, 'institucion_origen' => $institucion_origen, 'pais_destino' => $pais_destino, 'institucion_destino' => $institucion_destino, 'duracion' => $duracion, 'facultad_dependencia' => $faculdad_dependencia, 'programa' => $programa, 'remuneracion' => $remuneracion, 'cantidad' => $cantidad);
		$this->insert($data);
	}
	
	public function modificarPractica($id, $idPersona, $ano, $periodo, $semestre, $pais_origen, $institucion_origen, $pais_destino, $institucion_destino, $duracion, $faculdad_dependencia, $programa, $remuneracion, $cantidad){
		$data = array('id' => $id, 'idPersona' => $idPersona, 'ano' => $ano, 'periodo' => $periodo, 'semestre' => $semestre, 'pais_origen' => $pais_origen, 'institucion_origen' => $institucion_origen, 'pais_destino' => $pais_destino, 'institucion_destino' => $institucion_destino, 'duracion' => $duracion, 'facultad_dependencia' => $faculdad_dependencia, 'programa' => $programa, 'remuneracion' => $remuneracion, 'cantidad' => $cantidad);
		$this->update($data, 'id = '. (int)$id);
	}
	
	public function removerPractica($id){
		$this->delete('id =' . (int)$id);
	}	

}

