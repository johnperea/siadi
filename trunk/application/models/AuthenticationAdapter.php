<?php
class AuthenticationAdapter implements Zend_Auth_Adapter_Interface{

private $_username = null;
private $_password = null;

public function __construct($username, $password){
$this->_username = $username;
$this->_password = $password;
}

public function authenticate(){
//TODO comprobar si $username y $password estan presentes en la base de datos
...

if(/* Estan presentes*/){
/* $sessionData es una variable con la información que queremos guardar en sessión */

return new Zend_Auth_Result(Zend_Auth_Result::SUCCESS,$sessionData);
}else{
/* Si no esta el $username */
return new Zend_Auth_Result(Zend_Auth_Result::FAILURE_IDENTITY_NOT_FOUND,$sessionData);

/* Si el password es incorrecto */
return new Zend_Auth_Result(Zend_Auth_Result::FAILURE_CREDENTIAL_INVALID,$sessionData);

/* Error en la identificación por otros motivos */
return new Zend_Auth_Result(Zend_Auth_Result::FAILURE,$sessionData);
}
}
}
?>