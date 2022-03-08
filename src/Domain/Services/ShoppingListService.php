<?php

namespace App\Domain\Services;

use App\Domain\Entities\Name;
use App\Domain\Entities\ShoppingList;
use App\Domain\Repositories\ShoppingListRepositories;

class ShoppingListService
{
    public function __construct(private ShoppingListRepositories $shoppingListRepositories)
    {
    }

    public function create(Name $name): ShoppingList
    {
        return $this->shoppingListRepositories->save(new ShoppingList($name));
    }

    public function get(string $name = null): array | ShoppingList
    {
        return $this->shoppingListRepositories->get($name);
    }
}
