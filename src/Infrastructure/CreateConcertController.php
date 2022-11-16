<?php

namespace Src\Infrastructure;

use Illuminate\Http\Request;
use Src\Application\CreateConcertUseCase;
use Src\Application\GetPromoterUseCase;
use Src\Application\GetCheckGroupsIdUseCase;
use Src\Application\GetCheckAdvertisingMediaIdsUseCase;
use Src\Application\SendMailUseCase;
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
        $errors = $this->checkGroupsAndAdvertisingMediaIds(
            $request->input('groups_id'), 
            $request->input('advertising_media_ids')
        );
        if ($errors['errors']) {
            return $errors;
        }

        $createConcertUseCase = new CreateConcertUseCase($this->repository);

        $concertName                = $request->input('name');
        $concertDate                = $request->input('date');
        $concertEnclosureId         = $request->input('enclosure_id');
        $concertAdvertisingMediaIds = $request->input('advertising_media_ids');
        $concertPromoterId          = $request->input('promoter_id');
        $concertViewers             = $request->input('viewers');
        $concertGroupsId            = $request->input('groups_id');

        $concert = $createConcertUseCase->__invoke(
                $concertName,
                $concertDate,
                $concertEnclosureId,
                $concertPromoterId,
                $concertAdvertisingMediaIds,
                $concertViewers,
                $concertGroupsId
            );

        $getPromoterUseCase = new GetPromoterUseCase($this->repository);
        $promoter = $getPromoterUseCase->__invoke($concertPromoterId);
        $name = $promoter->name()->value();

        $sendMailUseCase = new SendMailUseCase;
        $sendMailUseCase->__invoke($name, $concert->rentabilidad);

        return ['errors' => false, 'message' => 'Mail sent'];
    }

    private function checkGroupsAndAdvertisingMediaIds (array $groupsId, array $advertisingMediaIds): array 
    {
        $getCheckGroupsIdUseCase = new GetCheckGroupsIdUseCase($this->repository);
        $groupsNotFound = $getCheckGroupsIdUseCase->__invoke($groupsId);

        if ($groupsNotFound) {
            return [
                'errors' => true, 
                'message' => 'groups id: '.implode(',',$groupsNotFound) .' not found',
                'code' => 404
            ];
        }

        $getCheckAdvertisingMediaIdsUseCase = new GetCheckAdvertisingMediaIdsUseCase($this->repository);
        $advertisingMediaNotFound = $getCheckAdvertisingMediaIdsUseCase->__invoke($advertisingMediaIds);

        if ($advertisingMediaNotFound) {
            return [
                'errors' => true, 
                'message' => 'advertising media ids: '.implode(',',$advertisingMediaNotFound) .' not found',
                'code' => 404
            ];
        }

        return ['errors' => false ];
    }
}
