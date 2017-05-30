<?php
error_reporting(E_ALL | E_STRICT);

define('ROOT_DIR', dirname(dirname(__FILE__)).'/');
define('APP_DIR', ROOT_DIR.'app/');
require_once ROOT_DIR.'dietcake.php';

// backward compatibility for php 5.5 and low (with phpunit < v.6)
if (!class_exists('\PHPUnit\Framework\TestCase') && class_exists('\PHPUnit_Framework_TestCase')) {
    class_alias('\PHPUnit_Framework_TestCase', '\PHPUnit\Framework\TestCase');
}

if (!class_exists('\PHPUnit_Framework_TestCase') && class_exists('\PHPUnit\Framework\TestCase')) {
    class_alias('\PHPUnit\Framework\TestCase', '\PHPUnit_Framework_TestCase');
}
