<?php

namespace Ctrl\Service;

interface IServiceBroker
{

    public function getService($type, array $options = array());

    public static function getInstance();

    public function setOptions(array $options);

    public function getOptions();
}