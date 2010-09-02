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
	public function footer($base) {
		// TODO Auto-generated Zend_View_Helper_footer::footer() helper 
		$html = "
		<div align='center'>Desarrollado por:<br>
          <img width='422px' height='78px' border='0px' align='top' src='";
		
		$html = $html.$base;
		
		$html = $html."
		/image/ing_softbanner.png'><br>
		<img src='http://framework.zend.com/images/PoweredBy_ZF_4LightBG.png' />
		<br>
         VERSION BETA 
         </div>
		";
		
		echo $html;
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

