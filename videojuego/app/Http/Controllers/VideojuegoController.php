<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreVideojuegoRequest;
use App\Http\Requests\UpdateVideojuegoRequest;
use App\Models\Posesion;
use App\Models\User;
use App\Models\Videojuego;

class VideojuegoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $posesiones = Posesion::with('videojuego.desarrolladora.distribuidora')->where('user_id', auth()->user()->id)->get();
        return view('videojuegos.index', [
            'videojuegos' => Videojuego::all(),
            'posesiones' => $posesiones,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('videojuegos.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreVideojuegoRequest $request)
    {
        $validate = $request->validated();

        Videojuego::create($validate);
        return redirect()->route('videojuegos.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Videojuego $videojuego)
    {
        return view('videojuegos.show', ['videojuego' => $videojuego]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Videojuego $videojuego)
    {

        $existencia = Posesion::where('videojuego_id', $videojuego->id)->where('user_id', auth()->user()->id)->first();
        if($existencia !== null){
            return view('videojuegos.edit', ['videojuego' => $videojuego]);

        }else{
            return redirect()->route('videojuegos.index');
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateVideojuegoRequest $request, Videojuego $videojuego)
    {
        $validate = $request->validated();

        $videojuego->fill($validate);
        $videojuego->save();

        return redirect()->route('videojuegos.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Videojuego $videojuego)
    {
        $videojuego->delete();

        return redirect()->route('videojuegos.index');
    }
}
