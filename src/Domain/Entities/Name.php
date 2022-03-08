<?php

namespace App\Domain\Entities;

use Exception;

class Name
{
    public readonly string $name;

    public function __construct(string $name)
    {
        $this->name = $this->normalize($name);
        $this->validation();
    }

    private function normalize(string $name): string
    {
        return trim($name);
    }

    private function validation(): void
    {
        $length = strlen($this->name);
        if ($length === 0) throw new Exception('Length invalid');
    }

    public function __toString()
    {
        return $this->name;
    }
}
