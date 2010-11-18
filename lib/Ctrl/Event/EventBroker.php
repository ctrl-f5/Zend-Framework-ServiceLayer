<?php

namespace Ctrl\Event;

class EventBroker
{
    private static $_instance;

    protected $_options = array();

    public static function getInstance(array $options = array())
    {
        $class = get_called_class();
        if (!(self::$_instance instanceof $class)) {
            self::$_instance = new $class($options);
        }
        return self::$_instance;
    }

    protected function __construct(array $options = array())
    {
        $this->_setOptions($options);
    }

    protected function _setOption(array $options)
    {
        $this->_options = $options;
        return $this;
    }

    public function getOptions()
    {
        return $this->_options;
    }

    public function registerSubscriber(ISubscriber $subscriber)
    {
        //TODO: also add a subject???
    }
}