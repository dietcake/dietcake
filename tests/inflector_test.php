<?php
require_once __DIR__.'/bootstrap.php';

use PHPUnit\Framework\TestCase;

class InflectorTest extends TestCase
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
        $this->assertEquals('db', Inflector::underscore('DB'));
        $this->assertEquals('dbo', Inflector::underscore('DBO'));
        $this->assertEquals('db_object', Inflector::underscore('DBObject'));
        $this->assertEquals('a_to_z', Inflector::underscore('AToZ'));
        $this->assertEquals('parse_url', Inflector::underscore('ParseURL'));
        $this->assertEquals('take_a_look', Inflector::underscore('TakeALook'));
    }
}
