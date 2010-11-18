<?php

namespace Ctrl\Event;

interface ISubscriber
{
    function raiseEvent(IEvent $event);
}