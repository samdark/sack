<?php

declare(strict_types=1);

namespace Samdark\Sack;

final class Sack
{
    public function __construct(
        private array $items,
        private int $value
    )
    {
    }

    /**
     * @return Item[]
     * @psalm-suppress MixedReturnTypeCoercion
     */
    public function getItems(): array
    {
        return $this->items;
    }

    public function getValue(): int
    {
        return $this->value;
    }
}
