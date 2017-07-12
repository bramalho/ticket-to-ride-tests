<?php

abstract class AbstractEnum
{
    private static $_constCacheArray = null;

    public static function getConstants()
    {
        if (self::$_constCacheArray == null) {
            self::$_constCacheArray = array();
        }
        $calledClass = get_called_class();
        if (!array_key_exists($calledClass, self::$_constCacheArray)) {
            $reflect = new \ReflectionClass($calledClass);
            self::$_constCacheArray[$calledClass] = $reflect->getConstants();
        }
        return self::$_constCacheArray[$calledClass];
    }
}
