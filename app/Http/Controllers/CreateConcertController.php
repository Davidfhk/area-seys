<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Src\Infrastructure\CreateConcertController as InfrastructureCreateConcertController;
use Illuminate\Http\JsonResponse;

class CreateConcertController extends Controller
{
    private $createConcertController;

    public function __construct(InfrastructureCreateConcertController $createConcertController)
    {
        $this->createConcertController = $createConcertController;
    }

    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name'                    => 'required|string',
            'date'                    => 'required|date_format:d-m-Y',
            'enclosure_id'            => 'required|integer',
            'advertising_media_ids'   => 'required|array',
            'advertising_media_ids.*' => 'integer',
            'promoter_id'             => 'required|integer',
            'viewers'                 => 'required|integer',
            'groups_id'               => 'required|array',
            'groups_id.*'             => 'integer'
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], JsonResponse::HTTP_UNPROCESSABLE_ENTITY);
        }

        $response = $this->createConcertController->__invoke($request);

        if ($response['errors']) {
            return response()->json(['errors' => $response['message']],$response['code']);
        }

        return response($response['message'], 201);
    }
}
