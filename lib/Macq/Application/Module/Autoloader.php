<?php

namespace Macq\Application\Module;

class Autoloader extends \Zend_Loader_Autoloader_Resource
{
    protected $_moduleNamespace;

    public function __construct($options = array())
	{
	    $this->_moduleNamespace = $options['namespace'];
	    $options['namespace'] = 'MacqMod\\'.$this->_moduleNamespace;
		parent::__construct($options);
		$this->_initDefaultResourceTypes();
	}

	protected function _initDefaultResourceTypes()
	{
		$this->addResourceTypes($this->_getDefaultResources());
		$this->setDefaultResourceType('model');
	}

	protected function _getDefaultResources()
	{
	    $resources = array(
            'dbtable' => array(
                'namespace' => 'MacqMod\*\Model\DbTable',
                'path'      => 'core/models/DbTable'
            ),
            'mappers' => array(
                'namespace' => 'MacqMod\*\Model\Mapper',
                'path'      => 'core/models/mappers'
            ),
            'form'    => array(
                'namespace' => 'MacqMod\*\Form',
                'path'      => 'forms'
            ),
            'model'   => array(
                'namespace' => 'MacqMod\*\Model',
                'path'      => 'core/models'
            ),
            'plugin'  => array(
                'namespace' => 'MacqMod\*\Plugin',
                'path'      => 'plugins'
            ),
            'service' => array(
                'namespace' => 'MacqMod\*\Service',
                'path'      => 'core/services'
            ),
            'viewhelper' => array(
                'namespace' => 'MacqMod\*\View\Helper',
                'path'      => 'views/helpers'
            ),
            'viewfilter' => array(
                'namespace' => 'MacqMod\*\View\Filter',
            	'path'      => 'views/filters'
            )
        );
	    $result = array();
        foreach ($resources as $n => $r) {
            if (array_key_exists('namespace', $r)) {
                $r['namespace'] = str_replace('*', $this->_moduleNamespace, $r['namespace']);
            }
            $result[$n] = $r;
        }
        return $result;
	}

	public function addResourceType($type, $path, $namespace = null)
	{
	    $type = strtolower($type);
        if (!isset($this->_resourceTypes[$type])) {
            if (null === $namespace) {
                require_once 'Zend/Loader/Exception.php';
                throw new Zend_Loader_Exception('Initial definition of a resource type must include a namespace');
            }

            if (false !== strpos($namespace, '\\') || false !== strpos($namespace, '*')) {
                $namespace = str_replace('*', $this->_moduleNamespace, $namespace);
                $this->_resourceTypes[$type] = array(
                    'namespace' => $namespace,
                );
            }
        }
        return parent::addResourceType($type, $path, $namespace);
	}

	public function getClassPath($class)
	{
	    $resourceTypes = $this->getResourceTypes();
	    foreach ($resourceTypes as $t => $d) {
	        if (false !== strpos($class, $d['namespace'])) {
	            $path = str_replace($d['namespace'], $d['path'], $class);
	            $path = str_replace('\\', DIRECTORY_SEPARATOR, $path).'.php';
	            return $path;
	        }
	    }
	    return parent::getClassPath($class);
	}

	public function autoload($class)
    {
        $classPath = $this->getClassPath($class);
        if (false !== $classPath) {
            return require_once $classPath;
        }
        return false;
    }
}