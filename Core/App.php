<?php

namespace Core;

class App
{
    protected static $contanier;
    public static function setContanier($contanier)
    {
        static::$contanier = $contanier;

    }
    public static function contanier()
    {
        return static::$contanier;
    }
    public static function bind($key, $resolver)
    {
        static::contanier()->bind($key, $resolver);
    }
    public static function resolve($key)
    {
       return static::contanier()->resolve($key);
    }
}

