<?php

namespace Core;

class App
{
    protected static $container;

    public static function get($service)
    {
        return static::getContainer()->getService($service);
    }

    public static function getContainer(): ServiceContainer
    {
        return static::$container;
    }

    public static function setContainer($container)
    {
        static::$container = $container;
    }
}
