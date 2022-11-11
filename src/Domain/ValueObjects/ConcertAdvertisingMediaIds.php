<?php

declare(strict_types=1);

namespace Src\Domain\ValueObjects;

final class ConcertAdvertisingMediaIds
{
    private $value;

    public function __construct(array $ids)
    {
        $this->value = $id;
    }

    public function value(): array
    {
        return $this->value;
    }
}