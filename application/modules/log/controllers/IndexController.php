<?php

use MacqMod\Log as Log;

class Log_IndexController extends Zend_Controller_Action
{
	public function indexAction()
	{
	    $test = new Log\Model\Test();
        $testDbTable = new Log\Model\DbTable\Test();
	    var_dump($test);
	    var_dump($testDbTable);
	}
}