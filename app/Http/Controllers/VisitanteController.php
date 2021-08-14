<?php

namespace App\Http\Controllers;

use App\Models\Visitante;
use App\Models\Procedencia;

use Illuminate\Http\Request;

class VisitanteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $visitantes = Visitante::orderBy('id', 'DESC')->get(); //De esta forma mostramos los registros ordenados por fecha de visita más reciente
        return view('visitantes.index', ['listado' => $visitantes]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $procedencias_internacionales = Procedencia::where('internacional', true)->get();
        $procedencias_nacionales = Procedencia::where('internacional', false)->get();

        return view('visitantes.create', ['listado_procedencias_internacionales' => $procedencias_internacionales, 'listado_procedencias_nacionales' => $procedencias_nacionales]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Visitante  $visitante
     * @return \Illuminate\Http\Response
     */
    public function show(Visitante $visitante)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Visitante  $visitante
     * @return \Illuminate\Http\Response
     */
    public function edit(Visitante $visitante)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Visitante  $visitante
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Visitante $visitante)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Visitante  $visitante
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Visitante::destroy($id);
        return redirect()->route('visitantes.index');
    }
}
