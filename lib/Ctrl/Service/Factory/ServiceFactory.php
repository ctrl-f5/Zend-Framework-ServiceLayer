<?php

namespace Ctrl\Service\Factory;

class ServiceFactory implements IServiceFactory
{
    protected $_options;

    public function __construc(array $options = array())
    {
        $this->setOptions($options);
    }

    public function setOptions(array $options)
    {
        $this->_options = $options;
        return $this;
    }

    public function getOptions()
    {
        return $this->_options;
    }

    public function buildService($className, $options = array())
    {
        if (is_subclass_of($className, '\Ctrl\Service\IService')) {
            return $className::factory($options);
        }
        throw new InvalidArgumentException('$className should be a class implementing \\Ctrl\\Service\\IService ('.$className.')');
    }
}