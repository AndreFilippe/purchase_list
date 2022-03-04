<?php

namespace Test\Domain\Entities;

use App\Domain\Entities\Item;
use App\Domain\Entities\Product;
use App\Domain\Entities\ShoppingList;
use Test\TestCase;

/**
 * @covers ShoppingList::class
 */
class ShoppingListTest extends TestCase
{
    private ShoppingList $shoppingList;
    private Product $product;
    private Item $item;

    public function setUp(): void
    {
        parent::setUp();

        $this->shoppingList = new ShoppingList('bar');
        $this->product = new Product('foo');
        $this->item = new Item($this->product, 1.0);
    }

    /**
     * @test
     */
    public function itShouldReturnTrue()
    {
        $isAddItem = $this->shoppingList->addItem($this->item);
        $this->assertTrue($isAddItem);
    }

    /**
     * @test
     */
    public function itShouldAddItem()
    {
        $this->shoppingList->addItem($this->item);
        $items = $this->shoppingList->getItems();

        $this->assertCount(1, $items);
        $this->assertInstanceOf(Item::class, $items[0]);
    }

    /**
     * @test
     */
    public function itShouldReturnArray()
    {
        $this->shoppingList->addItem($this->item);
        $items = $this->shoppingList->getItems();

        $this->assertIsArray($items);
    }
}
