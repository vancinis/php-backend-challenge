<?php

namespace App\Product;

use App\CalculateTick;

class SpecialProduct implements CalculateTick
{
    public $name;

    public function __construct($name)
    {
        $this->name = $name;
    }

    public function tick($quality, $sellIn)
    {
        if (in_array($this->name, ['Pisco Peruano', 'Ticket VIP al concierto de Pick Floid']) && $quality < 50) {
            $quality += 1;
        }

        if ($this->name === 'Ticket VIP al concierto de Pick Floid' && $sellIn < 11 && $quality < 50) {
            $quality += 1;
        }

        if ($this->name === 'Ticket VIP al concierto de Pick Floid' && $sellIn < 6 && $quality < 50) {
            $quality += 1;
        }

        if ($this->name !== 'Tumi de Oro Moche') {
            $sellIn -= 1;
        }

        if ($sellIn < 0 && $this->name === 'Ticket VIP al concierto de Pick Floid') {
            $quality = 0;
        }

        if ($sellIn < 0 && $this->name === 'Pisco Peruano' && $quality < 50) {
            $quality += 1;
        }

        return (object)[
            'quality' => $quality,
            'sellIn'  => $sellIn,
        ];
    }
}
