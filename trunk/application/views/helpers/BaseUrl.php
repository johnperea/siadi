<?php 
class Zend_View_Helper_BaseUrl{

	public function baseUrl(){
		//Definimos la url base de la aplicaci�n
		$url = Zend_Controller_Front::getInstance()->setBaseUrl("http://localhost/siadi/public");
		//Devolvemos la url base de la aplicaci�n
		return $url->getBaseUrl();
	}
}
?>