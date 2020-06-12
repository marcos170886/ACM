<?php

namespace App\Http\Controllers\Api;

use App\Api\ApiMessages;
use App\Client;
use App\Http\Controllers\Controller;
use App\ScheduleByClient;
use Illuminate\Http\Request;

class ScheduleClientController extends ClientController
{

    private $client;
    public function __construct(ScheduleByClient $client)
    {
        $this->client = $client;
    }

    /*public function index()
    {
        //$clients = $this->client->with->schedule()->count('date')->paginate(10);
        $clients = $this->client->with('schedule')->count('date')->paginate(10);

        return response()->json($clients, 200);

    }
*/

    public function store(Request $request)
    {
        //
    }


    public function show($id)
    {
        //
    }


    public function update(Request $request, $id)
    {
        //
    }


    public function cancelScheduleByClient($id)
    {
        try {

            $canceled = $this->client->findOrFail($id);

            $canceled->delete();


            return response()->json(
                ['data' => [
                    'msg' => 'Horário cancelado com sucesso!'
                ]], 200);

        } catch (\Exception $e) {
            $message = new ApiMessages($e->getMessage());
            return response()->json($message->getMessage(), 401);
        };
    }
}
