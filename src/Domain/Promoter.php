<?php

declare(strict_types=1);

namespace Src\Domain;

use Src\Domain\ValueObjects\Promoter\PromoterName;

final class Promoter
{
    private $name;

    public function __construct(PromoterName $name)
    {
        $this->name = $name;
    }

    public function name(): PromoterName
    {
        return $this->name;
    }

    public static function create(PromoterName $name): Promoter
    {
        $promoter = new self($name);

        return $promoter;
    }
}