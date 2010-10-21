<?php

class Bootstrap extends Zend_Application_Bootstrap_Bootstrap
{
	public function _initRouting()
	{
		$this->bootstrap('frontController');

		$router = Zend_Controller_Front::getInstance()->getRouter();
		$router->addRoute(
			'default',
			new Zend_Controller_Router_Route(
				'/:module/:controller/:action',
				array(
					'module' => 'log',
					'controller' => 'index',
					'action' => 'index'
				)
			)
		);
	}
}