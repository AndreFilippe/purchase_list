<?php

namespace App\Domain\Entities;

class ShoppingList
{
    private array $items = [];

    public function __construct(private string $name)
    {
    }

    public function addItem(Item $item): bool
    {
        array_push($this->items, $item);

        return true;
    }

    public function getItems(): array
    {
        return $this->items;
    }
}
