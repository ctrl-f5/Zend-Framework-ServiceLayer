<?php

class Log_IndexController extends \Ctrl\Controller\Action
{

    public function indexAction()
    {
        $service = Log_Service_Test::factory(array('test' => 'ik Ben er'));
        d($service);
        d($service->getOptions());
        
        $service2 = $this->_services->getService(Log_Service_Test::getType(), array('optionsTest' => 'viaBroker!'));
        d($service2);
        
        $service3 = $this->_services->getService(Log_Service_Test::getType(), array('second' => 'viaBroker!'));
        d($service3);
        
        $service4 = $this->_services->getLocalService(Log_Service_Test::getType(), array('third' => 'viaBroker! --local'));
        d($service4);
    }
}