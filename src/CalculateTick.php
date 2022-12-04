<?php

namespace App;

interface CalculateTick
{
    public function tick($quality, $sellIn);
}
