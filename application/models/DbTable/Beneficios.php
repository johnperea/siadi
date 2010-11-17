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
	
	
	//protected $_dependentTables = array('Model_DBTable_Pasantias', 'Model_DBTable_Practicas','Model_DBTable_Beneficios','Model_DBTable_Convenios');
	
	protected $_referenceMap    = array(
        'Pasantia' => array(
            'columns'           => array('id_pasantia'),
            'refTableClass'     => 'Model_DBTable_Pasantia',
            'refColumns'        => array('id')
        ),
        'Practica' => array(
            'columns'           => array('id_practica'),
            'refTableClass'     => 'Model_DBTable_Practica',
            'refColumns'        => array('id')
        ),
        'Evento' => array(
            'columns'           => array('id_evento'),
            'refTableClass'     => 'Model_DBTable_evento',
            'refColumns'        => array('id')
        ),
        'Curso' => array(
            'columns'           => array('id_curso'),
            'refTableClass'     => 'Model_DBTable_Curso',
            'refColumns'        => array('id')
        ),
        'Capacitacion' => array(
            'columns'           => array('id_capacitacion'),
            'refTableClass'     => 'Model_DBTable_Capacitacion',
            'refColumns'        => array('id')
        ),
        'Persona' => array(
            'columns'           => array('id_persona'),
            'refTableClass'     => 'Model_DBTable_Persona',
            'refColumns'        => array('id')
        )
    );
	
	public function obtenerBeneficio($id){
		$id = (int)$id;
		$row = $this->fetchRow('id = ' . $id);
		if (!$row){
			throw new Exception("Count not find row $id");
		}
		return $row->toArray();
	}
	
	public function insertarBeneficio($id, $nombre, $valor, $unidad_fuente, $id_persona, $tipo, $id_pasantia, $id_practica, $id_evento, $id_curso, $id_capacitacion ){
		$data = array('id' => $id, 'nombre' => $nombre,'valor' => $valor,'unidad_fuente' => $unidad_fuente, 
					  'id_persona' => $id_persona, 'tipo' => $tipo, 'id_pasantia' => $id_pasantia, 'id_practica' => $id_practica, 'id_evento' => $id_evento, 'id_curso' => $id_curso, 'id_capacitacion' => $id_capacitacion);
		$this->insert($data);
	}
	
	public function modificarBeneficio($id, $nombre, $valor, $unidad_fuente, $id_persona, $tipo, $id_pasantia, $id_practica, $id_evento, $id_curso, $id_capacitacion ){
		$data = array('id' => $id, 'nombre' => $nombre,'valor' => $valor,'unidad_fuente' => $unidad_fuente, 
					  'id_persona' => $id_persona, 'tipo' => $tipo, 'id_pasantia' => $id_pasantia, 'id_practica' => $id_practica, 'id_evento' => $id_evento, 'id_curso' => $id_curso, 'id_capacitacion' => $id_capacitacion);
		$this->update($data, 'id = '. (int)$id);
	}
	
	public function removerBeneficio($id){
		$this->delete('id =' . (int)$id);
	}	

}

