
<?php
class Bootstrap extends Zend_Application_Bootstrap_Bootstrap{

protected function _initAutoload(){
		
		$moduleLoader = new Zend_Application_Module_Autoloader(array('namespace' => '', 'basePath' => APPLICATION_PATH));		
		
		return $moduleLoader;
	}
	
	protected function _initView(){
		$this->bootstrap('layout');
		$layout = $this->getResource('layout');
		$view = $layout->getView();
		$view->doctype('XHTML1_STRICT');
		$view->headMeta()->appendHttpEquiv('Content-Type', 'text/html;charset=iso-8859-1');
		$view->headTitle()->setSeparator(' - ');
		$view->headTitle('.: SIADI :.');
		
		//$view->baseUrl = Zend_Registry::get('config')->root_path;
		$view->addHelperPath("ZendX/JQuery/View/Helper", "ZendX_JQuery_View_Helper");
		
		$viewRenderer = new Zend_Controller_Action_Helper_ViewRenderer();
		$viewRenderer->setView($view);
		Zend_Controller_Action_HelperBroker::addHelper($viewRenderer);

		return $view;
	}
	
}
?>
