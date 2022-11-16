<?php

declare(strict_types=1);

namespace Src\Application;

use Src\Domain\Contracts\ConcertRepositoryContract;

final class GetCheckGroupsIdUseCase
{
    private $repository;

    public function __construct(ConcertRepositoryContract $repository)
    {
        $this->repository = $repository;
    }

    public function __invoke(array $groupsId): array
    {
        $notFound = [];
        foreach ($groupsId as $groupId) {
            $group = $this->repository->findGroupsById($groupId);

            if (!$group) {
                $notFound[] = $groupId;
            }
        }
        
        return $notFound;
    }
}