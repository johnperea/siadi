<?php

/**
 * Personas
 * 
 * @author john
 * @version 
 */

require_once 'Zend/Db/Table/Abstract.php';

class Model_DBTable_Personas extends Zend_Db_Table_Abstract {
	/**
	 * The default table name 
	 */
	protected $_name = 'personas';
	protected $_primary = 'id';
	protected $_dependentTables = array('Model_DBTable_Pasantias', 'Model_DBTable_Practicas','Model_DBTable_Beneficios','Model_DBTable_Convenios','Model_DBTable_Becas','Model_DBTable_Capacitaciones','Model_DBTable_Pares', 'Model_DBTable_Egresados','Model_DBTable_Eventos','Model_DBTable_CursosIdiomas','Model_DBTable_ProfesoresAdmon');
	
	protected $_referenceMap    = array(
        'Rol' => array(
            'columns'           => array('id_rol'),
            'refTableClass'     => 'Model_DBTable_Rol',
            'refColumns'        => array('id')
        )
    );
	
	public function obtenerPersona($id){
		$id = (int)$id;
		$row = $this->fetchRow('id = ' . $id);
		if (!$row){
			throw new Exception("Count not find row $id");
		}
		return $row->toArray();
	}
	
	public function agregarPersona($id, $id_tipo, $id_rol, $nombre, $apellidos, $sexo, $edad, $direccion, $ciudad , $telefono , $correo, $usuario, $contrasena ){
		$data = array('id' => $id, 'id_tipo' => $id_tipo, 'id_rol' => $id_rol, 'nombre' => $nombre, 'apellidos' => $apellidos, 'sexo' => $sexo, 'edad' => $edad, 'direccion' => $direccion, 'ciudad' => $ciudad, 'telefono' => $telefono, 'correo' => $correo, 'usuario' => $usuario, 'contrasena' => $contrasena);
		$this->insert($data);
	}
	
	public function editarPersona($id, $id_tipo, $id_rol, $nombre, $apellidos, $sexo, $edad, $direccion, $ciudad , $telefono , $correo, $usuario, $contrasena ){
		$data = array('id' => $id, 'id_tipo' => $id_tipo, 'id_rol' => $id_rol, 'nombre' => $nombre, 'apellidos' => $apellidos, 'sexo' => $sexo, 'edad' => $edad, 'direccion' => $direccion, 'ciudad' => $ciudad, 'telefono' => $telefono, 'correo' => $correo, 'usuario' => $usuario, 'contrasena' => $contrasena);
		$this->update($data, 'id = '. (int)$id);
	}
	
	public function borrarPersona($id){
		$this->delete('id =' . (int)$id);
	}	

	public function usuarioPersona($usuario){
		
		$rows = $this->fetchAll(
				$this->select()
				->where('usuario = ?', 'jp')
				
		);
		return $rows->toArray();
		
		
		
		
		
		
	}
}

