<?php

declare(strict_types=1);

namespace Samdark\Sack;

interface ItemInterface
{
    public function getName(): string;
    public function getVolume(): int;
    public function getValue(): int;
}