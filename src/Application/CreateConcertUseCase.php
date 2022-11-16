<?php

declare(strict_types=1);

namespace Src\Application;

use Src\Domain\Contracts\ConcertRepositoryContract;
use Src\Domain\Concert;
use Src\Domain\ValueObjects\Concert\ConcertName;
use Src\Domain\ValueObjects\Concert\ConcertDate;
use Src\Domain\ValueObjects\Concert\ConcertEnclosureId;
use Src\Domain\ValueObjects\Concert\ConcertPromoterId;
use Src\Domain\ValueObjects\Concert\ConcertAdvertisingMediaIds;
use Src\Domain\ValueObjects\Concert\ConcertViewers;
use Src\Domain\ValueObjects\Concert\ConcertGroupsId;

final class CreateConcertUseCase
{
    private $repository;

    public function __construct(ConcertRepositoryContract $repository)
    {
        $this->repository = $repository;
    }

    public function __invoke(
        string $concertName,
        ?string $concertDate,
        ?int $concertEnclosureId,
        ?int $concertPromoterId,
        ?array $concertAdvertisingMediaIds,
        ?int $concertViewers,
        ?array $concertGroupsId    
    )
    {
        $name                =  new ConcertName($concertName);
        $date                =  new ConcertDate($concertDate);
        $enclosureId         =  new ConcertEnclosureId($concertEnclosureId);
        $promoterId          =  new ConcertPromoterId($concertPromoterId);
        $advertisingMediaIds =  new ConcertAdvertisingMediaIds($concertAdvertisingMediaIds);
        $viewers             =  new ConcertViewers($concertViewers);
        $groupsId            =  new ConcertGroupsId($concertGroupsId);

        $concert = Concert::create($name, $date, $enclosureId, $viewers, $promoterId, $advertisingMediaIds, $groupsId);

        return $this->repository->save($concert);
    }
}