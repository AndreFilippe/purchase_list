<?php

namespace Test\Domain\Services;

use App\Domain\Entities\ShoppingList;
use App\Domain\Services\ShoppingListService;
use Test\TestCase;

/**
 * @covers ShoppingListService::class
 */
class ShoppingListServiceTest extends TestCase
{
    /**
     * @test
     */
    public function itShouldReturnShoppingList()
    {
        $shoppingListService = new ShoppingListService();
        $shoppingList = $shoppingListService->create('foo');

        $this->assertInstanceOf(ShoppingList::class, $shoppingList);
    }
}
