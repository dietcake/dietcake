<?php
class Param
{
    public static function get($name, $default = null)
    {
        return isset($_REQUEST[$name]) ? $_REQUEST[$name] : $default;
    }

    public static function params()
    {
        return $_REQUEST;
    }
}
