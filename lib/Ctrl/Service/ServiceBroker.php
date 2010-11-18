<?php

namespace Ctrl\Service;

class ServiceBroker implements IServiceBroker
{
    private static $_instance;

    protected $_options = array();
    protected $_services = array();

    public static function getInstance()
    {
        if (!(self::$_instance instanceof ServiceBroker)) {
            self::$_instance = new ServiceBroker();
        }
        return self::$_instance;
    }

    /**
     * Fetches a service from internal storage. Creates the service with $options if it does not exist yet
     *
     * The options parameter is ignored if a service that is allready known
     * is fetched.
     *
     * @see Ctrl\Service.IServiceBroker::getService()
     * @return \Ctrl\Service\Service
     */
    public function getService($type, array $options = array())
    {
        //check type parameter
        if (!is_string($type) || !is_subclass_of($type, '\\Ctrl\\Service\\Service')) {
            throw new InvalidArgumentException('$type must be a classname of a class inheriting from \\Ctrl\\Service\\Service ("' . $type . '" given)');
        }

        //check if we know an instance, create one if not
        if (!array_key_exists($type, $this->_services)) {
            $this->_services[$type] = $type::factory($options);
        }

        //return known instance
        return $this->_services[$type];
    }

    /**
     * Creates a local instance of a service, always using the options passed
     * The created service is not stored withing the broker
     *
     * @return \Ctrl\Service\Service
     */
    public function getLocalService($type, array $options = array())
    {
        //check type parameter
        if (!is_string($type) || !is_subclass_of($type, '\\Ctrl\\Service\\Service')) {
            throw new InvalidArgumentException('$type must be a classname of a class inheriting from \\Ctrl\\Service\\Service ("' . $type . '" given)');
        }

        return $type::factory($options);
    }

    public function setOptions(array $options)
    {
        $this->_options = $options;
    }

    public function getOptions()
    {
        return $this->_options;
    }
}