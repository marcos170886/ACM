<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\PossibleSchedules;
use App\ScheduleByProfessional;
use Illuminate\Http\Request;

class PossibleScheduleController extends Controller


{

    private $possible;

    public function __construct(PossibleSchedules $possible)
    {
        $this->possible = $possible;
    }

    public function index()
    {
        $schedules = $this->possible->get();

        return response()->json([
            'data' => $schedules
        ], 200);;
    }


    public function store(Request $request)
    {
        $data = $request->all();


        $this->possible->create($data);

        return response()->json(
            ['data' => [
                'msg' => 'Horario cadastrado com sucesso'
            ]], 200);
    }


    public function show($id)
    {
        //
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
