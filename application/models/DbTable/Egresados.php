<?php

/**
 * Egresados
 * 
 * @author john
 * @version 
 */

require_once 'Zend/Db/Table/Abstract.php';

class Model_DBTable_Egresados extends Zend_Db_Table_Abstract {
	/**
	 * The default table name 
	 */
	protected $_name = 'egresados';
	protected $_primary = 'id';
	
	//protected $_dependentTables = array('Model_DBTable_Pasantias', 'Model_DBTable_Practicas','Model_DBTable_Beneficios','Model_DBTable_Convenios');
	
	protected $_referenceMap    = array(
        'Persona' => array(
            'columns'           => array('id_persona'),
            'refTableClass'     => 'Model_DBTable_Persona',
            'refColumns'        => array('id')
        )
    );
    
	public function obtenerEgresado($id){
		$id = (int)$id;
		$row = $this->fetchRow('id = ' . $id);
		if (!$row){
			throw new Exception("Count not find row $id");
		}
		return $row->toArray();
	}
	
	public function agregarEgresado($id, $id_persona, $ano_fin_estudios, $universidad, $titulo, $programa, $unidad, $ciudad, $labora, $nombre_empresa){
		$data = array('id' => $id, 'id_persona' => $id_persona, 'ano_fin_estudios' => $ano_fin_estudios, 'universidad' => $universidad, 'titulo' => $titulo, 'programa' => $programa, 'unidad' => $unidad, 'ciudad' => $ciudad, 'labora' => $labora, 'nombre_empresa' => $nombre_empresa);
		$this->insert($data);
	}
	
	public function editarEgresado($id, $id_persona, $ano_fin_estudios, $universidad, $titulo, $programa, $unidad, $ciudad, $labora, $nombre_empresa){
		$data = array('id' => $id, 'id_persona' => $id_persona, 'ano_fin_estudios' => $ano_fin_estudios, 'universidad' => $universidad, 'titulo' => $titulo, 'programa' => $programa, 'unidad' => $unidad, 'ciudad' => $ciudad, 'labora' => $labora, 'nombre_empresa' => $nombre_empresa);
		$this->update($data, 'id = '. (int)$id);
	}
	
	public function borrarEgresado($id){
		$this->delete('id =' . (int)$id);
	}

}

