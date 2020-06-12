<?php

namespace App\Http\Controllers\Api;


use App\Api\ApiMessages;
use App\Http\Controllers\Controller;
use App\Client;
use App\ScheduleByClient;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Tymon\JWTAuth\JWTAuth;

class ClientController extends Controller
{

    private $client;

    public function __construct(User $client)
    {
        $this->client = $client;

    }


    public function index(Request $request)
    {

        $clients = $this->client;


        if ($request->has('conditions')) {
            $expressions = explode(';', $request->get('conditions'));

            foreach ($expressions as $e) {
                $exp = explode('=', $e);
                $clients = $clients->where($exp[0], $exp[1]); //  0 é o campo, 1 é o operador, 2 é o valor
            }
        }

        if ($request->has('fields')) {
            $fields = $request->get('fields');
            $clients = $clients->selectRaw($fields);
        }


        //$clients = auth()->user();
        return $clients->with('schedule')->get();





    }


    public function login(Request $request)
    {
        $credentials = $request->all(['email', 'password']);

        // Retorna instancia da guardians web
        //Attemp é quem tenta logar.

        if (!$token = auth('api')->attempt($credentials)) {
            //dd($credentials);
            $message = new ApiMessages("Acesso negado!");
            return response()->json($message->getMessage(), 401);
        }

        return response()->json([
            'status' => "OK",
            'token' => $token
        ]);
    }

    public function recoverData()
    {
        $client = auth()->user();

        return response()->json(
            ['data' => [
                $client
            ]], 200);
    }


    // Coloca o token do cara na blacklist
    public function logout()
    {

        auth('api')->logout();

        return response()->json(['Message' => 'Deslogado'], 200);
    }


    // Reseta o token, e joga o anterior pra blacklist
    public function refresh()
    {
        $token = auth('api')->refresh();

        return response()->json([
            'token' => $token
        ]);
    }


    public $loginAfterSignUp = true;

    public function store(Request $request)
    {
        $data = $request->all();

        Validator::make($data, [
            'email' => 'required',
            'password' => 'required',
            'name' => 'required',
            'phone' => 'required',


        ])->validate();

        try {

            $data['password'] = bcrypt($data['password']);

            $this->client->create($data);

            if ($this->loginAfterSignUp) {
                return $this->login($request);
            }


        } catch (\Exception $e) {
            $message = new ApiMessages($e->getMessage());
            return response()->json($message->getMessage(), 401);
        };

    }


    public function show($id)
    {
        try {

            $client = $this->client->findOrFail($id);

            return response()->json([
                'data' => $client
            ], 200);

        } catch (\Exception $e) {
            $message = new ApiMessages($e->getMessage());
            return response()->json($message->getMessage(), 401);
        }
    }


    public function update(Request $request, $id)
    {
        $data = $request->all();

        if ($request->has('password') && !$request->get('password')) {
            $data['password'] = bcrypt($data['password']);
        } else {
            unset($data['password']);
        }


        try {

            $client = $this->client->findOrFail($id);

            $client->update($data);


            return response()->json(
                ['data' => [
                    'msg' => 'Cliente atualizado com sucesso'
                ]], 200);

        } catch (\Exception $e) {
            $message = new ApiMessages($e->getMessage());
            return response()->json($message->getMessage(), 401);
        };
    }

    public function makeScheduleByClient(Request $request)
    {
        $scheduleData = $request->all();

        try {

            //$client = $this->client->findOrFail($id);
            $client = auth()->user();

            $data = $client->schedule()->create(
                [
                    'date' => $scheduleData['date'],
                    'time' => $scheduleData['time'],
                    'professionalName' => $scheduleData['professionalName'],
                    'serviceName' => $scheduleData['serviceName']
                ]
            );

            return response()->json(
                ['data' => [
                    //'msg' => 'Horário marcado com sucesso!',
                    $data,
                ]], 200);


        } catch (\Exception $e) {
            $message = new ApiMessages($e->getMessage());
            return response()->json($message->getMessage(), 401);
        };
    }





}
