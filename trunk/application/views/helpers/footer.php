<?php
/**
 *
 * @author john
 * @version 
 */
require_once 'Zend/View/Interface.php';

/**
 * footer helper
 *
 * @uses viewHelper Zend_View_Helper
 */
class Zend_View_Helper_footer {
	
	/**
	 * @var Zend_View_Interface 
	 */
	public $view;
	
	/**
	 * 
	 */
	public function footer() {
		// TODO Auto-generated Zend_View_Helper_footer::footer() helper 
		echo "<h1>PIECERA</h1>";
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

