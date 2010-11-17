<?php

class ErrorController extends Zend_Controller_Action
{

    public function errorAction()
    {
        $errors = $this->_getParam('error_handler');
        
        //log to php error file (usefull for debugging controller testcases)
        if (in_array(APPLICATION_ENV, array('development', 'testing')) && is_object($errors) && $errors->exception instanceof Exception) {
            d($errors->exception->getMessage());
            
            d($errors->exception->getTraceAsString());
        }
    }
}