<?php

declare(strict_types=1);

namespace Src\Application;

use Src\Domain\Contracts\ConcertRepositoryContract;

final class GetCheckAdvertisingMediaIdsUseCase
{
    private $repository;

    public function __construct(ConcertRepositoryContract $repository)
    {
        $this->repository = $repository;
    }

    public function __invoke(array $advertisingMediaIds): array
    {
        $notFound = [];
        foreach ($advertisingMediaIds as $id) {
            $advertisingMedia = $this->repository->findAdvertisingMediaById($id);
            
            if (!$advertisingMedia) {
                $notFound[] = $id;
            }
        }
        
        return $notFound;
    }
}