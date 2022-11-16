<?php

declare(strict_types=1);

namespace Src\Domain\ValueObjects\Concert;

final class ConcertAdvertisingMediaIds
{
    private $value;

    public function __construct(array $ids)
    {
        $this->value = $ids;
    }

    public function value(): array
    {
        return $this->value;
    }
}