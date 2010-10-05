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
class Zend_View_Helper_MenuBar {
	
	/**
	 * @var Zend_View_Interface 
	 */
	public $view;
	
	/**
	 * 
	 */
	public function MenuBar($base) {
		// TODO Auto-generated Zend_View_Helper_Cabezera::cabezera() helper 
		
		
		
		echo "<a class='menulink' href='".$base."/persona/'>PERSONAS</a>";
		echo "<a class='menulink' href='".$base."/practica/'>PRACTICAS</a>";
		echo "<a class='menulink' href='".$base."/pasantia/'>PASANTIAS</a>";
		echo "<a class='menulink' href='".$base."/beneficio/'>BENEFICIOS</a>";
		
		
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

