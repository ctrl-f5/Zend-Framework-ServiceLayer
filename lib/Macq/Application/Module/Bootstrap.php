<?php

namespace Macq\Application\Module;

class Bootstrap extends \Zend_Application_Module_Bootstrap
{
	public function __construct($application)
	{
	    $r = new \ReflectionClass(get_called_class());
	    $path = dirname($r->getFileName());
		$this->setResourceLoader(new Autoloader(array(
	        'basePath' => $path,
			'namespace' => $this->getAppNamespace()
	    )));
		parent::__construct($application);
	}
}