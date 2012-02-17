<?php
require_once dirname(__FILE__).'/bootstrap.php';

class ControllerTest extends PHPUnit_Framework_TestCase
{
    public function test_isAction()
    {
        $this->assertTrue(Controller::isAction('index'));
        $this->assertTrue(Controller::isAction('view'));

        $this->assertFalse(Controller::isAction('__construct'));
        $this->assertFalse(Controller::isAction('beforeFilter'));
        $this->assertFalse(Controller::isAction('isAction'));
        $this->assertFalse(Controller::isAction('set'));
        $this->assertFalse(Controller::isAction('render'));
    }

    public function test_set()
    {
        $controller = new Controller('');
        $controller->set('foo', 100);
        $controller->set('bar', array(1, 2));
        $this->assertEquals(100, $controller->view->vars['foo']);
        $this->assertEquals(array(1, 2), $controller->view->vars['bar']);

        $controller->set(array('foo' => 200));
        $this->assertEquals(200, $controller->view->vars['foo']);
    }
}
