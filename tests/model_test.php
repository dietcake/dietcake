<?php
require_once dirname(__FILE__).'/bootstrap.php';

class ModelTest extends PHPUnit_Framework_TestCase
{
    public function test_set()
    {
        $model = new Model;
        $model->set(array('foo' => 200, 'bar' => 'test'));
        $this->assertEquals(200, $model->foo);
        $this->assertEquals('test', $model->bar);
    }

    public function test_validate()
    {
        $player = new Player;
        $player->name = '';
        $this->assertFalse($player->validate());
        $this->assertTrue($player->hasError());

        $player->name = 'aa';
        $this->assertFalse($player->validate());
        $this->assertTrue($player->hasError());

        $player->name = 'aaa';
        $this->assertTrue($player->validate());
        $this->assertFalse($player->hasError());

        $player->name = '0123456789123456';
        $this->assertTrue($player->validate());
        $this->assertFalse($player->hasError());

        $player->name = '01234567891234567';
        $this->assertFalse($player->validate());
        $this->assertTrue($player->hasError());
    }
}

class Player extends Model
{
    public $validation = array(
        'name' => array(
            'between' => array('validate_between', 3, 16),
        ),
    );
}

function validate_between($check, $min, $max)
{
    $length = mb_strlen($check);
    return $length >= $min && $length <= $max;
}
