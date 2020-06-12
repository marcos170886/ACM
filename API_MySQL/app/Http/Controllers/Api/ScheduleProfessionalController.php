<?php

namespace App\Http\Controllers\Api;

use App\Api\ApiMessages;
use App\Http\Controllers\Controller;
use App\ScheduleByClient;
use App\ScheduleByProfessional;
use Illuminate\Http\Request;

class ScheduleProfessionalController extends Controller
{
    private $professional;
    public function __construct(ScheduleByProfessional $professional)
    {
        $this->professional = $professional;
    }

    public function index(Request $request)
    {

        $professional = $this->professional;

        if ($request->has('conditions')){
            $expressions = explode(';', $request->get('conditions'));

            foreach ($expressions as $e){
                $exp = explode('=', $e);
                $professional = $professional->where($exp[0], $exp[1]); //
            }
        }

        if($request->has('fields')){
            $fields = $request->get('fields');
            $professional = $professional->selectRaw($fields);
        }


        return response()->json([
            'data' => $professional->get()
        ], 200);

        //return response()->json($professional->with('professional')->get(), 200);

    }

    public function store(Request $request)
    {
        //
    }

    // TESTE PARA RECUPERAR HORARIOS PELO ID DO PROFISSIONAL
    public function show($id)
    {

        try {

            $professionalId = $this->professional->findOrFail($id); //
            $professional = $professionalId->where('professional_id', $professionalId['id'])->get('dateTime');

            return response()->json([
                'data' => $professional
            ], 200);

        } catch (\Exception $e) {
            $message = new ApiMessages($e->getMessage());
            return response()->json($message->getMessage(), 401);
        }

    }


    public function cancelScheduleByProfessional($id)
    {
        try {

            $canceled = $this->professional->findOrFail($id);

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


    public function update(Request $request, $id)
    {
        //
    }


    public function destroy($id)
    {
        //
    }
}
