<?php

function validate_between($check, $min, $max)
{
    $length = mb_strlen($check);
    return $length >= $min && $length <= $max;
}
