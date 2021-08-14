<?php

namespace App\Http\Controllers;

use App\Models\Procedencia;
use Illuminate\Http\Request;

class ProcedenciaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $procedencias = Procedencia::orderBy('concepto', 'ASC')->get(); //De esta forma mostramos los registros ordenados por nombre alfabéticamente
        return view('admin.procedencias.index', ['listado' => $procedencias]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.procedencias.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $procedencia = new Procedencia();
        $procedencia->concepto=$request->get('lugar_procedencia');
        if($request->has('procedencia_internacional')){
            //Checkbox checked
            $procedencia->internacional = true;
        }else{
            //Checkbox not checked
            $procedencia->internacional = false;
        }
        $procedencia->save();
        return redirect()->route('procedencias.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Procedencia  $procedencia
     * @return \Illuminate\Http\Response
     */
    public function show(Procedencia $procedencia)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Procedencia  $procedencia
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $procedencia = Procedencia::findOrFail($id);
        $concepto = $procedencia->concepto;
        $internacional = $procedencia->internacional;
        return view('admin.procedencias.edit', ['procedencia' => $procedencia]); //Y la pasamos a la vista en una array
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Procedencia  $procedencia
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Procedencia $procedencia)
    {
        $procedencia = Procedencia::find($procedencia->id);
        $procedencia->concepto=$request->get('lugar_procedencia');
        if($request->get('procedencia_internacional')!=null){
            $procedencia->internacional = true;
        }else{
            $procedencia->internacional = false;
        }
        $procedencia->update();
        return redirect()->route('procedencias.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Procedencia  $procedencia
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Procedencia::destroy($id);
        return redirect()->route('procedencias.index');
    }
}
