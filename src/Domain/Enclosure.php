<?php

declare(strict_types=1);

namespace Src\Domain;

use Src\Domain\ValueObjects\Enclosure\EnclosureName;
use Src\Domain\ValueObjects\Enclosure\EnclosureRentalCost;
use Src\Domain\ValueObjects\Enclosure\EnclosureEntryPrice;

final class Enclosure
{
    private $name;
    private $rentalCost;
    private $entryPrice;

    public function __construct(
        EnclosureName $name,
        EnclosureRentalCost $rentalCost,
        EnclosureEntryPrice $entryPrice,
    )
    {
        $this->name       = $name;
        $this->rentalCost = $rentalCost;
        $this->entryPrice = $entryPrice;
    }

    public function name(): EnclosureName
    {
        return $this->name;
    }

    public function rentalCost(): EnclosureRentalCost
    {
        return $this->rentalCost;
    }

    public function entryPrice(): EnclosureEntryPrice
    {
        return $this->entryPrice;
    }

    public static function create(
        EnclosureName $name,
        EnclosureRentalCost $rentalCost,
        EnclosureEntryPrice $entryPrice,
    ): Enclosure
    {
        $enclosure = new self($name, $rentalCost, $entryPrice);

        return $enclosure;
    }
}