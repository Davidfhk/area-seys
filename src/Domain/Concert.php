<?php

declare(strict_types=1);

namespace Src\Domain;

use Src\Domain\ValueObjects\ConcertName;
use Src\Domain\ValueObjects\ConcertDate;
use Src\Domain\ValueObjects\ConcertEnclosureId;
use Src\Domain\ValueObjects\ConcertViewers;
use Src\Domain\ValueObjects\ConcertPromoterId;
use Src\Domain\ValueObjects\ConcertAdvertisingMediaIds;
use Src\Domain\ValueObjects\ConcertGroupsId;

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
        ConcertAdvertisingMediaIds $advertisingMediaIds,
        ConcertGroupsId $groupsId,
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