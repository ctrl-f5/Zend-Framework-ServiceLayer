<?php

namespace Ctrl\Event;

interface IEvent
{
    public function getCode();
    public function getSubject();
    public function getOptions();
}