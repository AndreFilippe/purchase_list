<?php

namespace Test\Domain\Entities;

use App\Domain\Entities\Name;
use Test\TestCase;

/**
 * @covers ShoppingList::class
 */
class NameTest extends TestCase
{
    /**
     * @test
     */
    public function itShouldReturnNoWhiteSpaceInStartAndEnd()
    {
        $name = new Name(' andre ');

        $this->assertEquals('andre', $name);
    }

    /**
     * @test
     */
    public function itShouldReturnExceptionLengthInvalid()
    {
        $this->expectExceptionMessage('Length invalid');
        new Name(' ');
    }

    /**
     * @test
     */
    public function itShouldReturnNameInstance()
    {
        $name = new Name('Filippe');
        $this->assertInstanceOf(Name::class, $name);
    }
}
