<?php

namespace Test\Domain\Services;

use App\Domain\Entities\ShoppingList;
use App\Domain\Repositories\ShoppingListRepositories;
use App\Domain\Services\ShoppingListService;
use Test\TestCase;

/**
 * @covers ShoppingListService::class
 */
class ShoppingListServiceTest extends TestCase
{
    private ShoppingListRepositories $shoppingListRepositories;

    public function setUp(): void
    {
        $this->shoppingListRepositories = $this->createMock(ShoppingListRepositories::class);

        $this->shoppingListRepositories->method('save')
            ->willReturn(new ShoppingList('foo'));
    }
    /**
     * @test
     */
    public function itShouldReturnShoppingList()
    {
        $shoppingListService = new ShoppingListService($this->shoppingListRepositories);
        $shoppingList = $shoppingListService->create('foo');

        $this->assertInstanceOf(ShoppingList::class, $shoppingList);

        $this->assertEquals('foo', $shoppingList->name);
    }
}
