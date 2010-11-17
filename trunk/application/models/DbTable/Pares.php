<?php

/**
 * Pares
 * 
 * @author john
 * @version 
 */

require_once 'Zend/Db/Table/Abstract.php';

class Model_DBTable_Pares extends Zend_Db_Table_Abstract {
	/**
	 * The default table name 
	 */
	protected $_name = 'pares';
	protected $_primary = 'id';
	
	//protected $_dependentTables = array('Model_DBTable_Pasantias', 'Model_DBTable_Practicas','Model_DBTable_Beneficios','Model_DBTable_Convenios');
	
	protected $_referenceMap    = array(
        'Persona' => array(
            'columns'           => array('id_persona'),
            'refTableClass'     => 'Model_DBTable_Persona',
            'refColumns'        => array('id')
        )
    );
    
	public function obtenerPar($id){
		$id = (int)$id;
		$row = $this->fetchRow('id = ' . $id);
		if (!$row){
			throw new Exception("Count not find row $id");
		}
		return $row->toArray();
	}
	
	public function agregarPar($id, $id_persona, $ano, $periodo, $semestre, $pais_origen, $institucion_origen, $duracion, $tipo_par, $proyecto, $unidad){
		$data = array('id' => $id, 'id_persona' => $id_persona, 'ano' => $ano, 'periodo' => $periodo, 'semestre' => $semestre, 'pais_origen' => $pais_origen, 'institucion_origen' => $institucion_origen, 'duracion' => $duracion, 'tipo_par' => $tipo_par, 'proyecto' => $proyecto, 'unidad' => $unidad);
		$this->insert($data);
	}
	
	public function editarPar($id, $id_persona, $ano, $periodo, $semestre, $pais_origen, $institucion_origen, $duracion, $tipo_par, $proyecto, $unidad){
		$data = array('id' => $id, 'id_persona' => $id_persona, 'ano' => $ano, 'periodo' => $periodo, 'semestre' => $semestre, 'pais_origen' => $pais_origen, 'institucion_origen' => $institucion_origen, 'duracion' => $duracion, 'tipo_par' => $tipo_par, 'proyecto' => $proyecto, 'unidad' => $unidad);
		$this->update($data, 'id = '. (int)$id);
	}
	
	public function borrarPar($id){
		$this->delete('id =' . (int)$id);
	}
}

