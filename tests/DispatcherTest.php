<?php
namespace DietCake;

use PHPUnit\Framework\TestCase;

class DispatcherTest extends TestCase
{
    public function testParseAction()
    {
        $this->assertEquals(array('top', 'index'), Dispatcher::parseAction('top/index'));
        $this->assertEquals(array('player', 'view_record'), Dispatcher::parseAction('player/view_record'));
        $this->assertEquals(array('event_top', 'index'), Dispatcher::parseAction('event/top/index'));
    }

    public function testParseAction02()
    {
        $this->expectException(DCException::class);
        Dispatcher::parseAction('top');
    }

    public function testGetController()
    {
        require_once __DIR__ . '/globalnamespace/HelloController.php';
        $this->assertTrue(Dispatcher::getController('hello') instanceof \HelloController);
    }

    public function testGetController_02()
    {
        $this->expectException(DCException::class);
        Dispatcher::getController('foo');
    }
}
