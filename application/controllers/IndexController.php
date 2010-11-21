<?php

class IndexController extends \Ctrl\Controller\Action
{
    public function indexAction()
    {
        echo 'test';
        $factory = new \Ctrl\Service\Factory\ServiceFactory();
        var_dump($factory);
        echo 'test';
    }

    public function testServicesAction()
    {
        try {

            $this->view->service1 = Log_Service_Test::factory(array('test' => 'my first service'));

            $this->view->service2 = $this->_services->getService(Log_Service_Test::getType(), array('optionsTest' => 'viaBroker! > these options will be set'));

            $this->view->service3 = $this->_services->getService(Log_Service_Test::getType(), array('second' => 'viaBroker! > these options will be ignored'));

            $this->view->service4 = $this->_services->getLocalService(Log_Service_Test::getType(), array('third' => 'viaBroker! --local'));

        } catch (Exception $e) {
            $this->view->exception = $e;
        }
    }
}