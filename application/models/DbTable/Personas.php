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
	
	public function obtenerPersona($id){
		$id = (int)$id;
		$row = $this->fetchRow('id = ' . $id);
		if (!$row){
			throw new Exception("Count not find row $id");
		}
		return $row->toArray();
	}
	
	public function agregarPersona($id, $tipoId, $rol, $nombre, $apellidos, $sexo, $edad, $direccion, $ciudad , $telefono , $correo, $usuario, $contrasena ){
		$data = array('id' => $id, 'tipoId' => $tipoId, 'rol' => $rol, 'nombre' => $nombre, 'apellidos' => $apellidos, 'sexo' => $sexo, 'edad' => $edad, 'direccion' => $direccion, 'ciudad' => $ciudad, 'telefono' => $telefono, 'correo' => $correo, 'usuario' => $usuario, 'contrasena' => $contrasena);
		$this->insert($data);
	}
	
	public function editarPersona($id, $tipoId, $rol, $nombre, $apellidos, $sexo, $edad, $direccion, $ciudad, $telefono, $correo, $usuario, $contrasena){
		$data = array('id' => $id, 'tipoId' => $tipoId, 'rol' => $rol, 'nombre' => $nombre, 'apellidos' => $apellidos, 'sexo' => $sexo, 'edad' => $edad, 'direccion' => $direccion, 'ciudad' => $ciudad, 'telefono' => $telefono, 'correo' => $correo, 'usuario' => $usuario, 'contrasena' => $contrasena);
		$this->update($data, 'id = '. (int)$id);
	}
	
	public function borrarPersona($id){
		$this->delete('id =' . (int)$id);
	}	

}

