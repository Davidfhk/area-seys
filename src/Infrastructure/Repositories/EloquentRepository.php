<?php

declare(strict_types=1);

namespace Src\Infrastructure\Repositories;

use App\Models\Concierto as EloquentConcertModel;
use Src\Domain\Contracts\ConcertRepositoryContract;
use Src\Domain\Concert;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Log;

final class EloquentRepository implements ConcertRepositoryContract
{
    private $eloquentConcertModel;

    public function __construct()
    {
        $this->eloquentConcertModel = new EloquentConcertModel;
    }

    public function save(Concert $concert): void
    {
        $newConcert = $this->eloquentConcertModel;

        $data = [
            'nombre'              => $concert->name()->value(),
            'fecha'               => $concert->date()->value(),
            'id_recinto'          => $concert->enclosureId()->value(),
            'id_promotor'         => $concert->promoterId()->value(),
            'numero_espectadores' => $concert->viewers()->value()
        ];

        $newConcert->create($data);
        $newConcert->grupos()->attach($concert->groupsId()->value());
        $newConcert->medios()->attach($concert->asvertisingMediaIds()->value());
        Log::info('Concert :: '. json_encode($data) . ' saved');
    }
}