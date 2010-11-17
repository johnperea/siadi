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
	
	protected $_dependentTables = array('Model_DBTable_Beneficios');
	
	protected $_referenceMap    = array(
        'Persona' => array(
            'columns'           => array('id_persona'),
            'refTableClass'     => 'Model_DBTable_Persona',
            'refColumns'        => array('id')
        ),
        'Convenio' => array(
            'columns'           => array('id_convenio'),
            'refTableClass'     => 'Model_DBTable_Convenio',
            'refColumns'        => array('id')
        )
    );
	
	public function obtenerPractica($id){
		$id = (int)$id;
		$row = $this->fetchRow('id = ' . $id);
		if (!$row){
			throw new Exception("Count not find row $id");
		}
		return $row->toArray();
	}
	
	public function insertarPractica($id, $id_persona, $id_convenio, $ano, $periodo, $semestre, $pais_origen, $institucion_origen, $pais_destino, $institucion_destino, $duracion, $unidad, $programa, $remuneracion, $cantidad ){
		$data = array('id' => $id, 'id_persona' => $id_persona, 'ano' => $ano, 'periodo' => $periodo, 'semestre' => $semestre, 'pais_origen' => $pais_origen, 'institucion_origen' => $institucion_origen, 'pais_destino' => $pais_destino, 'institucion_destino' => $institucion_destino, 'duracion' => $duracion, 'unidad' => $unidad, 'programa' => $programa, 'remuneracion' => $remuneracion, 'cantidad' => $cantidad);
		$this->insert($data);
	}
	
	public function modificarPractica($id, $id_persona, $ano, $periodo, $semestre, $pais_origen, $institucion_origen, $pais_destino, $institucion_destino, $duracion, $unidad, $programa, $remuneracion, $cantidad){
		$data = array('id' => $id, 'id_persona' => $id_persona, 'ano' => $ano, 'periodo' => $periodo, 'semestre' => $semestre, 'pais_origen' => $pais_origen, 'institucion_origen' => $institucion_origen, 'pais_destino' => $pais_destino, 'institucion_destino' => $institucion_destino, 'duracion' => $duracion, 'unidad' => $unidad, 'programa' => $programa, 'remuneracion' => $remuneracion, 'cantidad' => $cantidad);
		$this->update($data, 'id = '. (int)$id);
	}
	
	public function removerPractica($id){
		$this->delete('id =' . (int)$id);
	}	

}

