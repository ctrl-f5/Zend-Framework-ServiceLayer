<?php

namespace Ctrl\Controller;

class Action extends \Zend_Controller_Action
{
    protected $_services;

    public function init()
    {
        parent::init();
        $this->_services = \Ctrl\Service\ServiceBroker::getInstance();
    }
}