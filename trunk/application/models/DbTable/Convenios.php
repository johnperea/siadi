<?php

/**
 * Convenios
 * 
 * @author john
 * @version 
 */

require_once 'Zend/Db/Table/Abstract.php';

class Model_DBTable_Convenios extends Zend_Db_Table_Abstract {
	/**
	 * The default table name 
	 */
	protected $_name = 'convenios';
	protected $_primary = 'id';
	
	protected $_dependentTables = array('Model_DBTable_Pasantias', 'Model_DBTable_Practicas','Model_DBTable_Becas','Model_DBTable_Eventos','Model_DBTable_Capacitaciones','Model_DBTable_CursosIdiomas');
	
	protected $_referenceMap    = array(
        'PersonaLocal' => array(
            'columns'           => array('id_persona_local'),
            'refTableClass'     => 'Model_DBTable_Persona',
            'refColumns'        => array('id')
        ),
        'PersonaExterior' => array(
            'columns'           => array('id_persona_exterior'),
            'refTableClass'     => 'Model_DBTable_Persona',
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
	
	public function insertarConvenio($id, $pais_origen, $institucion_origen, $denominacion, $objeto, $lineas_accion, $alcance, $fecha_suscripcion, $id_persona_local, $unidad_local, $id_persona_exterior, $unidad_exterior, $estado){
		$data = array('id' => $id, 'paies_origen' => $pais_origen, 'institucion_origen' => $institucion_origen, 'denominacion' => $denominacion, 'objeto' => $objeto, 'lineas_accion' => $lineas_accion, 'alcance' => $alcance, 'fecha_suscripcion' => $fecha_suscripcion, 
		              'id_persona_local' => $id_persona_local, 'unidad_local' => $unidad_local, 'id_persona_exterior' => $id_persona_exterior, 'unidad_exterior' => $unidad_exterior, 'estado' => $estado);
		$this->insert($data);
	}
	
	public function modificarConvenio($id, $pais_origen, $institucion_origen, $denominacion, $objeto, $lineas_accion, $alcance, $fecha_suscripcion, $id_persona_local, $unidad_local, $id_persona_exterior, $unidad_exterior, $estado){
		$data = array('id' => $id, 'paies_origen' => $pais_origen, 'institucion_origen' => $institucion_origen, 'denominacion' => $denominacion, 'objeto' => $objeto, 'lineas_accion' => $lineas_accion, 'alcance' => $alcance, 'fecha_suscripcion' => $fecha_suscripcion, 
		              'id_persona_local' => $id_persona_local, 'unidad_local' => $unidad_local, 'id_persona_exterior' => $id_persona_exterior, 'unidad_exterior' => $unidad_exterior, 'estado' => $estado);
		$this->update($data, 'id = '. (int)$id);
	}
	
	public function removerConvenio($id){
		$this->delete('id =' . (int)$id);
	}	

}

