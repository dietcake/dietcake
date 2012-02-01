<?php
require_once dirname(__DIR__).'/core/dispatcher.php';
require_once dirname(__DIR__).'/core/param.php';
require_once dirname(__DIR__).'/core/exception.php';
require_once dirname(__DIR__).'/core/controller.php';
require_once dirname(__DIR__).'/core/view.php';
require_once dirname(__DIR__).'/core/inflector.php';
define('DC_ACTION', 'dc_action');

class DispatcherTest extends PHPUnit_Framework_TestCase
{
    public function test_parseAction()
    {
        $this->assertEquals(array('top', 'index'), Dispatcher::parseAction('top/index'));
        $this->assertEquals(array('player', 'view_record'), Dispatcher::parseAction('player/view_record'));
        $this->assertEquals(array('event_top', 'index'), Dispatcher::parseAction('event/top/index'));

    }

    public function test_parseAction_02()
    {
        $this->setExpectedException('DCException', 'invalid url format');
        Dispatcher::parseAction('top');
    }

    public function test_getController()
    {
        $this->assertTrue(Dispatcher::getController('hello') instanceof HelloController);
    }

    public function test_getController_02()
    {
        $this->setExpectedException('DCException', 'FooController is not found');
        Dispatcher::getController('foo');
    }
}

class HelloController extends Controller
{
}
