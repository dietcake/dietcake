<?php
require_once dirname(__FILE__).'/bootstrap.php';

class InflectorTest extends PHPUnit_Framework_TestCase
{
    public function test_camelize()
    {
        $this->assertEquals('PlainText', Inflector::camelize('plain_text'));
    }

    public function test_underscore()
    {
        $this->assertEquals('plain_text', Inflector::underscore('PlainText'));
        $this->assertEquals('foo_bar_hoge', Inflector::underscore('FooBarHoge'));
        $this->assertEquals('foo', Inflector::underscore('Foo'));
        // TODO:
        //$this->assertEquals('db', Inflector::underscore('DB'));
        //$this->assertEquals('dbo', Inflector::underscore('DBO'));
        //$this->assertEquals('db_object', Inflector::underscore('DBObject'));
    }
}
