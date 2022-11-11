<?php

namespace Src\Infrastructure;

use Illuminate\Http\Request;
use Src\Application\CreateConcertUseCase;
use Src\Infrastructure\Repositories\EloquentRepository;

final class CreateConcertController
{
	private $repository;

	public function __construct(EloquentRepository $repository)
	{
		$this->repository = $repository;
	}

    public function __invoke(Request $request)
    {
        $createConcertUseCase = new CreateConcertUseCase($this->repository);

        $concertName                = $request->input('name');
        $concertDate                = $request->input('date');
        $concertEnclosureId         = $request->input('enclosure_id');
        $concertAsvertisingMediaIds = $request->input('asvertising_media_ids');
        $concertPromoterId          = $request->input('promoter_id');
        $concertViewers             = $request->input('viewers');
        $concertGroupsId            = $request->input('groups_id');

        $createConcertUseCase->__invoke(
            $concertName,
            $concertDate,
            $concertEnclosureId,
            $concertPromoterId,
            $concertAsvertisingMediaIds,
            $concertViewers,
            $concertGroupsId
        );
    }
}
