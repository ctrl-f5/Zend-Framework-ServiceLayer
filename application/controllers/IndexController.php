<?php

class IndexController extends \Ctrl\Controller\Action
{
    public function indexAction()
    {

    }

    public function testServicesAction()
    {
        try {

            $this->view->service1 = Log_Service_Test::factory(array('test' => 'my first service'));

            $this->view->service2 = $this->_services->getService(Log_Service_Test::getType(), array('optionsTest' => 'viaBroker!'));

            $this->view->service3 = $this->_services->getService(Log_Service_Test::getType(), array('second' => 'viaBroker!'));

            $this->view->service4 = $this->_services->getLocalService(Log_Service_Test::getType(), array('third' => 'viaBroker! --local'));

        } catch (Exception $e) {
            $this->view->exception = $e;
        }
    }
}