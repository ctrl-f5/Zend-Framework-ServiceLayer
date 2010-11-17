<?php

namespace MacqMod\Log\Service;

use \Macq\Service;

class FileManager extends \Macq\Service\Service
{
    /**
     * Constructs a FileManager instance
     *
     * @param array $options
     * @return MacqMod\Log\Service\FileManager
     */
    public static function factory(array $options = array())
    {
        $instance = parent::factory();
    }
}