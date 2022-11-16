<?php

declare(strict_types=1);

namespace Src\Infrastructure\Repositories;

use App\Models\Concierto as EloquentConcertModel;
use App\Models\Recinto as EloquentEnclosureModel;
use App\Models\Promotor as EloquentPromoterModel;
use App\Models\Grupo as EloquentGroupModel;
use App\Models\Medio as EloquentAdvertisingMediaModel;
use Src\Domain\Contracts\ConcertRepositoryContract;
use Src\Domain\Concert;
use Src\Domain\Enclosure;
use Src\Domain\Promoter;
use Src\Domain\ValueObjects\Promoter\PromoterId;
use Src\Domain\ValueObjects\Promoter\PromoterName;
use Src\Domain\ValueObjects\Enclosure\EnclosureId;
use Src\Domain\ValueObjects\Enclosure\EnclosureName;
use Src\Domain\ValueObjects\Enclosure\EnclosureRentalCost;
use Src\Domain\ValueObjects\Enclosure\EnclosureEntryPrice;
use Src\Domain\ValueObjects\Concert\ConcertName;
use Src\Domain\ValueObjects\Concert\ConcertDate;
use Src\Domain\ValueObjects\Concert\ConcertEnclosureId;
use Src\Domain\ValueObjects\Concert\ConcertViewers;
use Src\Domain\ValueObjects\Concert\ConcertPromoterId;
use Src\Domain\ValueObjects\Concert\ConcertAdvertisingMediaIds;
use Src\Domain\ValueObjects\Concert\ConcertGroupsId;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Log;

final class EloquentRepository implements ConcertRepositoryContract
{
    private $eloquentConcertModel;
    private $eloquentEnclosureModel;
    private $eloquentPromoterModel;
    private $eloquentGroupModel;
    private $eloquentAdvertisingMediaModel;

    public function __construct()
    {
        $this->eloquentConcertModel = new EloquentConcertModel;
        $this->eloquentEnclosureModel = new EloquentEnclosureModel;
        $this->eloquentPromoterModel = new EloquentPromoterModel;
        $this->eloquentGroupModel = new EloquentGroupModel;
        $this->eloquentAdvertisingMediaModel = new EloquentAdvertisingMediaModel;
    }

    public function save(Concert $concert)
    {
        $concertModel = $this->eloquentConcertModel;

        $data = [
            'nombre'              => $concert->name()->value(),
            'fecha'               => $concert->date()->value(),
            'recinto_id'          => $concert->enclosureId()->value(),
            'promotor_id'         => $concert->promoterId()->value(),
            'numero_espectadores' => $concert->viewers()->value(),
            'rentabilidad'        => $this->getProfitability($concert)
        ];


        $newConcert = $concertModel->create($data);
        $groupsId = $concert->groupsId()->value();
        $advertisingMediaIds = $concert->advertisingMediaIds()->value();

        $newConcert->grupos()->attach($groupsId);
        $newConcert->medios()->attach($advertisingMediaIds);

        Log::info('Concert :: '. json_encode($data) . ' saved');

        return $newConcert;
    }

    public function find(ConcertId $concertId): ?Concert
    {
        $concert = $this->eloquentConcertModel->findOrFail($concertId->value());

        return new Concert(
            new ConcertName($concert->nombre),
            new ConcertDate($concert->fecha),
            new ConcertEnclosureId($concert->recinto_id),
            new ConcertViewers($concert->numero_espectadores),
            new ConcertPromoterId($concert->promotor_id)
        );
    }

    public function findEnclosureById(ConcertEnclosureId $enclosureId): ?Enclosure
    {
        $enclosure = $this->eloquentEnclosureModel->findOrFail($enclosureId->value());

        return new Enclosure(
            new EnclosureName($enclosure->nombre),
            new EnclosureRentalCost($enclosure->coste_alquiler),
            new EnclosureEntryPrice($enclosure->precio_entrada)
        );
    }

    public function findPromoterById(PromoterId $promoterId): ?Promoter
    {
        $promoter = $this->eloquentPromoterModel->findOrFail($promoterId->value());

        return new Promoter(
            new PromoterName($promoter->nombre)
        );
    }

    public function findGroupsById(int $id)
    {
        return $this->eloquentGroupModel->find($id);
    }

    public function findAdvertisingMediaById(int $id)
    {
        return $this->eloquentAdvertisingMediaModel->find($id);
    }

    public function getProfitability(Concert $concert)
    {
        $enclosure = $this->findEnclosureById($concert->enclosureId());
        return $concert->profitability($enclosure);
    }
}