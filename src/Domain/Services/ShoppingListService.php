<?php

namespace App\Domain\Services;

use App\Domain\Entities\ShoppingList;
use App\Domain\Repositories\ShoppingListRepositories;

class ShoppingListService
{
    public function __construct(private ShoppingListRepositories $shoppingListRepositories)
    {
    }

    public function create(string $name): ShoppingList
    {
        return $this->shoppingListRepositories->save(new ShoppingList($name));
    }
}
