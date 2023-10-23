<?php

namespace App\Http\Controllers;

use App\Models\Aula;
use App\Models\Turma;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AulaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $aula = Aula::all();
        $turma = Turma::all();
        $usuario = User::all();

        return view('actions.aula',[
            'aulas' => $aula,
            'turmas' => $turma,
            'professor' => $usuario
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        $turma = Turma::all();
        $usuario = User::all();

        return view('actions.createAula',[
            'turmas' => $turma,
            'usuarios' => $usuario
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->only([
            'turma',
            'nome',
        ]);

        $validator = Validator::make($data, [
            'turma' => ['required'],
            'nome' => ['required']
        ]);

        if ($validator->fails()) {
            return redirect()->route('create')
                ->withErrors($validator)
                ->withInput();
        };

        $aula = New Aula;

        $aula->nome_aula = $data['nome'];
        $aula->id_turma = $data['turma'];

        $aula->save();
    }

    public function check_up(string $id)
    {
        return redirect()->route('index');
    }
    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
