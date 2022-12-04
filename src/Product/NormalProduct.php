<?php

namespace App\Product;

use App\CalculateTick;

class NormalProduct implements CalculateTick
{
    public $name;

    public function __construct($name)
    {
        $this->name = $name;
    }

    public function tick($quality, $sellIn)
    {
        $sellIn -= 1;

        if ($quality > 0) {
            $quality -= 1;
        }

        if ($sellIn < 0 && $quality > 0) {
            $quality -= 1;
        }

        return (object)[
            'quality' => $quality,
            'sellIn'  => $sellIn,
        ];
    }
}
