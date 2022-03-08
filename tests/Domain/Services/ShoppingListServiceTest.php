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

    /**
     * @test
     */
    public function itShouldReturnArrayWithShoppingList()
    {
        $this->shoppingListRepositories->method('get')
            ->willReturn([
                new ShoppingList(new Name('foo')),
                new ShoppingList(new Name('bar'))
            ]);

        $shoppingListService = new ShoppingListService($this->shoppingListRepositories);
        $arrayShoppingList = $shoppingListService->get();

        foreach ($arrayShoppingList as $shoppingList) {
            $this->assertInstanceOf(ShoppingList::class, $shoppingList);
        }
    }

    /**
     * @test
     */
    public function itShouldReturnShoppingListWhenSetParam()
    {
        $this->shoppingListRepositories->method('get')
            ->with($this->equalTo('foo'))
            ->willReturn(new ShoppingList(new Name('foo')));

        $shoppingListService = new ShoppingListService($this->shoppingListRepositories);
        $shoppingList = $shoppingListService->get('foo');

        $this->assertInstanceOf(ShoppingList::class, $shoppingList);
    }
}
