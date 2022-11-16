<?php

declare(strict_types=1);

namespace Src\Domain\Contracts;

use Src\Domain\Concert;

interface ConcertRepositoryContract
{
    public function save(Concert $concert);
}