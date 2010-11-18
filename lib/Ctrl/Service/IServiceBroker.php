<?php

namespace Ctrl\Service;

interface IServiceBroker
{
    public static function getInstance();

    public function getService($type, array $options = array());

    public function setOptions(array $options);

    public function getOptions();
}