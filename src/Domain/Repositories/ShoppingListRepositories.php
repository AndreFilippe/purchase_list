<?php

namespace App\Domain\Repositories;

use App\Domain\Entities\ShoppingList;

interface ShoppingListRepositories
{
    public function save(ShoppingList $shoppingList): ShoppingList;
    public function get(string $name = null): array | ShoppingList;
}
