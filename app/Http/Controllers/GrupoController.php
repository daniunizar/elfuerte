<?php

namespace App\Http\Controllers;

use App\Models\Grupo;
use Illuminate\Http\Request;

class GrupoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //Recuperamos los registros de grupos existentes en la BBDD
        $grupos = Grupo::all();
        //Retornamos la vista a la que le pasamos por parámetro el listado de grupos para que nos lo muestre
        return view('grupos.index', ['listado' => $grupos]);
        //return view('grupos.index')->with('listado', $grupos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $grupo = new Grupo();
        //El nombre que sigue al get es el name de los campos del formulario de la Modal o la vista
        $grupo->cantidadTotalVisitantes = $request->get('cantidad_total_visitantes');
        $grupo->Mujeres_Menores = $request->get('muj_men');
        $grupo->Mujeres_Jovenes = $request->get('muj_jov');
        $grupo->Mujeres_Adultas = $request->get('muj_adu');
        $grupo->Mujeres_Mayores = $request->get('muj_may');
        $grupo->Hombres_Menores = $request->get('var_men');
        $grupo->Hombres_Jovenes = $request->get('var_jov');
        $grupo->Hombres_Adultos = $request->get('var_adu');
        $grupo->Hombres_Mayores = $request->get('var_may');
        //$grupo->ProcedenciaInternacional = $request->get('procedenciaInternacional');
        $grupo->ProcedenciaInternacional = 0;
        $grupo->LugarProcedencia = $request->get('procedencia');
        $grupo->save();
        return redirect('/grupos');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Grupo  $grupo
     * @return \Illuminate\Http\Response
     */
    public function show(Grupo $grupo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Grupo  $grupo
     * @return \Illuminate\Http\Response
     */
    public function edit(Grupo $grupo)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        dump("Hola");
        $grupo = Grupo::find($request->id);
        $grupo->cantidadTotalVisitantes = $request->get('cantidad_total_visitantes');
        $grupo->Mujeres_Menores = $request->get('muj_men');
        $grupo->Mujeres_Jovenes = $request->get('muj_jov');
        $grupo->Mujeres_Adultas = $request->get('muj_adu');
        $grupo->Mujeres_Mayores = $request->get('muj_may');
        $grupo->Hombres_Menores = $request->get('var_men');
        $grupo->Hombres_Jovenes = $request->get('var_jov');
        $grupo->Hombres_Adultos = $request->get('var_adu');
        $grupo->Hombres_Mayores = $request->get('var_may');
        $grupo->ProcedenciaInternacional = 0;
        $grupo->LugarProcedencia = $request->get('procedencia');
        $grupo->update();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Grupo  $grupo
     * @return \Illuminate\Http\Response
     */
    public function destroy(Grupo $grupo)
    {
        //
    }
}
