<?php

namespace App\Http\Controllers;

use App\Http\Resources\TestResource;
use Illuminate\Http\Request;
use Src\Infrastructure\CreateConcertController as InfrastructureCreateConcertController;
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
        $newConcert = $this->createConcertController->__invoke($request);

        return response($newConcert, 200);
    }
}
