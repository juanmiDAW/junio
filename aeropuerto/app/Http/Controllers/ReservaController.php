<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreReservaRequest;
use App\Http\Requests\UpdateReservaRequest;
use App\Models\Reserva;
use App\Models\Vuelo;
use DateTime;
use Illuminate\Http\Request;

use function PHPUnit\Framework\returnSelf;

class ReservaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $reservas = Reserva::where ('user_id', auth()->user()->id)->with(['vuelo', 'vuelo.aeropuertoOrigen', 'vuelo.aeropuertoDestino'])->get();
        return view('reservas.index',['reservas'=>$reservas]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $vuelo = Vuelo::Where('id',$request->vuelo_id)->first();
        $reservas = Reserva::where('vuelo_id', $request->vuelo_id )->count();
        if($reservas >= $vuelo->plazas){
            return redirect()->route('vuelos.index')->with('info', 'No hay plazas disponibles');
        }else{

            $fecha = new DateTime();
            // dd($fecha);
            
            $reserva = new Reserva();
            $reserva->vuelo_id = $request->vuelo_id;
            $reserva->fecha_compra = $fecha;
            $reserva->user_id = auth()->user()->id;
            $reserva->asiento = $request->asiento;
            $reserva->save();
            return redirect()->route('vuelos.index')->with('info', 'Reserva realizada con exito');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Reserva $reserva)
    {
        return view('reservas.show', ['reserva'=>$reserva]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Reserva $reserva)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateReservaRequest $request, Reserva $reserva)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Reserva $reserva)
    {
        //
    }
}
