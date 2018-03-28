<?php

class TestPlayer extends Model
{
    public $validation = array(
        'name' => array(
            'between' => array('validate_between', 3, 16),
        ),
    );
}
