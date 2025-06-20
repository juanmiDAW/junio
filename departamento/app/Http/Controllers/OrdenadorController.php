<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreOrdenadorRequest;
use App\Http\Requests\UpdateOrdenadorRequest;
use App\Models\Cambio;
use App\Models\Ordenador;
use Livewire\Volt\Actions\ReturnRules;

class OrdenadorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('ordenadores.index', ['ordenadores' => Ordenador::all()]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('ordenadores.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreOrdenadorRequest $request)
    {
        $validate = $request->validated();

        Ordenador::create($validate);

        return redirect()->route('ordenadores.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Ordenador $ordenador)
    {
        $ordenador = Ordenador::with('cambios')->where('id', $ordenador->id)->first();

        return view('ordenadores.show', ['ordenador'=>$ordenador]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Ordenador $ordenador)
    {


        return view('ordenadores.edit',['ordenador'=>$ordenador]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateOrdenadorRequest $request, Ordenador $ordenador)
    {

        $cambio = Ordenador::where('id', $ordenador->id)->first();
        if($cambio->aula_id != $request->aula_id){
            Cambio::create([
                'ordenador_id'=>$ordenador->id,
                'origen_id'=>$cambio->aula_id,
                'destino_id'=>$request->aula_id,
            ]);
        }
        $validate = $request->validated();

        $ordenador->fill($validate);

        $ordenador->save();

        return redirect()->route('ordenadores.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Ordenador $ordenador)
    {
        $ordenador->delete();

        return redirect()->route('ordenadores.index');
    }
}
