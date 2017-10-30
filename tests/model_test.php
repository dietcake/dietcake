<?php
require_once __DIR__.'/bootstrap.php';

use PHPUnit\Framework\TestCase;

class ModelTest extends TestCase
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
        $test_player = new TestPlayer;
        $test_player->name = '';
        $this->assertFalse($test_player->validate());
        $this->assertTrue($test_player->hasError());

        $test_player->name = 'aa';
        $this->assertFalse($test_player->validate());
        $this->assertTrue($test_player->hasError());

        $test_player->name = 'aaa';
        $this->assertTrue($test_player->validate());
        $this->assertFalse($test_player->hasError());

        $test_player->name = '0123456789123456';
        $this->assertTrue($test_player->validate());
        $this->assertFalse($test_player->hasError());

        $test_player->name = '01234567891234567';
        $this->assertFalse($test_player->validate());
        $this->assertTrue($test_player->hasError());
    }
}

class TestPlayer extends Model
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
