<?php

namespace App\Domain\Services;

use App\Domain\Entities\ShoppingList;

class ShoppingListService
{
    public function create(string $name): ShoppingList
    {
        return new ShoppingList($name);
    }
}
