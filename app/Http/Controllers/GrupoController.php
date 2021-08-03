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
        //$grupos = Grupo::all(); Forma original, cogíamos todos los registros y los ordenaba de menos a más.
        $grupos = Grupo::orderBy('fecha_visita', 'DESC')->get(); //De esta forma mostramos los registros ordenados por fecha de visita más reciente
        //Retornamos la vista a la que le pasamos por parámetro el listado de grupos para que nos lo muestre
        return view('grupos.index', ['listado' => $grupos]);
        //return view('grupos.index')->with('listado', $grupos); Alternativa válida a la línea anterior
        //PAGINAR O LIMITAR EL NÚMERO DE REGISTROS RECUPERADOS EN https://youtu.be/9DU7WLZeam8?t=3422 minuto 57
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('grupos.create');
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
        $grupo->Varones_Menores = $request->get('var_men');
        $grupo->Varones_Jovenes = $request->get('var_jov');
        $grupo->Varones_Adultos = $request->get('var_adu');
        $grupo->Varones_Mayores = $request->get('var_may');
        if($request->has('procedenciaInternacional')){
            //Checkbox checked
            $grupo->ProcedenciaInternacional = true;
        }else{
            //Checkbox not checked
            $grupo->ProcedenciaInternacional = false;
        }
        $grupo->LugarProcedencia = $request->get('procedencia');
        $grupo->save();
        return redirect()->route('grupos.index');
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
    public function edit($id)
    {
        $grupo = Grupo::findOrFail($id); //Buscamos en la BBDD la info de ese grupo concreto a partir de su ID
        $fecha_y_hora_visita = $grupo->fecha_visita;
        $fecha_explotada = explode(" ", $fecha_y_hora_visita);
        $fecha_visita = $fecha_explotada[0];
        $hora_visita = $fecha_explotada[1];
        //$fecha_visita = date("dmY", $fecha_visita); 

        return view('grupos.edit', ['grupo' => $grupo, 'fecha_visita'=>$fecha_visita, 'hora_visita'=>$hora_visita, 'fecha_y_hora_visita'=>$fecha_y_hora_visita]); //Y la pasamos a la vista en una array
        //return view('grupos.edit', compact('grupo')); //Forma alternativa si el nombre de la variable en que pasamos la info es el mismo que el que ya tenemos
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Grupo $grupo)
    {
        $grupo = Grupo::find($grupo->id);
        $grupo->cantidadTotalVisitantes = $request->get('cantidad_total_visitantes');
        $grupo->Mujeres_Menores = $request->get('muj_men');
        $grupo->Mujeres_Jovenes = $request->get('muj_jov');
        $grupo->Mujeres_Adultas = $request->get('muj_adu');
        $grupo->Mujeres_Mayores = $request->get('muj_may');
        $grupo->Varones_Menores = $request->get('var_men');
        $grupo->Varones_Jovenes = $request->get('var_jov');
        $grupo->Varones_Adultos = $request->get('var_adu');
        $grupo->Varones_Mayores = $request->get('var_may');
        if($request->get('procedenciaInternacional')!=null){
            $grupo->ProcedenciaInternacional = true;
        }else{
            $grupo->ProcedenciaInternacional = false;
        }
        $grupo->LugarProcedencia = $request->get('procedencia');
        $grupo->fecha_visita = $request->get('fecha_vis') . " " . $request->get('hora_vis');
        $grupo->update();
        return redirect()->route('grupos.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Grupo  $grupo
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Grupo::destroy($id);
        return redirect()->route('grupos.index');

    }
}
