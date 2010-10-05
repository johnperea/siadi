
<?php
class Bootstrap extends Zend_Application_Bootstrap_Bootstrap{

protected function _initAutoload(){
		
		$moduleLoader = new Zend_Application_Module_Autoloader(array('namespace' => '', 'basePath' => APPLICATION_PATH));		
		
		return $moduleLoader;
	}
	
	protected function _initViewHelpers(){
		$this->bootstrap('layout');
		$layout = $this->getResource('layout');
		$view = $layout->getView();
		$view->doctype('XHTML1_STRICT');
		$view->headMeta()->appendHttpEquiv('Content-Type', 'text/html;charset=iso-8859-1');
		$view->headTitle()->setSeparator(' - ');
		$view->headTitle('.: SIADI :.');
	}
	
}
?>