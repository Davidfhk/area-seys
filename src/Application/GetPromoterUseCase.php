<?php

declare(strict_types=1);

namespace Src\Application;

use Src\Domain\Contracts\ConcertRepositoryContract;
use Src\Domain\Promoter;
use Src\Domain\ValueObjects\Promoter\PromoterId;

final class GetPromoterUseCase
{
    private $repository;

    public function __construct(ConcertRepositoryContract $repository)
    {
        $this->repository = $repository;
    }

    public function __invoke(int $promoterId): Promoter
    {
        $id =  new PromoterId($promoterId);

        $promoter = $this->repository->findPromoterById($id);

        return $promoter;
    }
}