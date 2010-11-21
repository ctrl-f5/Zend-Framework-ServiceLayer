<?php

namespace Ctrl\Service\Factory;

interface IServiceFactory
{
    function setOptions(array $options);
    function getOptions();
    function buildService($className, $options = array());
}