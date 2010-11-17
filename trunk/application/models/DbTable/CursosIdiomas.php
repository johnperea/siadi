<?php

/**
 * CursosIdiomas
 * 
 * @author john
 * @version 
 */

require_once 'Zend/Db/Table/Abstract.php';

class Model_DBTable_CursosIdiomas extends Zend_Db_Table_Abstract {
	/**
	 * The default table name 
	 */
	protected $_name = 'cursos_idiomas';
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
    
    
    public function obtenerCurso($id){
		$id = (int)$id;
		$row = $this->fetchRow('id = ' . $id);
		if (!$row){
			throw new Exception("Count not find row $id");
		}
		return $row->toArray();
	}
	
	public function insertarCurso($id, $id_persona, $id_convenio, $ano, $periodo, $semestre, $pais_origen, $institucion_origen, $pais_destino, $institucion_destino, $unidad, $duracion, $motivos, $nivel){
		$data = array('id' => $id,'id_persona' => $id_persona, 'id_convenio' => $id_convenio, 'ano' => $ano, 'periodo' => $periodo, 'semestre' => $semestre,'pais_origen' => $pais_origen,'institucion_origen' => $institucion_origen, 'pais_destino' => $pais_destino, 'institucion_destino' => $institucion_destino,
					  'unidad' => $unidad, 'duracion' => $duracion, 'motivos' => $motivos, 'nivel' => $nivel);
		$this->insert($data);
	}
	
	public function modificarCurso($id, $id_persona, $id_convenio, $ano, $periodo, $semestre, $pais_origen, $institucion_origen, $pais_destino, $institucion_destino, $unidad, $duracion, $motivos, $nivel){
		$data = array('id' => $id,'id_persona' => $id_persona, 'id_convenio' => $id_convenio, 'ano' => $ano, 'periodo' => $periodo, 'semestre' => $semestre,'pais_origen' => $pais_origen,'institucion_origen' => $institucion_origen, 'pais_destino' => $pais_destino, 'institucion_destino' => $institucion_destino,
					  'unidad' => $unidad, 'duracion' => $duracion, 'motivos' => $motivos, 'nivel' => $nivel);
		$this->update($data, 'id = '. (int)$id);
	}
	
	public function removerCurso($id){
		$this->delete('id =' . (int)$id);
	}	
	
}

