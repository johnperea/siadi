<?php

/**
 * Eventos
 * 
 * @author john
 * @version 
 */

require_once 'Zend/Db/Table/Abstract.php';

class Model_DBTable_Eventos extends Zend_Db_Table_Abstract {
	/**
	 * The default table name 
	 */
	protected $_name = 'eventos';
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
        ),
        'TipoEvento' => array(
            'columns'           => array('id_tipo'),
            'refTableClass'     => 'Model_DBTable_TiposEvento',
            'refColumns'        => array('id')
        )
        
    );
    
	public function obtenerEvento($id){
		$id = (int)$id;
		$row = $this->fetchRow('id = ' . $id);
		if (!$row){
			throw new Exception("Count not find row $id");
		}
		return $row->toArray();
	}
	
	public function agregarEvento($id, $id_persona, $id_convenio, $id_tipo, $ano, $periodo, $semestre, $programa, $unidad_origen, $pais_destino, $institucion_destino, $nombre, $duracion, $organizador, $reconocimientos){
		$data = array('id' => $id, 'id_persona' => $id_persona,  'id_convenio' => $id_convenio, 'id_tipo' => $id_tipo, 'ano' => $ano, 'periodo' => $periodo, 'semestre' => $semestre, 'programa' => $programa, 'unidad_origen' => $unidad_origen, 
					  'pais_destino' => $pais_destino, 'institucion_destino' => $institucion_destino, 'nombre' => $nombre, 'duracion' => $duracion, 'organizador' => $organizador, 'reconocimientos' => $reconocimientos);
		$this->insert($data);
	}
	
	public function editarEvento($id, $id_persona, $id_convenio, $id_tipo, $ano, $periodo, $semestre, $programa, $unidad_origen, $pais_destino, $institucion_destino, $nombre, $duracion, $organizador, $reconocimientos){
		$data = array('id' => $id, 'id_persona' => $id_persona,  'id_convenio' => $id_convenio, 'id_tipo' => $id_tipo, 'ano' => $ano, 'periodo' => $periodo, 'semestre' => $semestre, 'programa' => $programa, 'unidad_origen' => $unidad_origen, 
					  'pais_destino' => $pais_destino, 'institucion_destino' => $institucion_destino, 'nombre' => $nombre, 'duracion' => $duracion, 'organizador' => $organizador, 'reconocimientos' => $reconocimientos);
		$this->update($data, 'id = '. (int)$id);
	}
	
	public function borrarEvento($id){
		$this->delete('id =' . (int)$id);
	}

}

