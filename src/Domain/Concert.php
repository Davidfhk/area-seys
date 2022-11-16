<?php

declare(strict_types=1);

namespace Src\Domain;

use Src\Domain\Enclosure;
use Src\Domain\ValueObjects\Concert\ConcertName;
use Src\Domain\ValueObjects\Concert\ConcertDate;
use Src\Domain\ValueObjects\Concert\ConcertEnclosureId;
use Src\Domain\ValueObjects\Concert\ConcertViewers;
use Src\Domain\ValueObjects\Concert\ConcertPromoterId;
use Src\Domain\ValueObjects\Concert\ConcertAdvertisingMediaIds;
use Src\Domain\ValueObjects\Concert\ConcertGroupsId;

final class Concert
{
    private $name;
    private $date;
    private $enclosureId;
    private $viewers;
    private $promoterId;
    private $advertisingMediaIds;
    private $groupsId;

    public function __construct(
        ConcertName $name,
        ConcertDate $date,
        ConcertEnclosureId $enclosureId,
        ConcertViewers $viewers,
        ConcertPromoterId $promoterId,
        ?ConcertAdvertisingMediaIds $advertisingMediaIds,
        ?ConcertGroupsId $groupsId,
    )
    {
        $this->name                = $name;
        $this->date                = $date;
        $this->enclosureId         = $enclosureId;
        $this->viewers             = $viewers;
        $this->promoterId          = $promoterId;
        $this->advertisingMediaIds = $advertisingMediaIds;
        $this->groupsId            = $groupsId;
    }

    public function name(): ConcertName
    {
        return $this->name;
    }

    public function date(): ConcertDate
    {
        return $this->date;
    }

    public function enclosureId(): ConcertEnclosureId
    {
        return $this->enclosureId;
    }

    public function viewers(): ConcertViewers
    {
        return $this->viewers;
    }

    public function promoterId(): ConcertPromoterId
    {
        return $this->promoterId;
    }

    public function profitability(Enclosure $enclosure): int
    {
        return ($this->viewers->value() * $enclosure->entryPrice()->value()) - 
        $enclosure->rentalCost()->value();
    }

    public function advertisingMediaIds(): ConcertAdvertisingMediaIds
    {
        return $this->advertisingMediaIds;
    }

    public function groupsId(): ConcertGroupsId
    {
        return $this->groupsId;
    }

    public static function create(
        ConcertName $name,
        ConcertDate $date,
        ConcertEnclosureId $enclosureId,
        ConcertViewers $viewers,
        ConcertPromoterId $promoterId,
        ConcertAdvertisingMediaIds $advertisingMediaIds,
        ConcertGroupsId $groupsId
    ): Concert
    {
        $concert = new self($name, $date, $enclosureId, $viewers, $promoterId, $advertisingMediaIds, $groupsId);

        return $concert;
    }
}