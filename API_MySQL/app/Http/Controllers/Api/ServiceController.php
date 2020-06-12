<?php

namespace App\Http\Controllers\Api;

use App\Api\ApiMessages;
use App\Service;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ServiceController extends Controller
{

    private $service;

    public function __construct(Service $service)
    {
        $this->service = $service;
    }


    public function index()
    {
        $services = $this->service->with('typesOfService')->get();

        return response()->json(['data' => $services], 200);

    }


    public function store(Request $request)
    {
        $data = $request->all();

        try {

            $service = $this->service->create($data);


            return response()->json(
                ['data' => [
                    'msg' => 'Cadastro de serviço realizado com sucesso'
                ]], 200);

        } catch (\Exception $e) {
            $message = new ApiMessages($e->getMessage());
            return response()->json($message->getMessage(), 401);
        };
    }


    public function show($id)
    {

        try {

            $service = $this->service->findOrFail($id);

            return response()->json([
                'data' => $service
            ], 200);

        } catch (\Exception $e) {
            $message = new ApiMessages($e->getMessage());
            return response()->json($message->getMessage(), 401);
        }
    }


    public function RegisterTypeService(Request $request, $id)
    {
        $data = $request->all();

        try {

            $service = $this->service->findOrFail($id);

            $service->typesOfService()->create(
                [
                    'name' => $data['name'],
                    'price' => $data['price']
                ]
            );

            return response()->json([
                'msg' => 'Tipo de serviço cadastrado com sucesso!',
                'data' => $data
            ], 200);


        } catch (\Exception $e) {
            $message = new ApiMessages($e->getMessage());
            return response()->json($message->getMessage(), 401);
        }
    }


    public function update(Request $request, $id)
    {
        //
    }


    public function destroy($id)
    {
        //
    }
}
