<?php

/**
 * Capacitaciones
 * 
 * @author john
 * @version 
 */

require_once 'Zend/Db/Table/Abstract.php';

class Model_DBTable_Capacitaciones extends Zend_Db_Table_Abstract {
	/**
	 * The default table name 
	 */
	protected $_name = 'capacitaciones';
	protected $_primary = 'id';
	
	protected $_referenceMap    = array(
        'Personas' => array(
            'columns'           => array('id_persona'),
            'refTableClass'     => 'Model_DBTable_Personas',
            'refColumns'        => array('id')
        ),
         'Convenios' => array(
            'columns'           => array('id_convenio'),
            'refTableClass'     => 'Model_DBTable_Convenios',
            'refColumns'        => array('id')
        )
    );
    
    
    public function obtenerCapacitacion($id){
		$id = (int)$id;
		$row = $this->fetchRow('id = ' . $id);
		if (!$row){
			throw new Exception("Count not find row $id");
		}
		return $row->toArray();
	}
	
	public function insertarCapacitacion($id, $id_persona, $id_convenio, $ano, $periodo, $semestre, $pais_destino, $institucion_destino, $programa, $unidad, $duracion, $tipo, $estado, $modalidad){
		$data = array('id' => $id,'id_persona' => $id_persona, 'id_convenio' => $id_convenio, 'ano' => $ano, 'periodo' => $periodo, 'semestre' => $semestre, 'pais_destino' => $pais_destino, 'institucion_destino' => $institucion_destino,
					  'programa' => $programa, 'unidad' => $unidad, 'duracion' => $duracion, 'tipo' => $tipo, 'estado' => $estado, 'modalidad' => $modalidad);
		$this->insert($data);
	}
	
	public function modificarCapacitacion($id, $id_persona, $id_convenio, $ano, $periodo, $semestre, $pais_destino, $institucion_destino, $programa, $unidad, $duracion, $tipo, $estado, $modalidad){
		$data = array('id' => $id,'id_persona' => $id_persona, 'id_convenio' => $id_convenio, 'ano' => $ano, 'periodo' => $periodo, 'semestre' => $semestre, 'pais_destino' => $pais_destino, 'institucion_destino' => $institucion_destino,
					  'programa' => $programa, 'unidad' => $unidad, 'duracion' => $duracion, 'tipo' => $tipo, 'estado' => $estado, 'modalidad' => $modalidad);
		$this->update($data, 'id = '. (int)$id);
	}
	
	public function removerCapacitacion($id){
		$this->delete('id =' . (int)$id);
	}	

}

