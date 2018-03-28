<?php
namespace DietCake;

class Inflector
{
    /**
     * @param string $str
     * @return string
     */
    public static function camelize($str)
    {
        return str_replace(' ', '', ucwords(str_replace('_', ' ', $str)));
    }

    /**
     * @param string $str
     * @return string
     */
    public static function underscore($str)
    {
        /* [A-Z]+ と [A-Z][a-z]* を単語とみなす。
         * つまり、単語の境界は
         *     [a-z][A-Z]
         *          ^ココ
         * または
         *     [A-Z][A-Z][a-z]
         *          ^ココ
         * となる。
         */
        return strtolower(preg_replace('/([a-z]+(?=[A-Z])|[A-Z]+(?=[A-Z][a-z]))/', '\\1_', $str));
    }
}
