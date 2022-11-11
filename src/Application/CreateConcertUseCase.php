<?php

declare(strict_types=1);

namespace Src\Application;

use Src\Domain\Contracts\ConcertRepositoryContract;
use Src\Domain\Concert;
use Src\Domain\ValueObjects\ConcertName;
use Src\Domain\ValueObjects\ConcertDate;
use Src\Domain\ValueObjects\ConcertEnclosureId;
use Src\Domain\ValueObjects\ConcertPromoterId;
use Src\Domain\ValueObjects\ConcertAdvertisingMediaIds;
use Src\Domain\ValueObjects\ConcertViewers;
use Src\Domain\ValueObjects\ConcertGroupsId;

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
    ): void
    {
        $name                =  new ConcertName($concertName);
        $date                =  new ConcertDate($concertDate);
        $enclosureId         =  new ConcertEnclosureId($concertEnclosureId);
        $promoterId          =  new ConcertPromoterId($concertPromoterId);
        $asvertisingMediaIds =  new ConcertAdvertisingMediaIds($concertAdvertisingMediaIds);
        $viewers             =  new ConcertViewers($concertViewers);
        $groupsId            =  new ConcertGroupsId($concertGroupsId);

        $concert = Concert::create($name, $date, $enclosureId, $viewers, $promoterId, $advertisingMediaIds, $groupsId);

        $this->repository->save($concert);
    }
}