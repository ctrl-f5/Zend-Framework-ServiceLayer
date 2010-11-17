<?php

namespace MacqMod\Log\Formatter;

interface IFormatter
{
    public function setData($data);
    public function format();
}