<?php
class Inflector
{
    public static function camelize($str)
    {
        return str_replace(' ', '', ucwords(str_replace('_', ' ', $str)));
    }

    public static function underscore($str)
    {
        return strtolower(preg_replace('/(?<=\\w)([A-Z]+)/', '_\\1', $str));
    }
}
