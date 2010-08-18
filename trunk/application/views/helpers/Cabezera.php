<?php
/**
 *
 * @author john
 * @version 
 */
require_once 'Zend/View/Interface.php';

/**
 * Cabezera helper
 *
 * @uses viewHelper Zend_View_Helper
 */
class Zend_View_Helper_Cabezera {
	
	/**
	 * @var Zend_View_Interface 
	 */
	public $view;
	
	/**
	 * 
	 */
	public function cabezera() {
		// TODO Auto-generated Zend_View_Helper_Cabezera::cabezera() helper 
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

