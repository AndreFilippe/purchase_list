<?php

namespace App\Domain\Entities;

class Item
{
    public function __construct(
        private Product $product,
        private float $quantity = 1.0
    ) {
    }
}
