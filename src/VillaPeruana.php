<?php

namespace App;

use App\CalculateTick;

class VillaPeruana
{
    protected $product;

    public $quality;

    public $sellIn;

    public function __construct(CalculateTick $product, $quality, $sellIn)
    {
        $this->product = $product;
        $this->quality = $quality;
        $this->sellIn  = $sellIn;
    }

    public static function of(CalculateTick $product, $quality, $sellIn)
    {
        return new static($product, $quality, $sellIn);
    }

    public function tick()
    {
        $item = $this->product->tick($this->quality, $this->sellIn);

        $this->quality = $item->quality;
        $this->sellIn  = $item->sellIn;
    }
}
