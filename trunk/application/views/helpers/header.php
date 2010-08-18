<?php
/**
 *
 * @author john
 * @version 
 */
require_once 'Zend/View/Interface.php';

/**
 * header helper
 *
 * @uses viewHelper Zend_View_Helper
 */
class Zend_View_Helper_header {
	
	/**
	 * @var Zend_View_Interface 
	 */
	public $view;
	
	/**
	 * 
	 */
	public function header() {
		// TODO Auto-generated Zend_View_Helper_header::header() helper 
		
		echo "<h1>CABECERA</h1>";
		return null;
	}
	
	/**
	 * Sets the view field 
	 * @param $view Zend_View_Interface
	 */
	public function setView(Zend_View_Interface $view) {
		$this->view = $view;
	}
}

