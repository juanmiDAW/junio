<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreMuebleRequest;
use App\Http\Requests\UpdateMuebleRequest;
use App\Models\Mueble;
use Livewire\Volt\Actions\ReturnRules;

class MuebleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('muebles.index', ['muebles'=>Mueble::all()]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('muebles.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreMuebleRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Mueble $mueble)
    {
        return view('muebles.show', ['mueble' => $mueble]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Mueble $mueble)
    {

        $muebleBusqueda = Mueble::with('fabricable')->find($mueble->id);

        return view('muebles.edit', ['mueble' =>$muebleBusqueda]);
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateMuebleRequest $request, Mueble $mueble)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Mueble $mueble)
    {
        $mueble->delete();

        return redirect()->route('muebles.index');
    }
}
