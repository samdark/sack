<?php

declare(strict_types=1);

namespace Samdark\Sack;

final class Item implements ItemInterface
{
    public function __construct(
        private string $name,
        private int $volume,
        private int $value
    )
    {
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getVolume(): int
    {
        return $this->volume;
    }

    public function getValue(): int
    {
        return $this->value;
    }
}