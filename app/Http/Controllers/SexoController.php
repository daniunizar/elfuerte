<?php

namespace App\Http\Controllers;

use App\Models\Sexo;
use Illuminate\Http\Request;

class SexoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sexos = Sexo::orderBy('concepto', 'ASC')->get(); //De esta forma mostramos los registros ordenados por nombre alfabéticamente
        return view('admin.sexos.index', ['listado' => $sexos]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.sexos.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $sexo = Sexo::Create($request->all());
        return redirect()->route('sexos.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Sexo  $sexo
     * @return \Illuminate\Http\Response
     */
    public function show(Sexo $sexo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Sexo  $sexo
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $sexo = Sexo::findOrFail($id);
        $concepto = $sexo->concepto;
        return view('admin.sexos.edit', ['sexo' => $sexo]); //Y la pasamos a la vista en una array
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Sexo  $sexo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Sexo $sexo)
    {
        $sexo->update($request->all());
        return redirect()->route('sexos.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Sexo  $sexo
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Sexo::destroy($id);
        return redirect()->route('sexos.index');
    }
}
