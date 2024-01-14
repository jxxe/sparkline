<?php

namespace Amir\Sparkline;

class Math
{
    public static function getY($max, $height, $diff, $value): float
    {
        return round(floatval(($height - ($value * $height / $max) + $diff)), 2);
    }
}