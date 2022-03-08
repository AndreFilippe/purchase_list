<?php

namespace Test\Domain\Services;

use App\Domain\Entities\Name;
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
        $this->shoppingListRepositories->method('save')
            ->willReturn(new ShoppingList(new Name('foo')));

        $shoppingListService = new ShoppingListService($this->shoppingListRepositories);
        $shoppingList = $shoppingListService->create(new Name('foo'));

        $this->assertInstanceOf(ShoppingList::class, $shoppingList);

        $this->assertEquals(new Name('foo'), $shoppingList->name);
    }

        $this->assertInstanceOf(ShoppingList::class, $shoppingList);

        $this->assertEquals('foo', $shoppingList->name);
    }
}
