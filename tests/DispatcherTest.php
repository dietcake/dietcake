<?php
namespace DietCake;

use PHPUnit\Framework\TestCase;

class DispatcherTest extends TestCase
{
    public function test_parseAction()
    {
        $this->assertEquals(array('top', 'index'), Dispatcher::parseAction('top/index'));
        $this->assertEquals(array('player', 'view_record'), Dispatcher::parseAction('player/view_record'));
        $this->assertEquals(array('event_top', 'index'), Dispatcher::parseAction('event/top/index'));
    }

    /**
     * @expectedException \DietCake\DCException
     */
    public function test_parseAction_02()
    {
        Dispatcher::parseAction('top');
    }

    public function test_getController()
    {
        require_once __DIR__ . '/globalnamespace/HelloController.php';
        $this->assertTrue(Dispatcher::getController('hello') instanceof \HelloController);
    }

    /**
     * @expectedException \DietCake\DCException
     */
    public function test_getController_02()
    {
        Dispatcher::getController('foo');
    }
}

