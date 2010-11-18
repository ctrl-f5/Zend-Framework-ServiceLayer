<?php

namespace Ctrl\Event;

interface IEvent
{
    public function getSubject();
    public function getCode();
    public function getOptions();
}