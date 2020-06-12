<?php

namespace App\Http\Controllers\Api;

use App\Api\ApiMessages;
use App\Professional;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ProfessionalController extends Controller
{


    private $professional;
    public function __construct(Professional $professional)
    {
       $this->professional = $professional;
    }


    public function index()
    {
        $professionals = $this->professional->with('schedule')->get();

        return response()->json($professionals, 200);
    }




    public function store(Request $request)
    {
        $data = $request->all();


        try {

            $professional = $this->professional->create($data);


            return response()->json(
                ['data' => [
                    'msg' => 'Cadastro de profissional realizado com sucesso'
                ]], 200);

        } catch (\Exception $e) {
            $message = new ApiMessages($e->getMessage());
            return response()->json($message->getMessage(), 401);
        };
    }


    public function show($id)
    {
        try {

            $professional = $this->professional->with('service')->findOrFail($id);

            return response()->json([
                'data' => $professional
            ], 200);

        } catch (\Exception $e) {
            $message = new ApiMessages($e->getMessage());
            return response()->json($message->getMessage(), 401);
        }
    }



    public function update(Request $request, $id)
    {
        $data = $request->all();


        try {

            $professional = $this->professional->findOrFail($id);
            $professional->update($data);


            return response()->json(
                ['data' => [
                    'msg' => 'Cliente atualizado com sucesso'
                ]], 200);

        } catch (\Exception $e) {
            $message = new ApiMessages($e->getMessage());
            return response()->json($message->getMessage(), 401);
        };
    }

    public function destroy($id)
    {
        //
    }

    public function makeScheduleByProfessional(Request $request, $id){
        $scheduleData = $request->all();

        try {

            $professional = $this->professional->findOrFail($id);


            $professional->schedule()->create(
                [
                    'date' => $scheduleData['date'],
                    'time' => $scheduleData['time']
                ]
            );

            return response()->json(
                ['data' => [
                    'msg' => 'Horário marcado com sucesso!'
                ]], 200);


        } catch (\Exception $e) {
            $message = new ApiMessages($e->getMessage());
            return response()->json($message->getMessage(), 401);
        };
    }


    public function getIdByName(String $professional){
        $id = $this->professional->where('professionalName', $professional)->first()->id;

        return $id;
    }

    public function namesProfessional(){
        $names = $this->professional->get('professionalName');

        return response()->json([
            'data' => $names
        ], 200);
    }

    public function getNameByService(String $service){
        $names = $this->professional->where('professionalService', $service)->get();

        return response()->json([
            'data' => $names
        ], 200);

    }
}
