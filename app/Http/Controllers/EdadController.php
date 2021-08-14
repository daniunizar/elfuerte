<?php

namespace App\Http\Controllers;

use App\Models\Edad;
use Illuminate\Http\Request;

class EdadController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $edads = Edad::orderBy('concepto', 'ASC')->get(); //De esta forma mostramos los registros ordenados por nombre alfabéticamente
        return view('admin.edads.index', ['listado' => $edads]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.edads.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $edad = Edad::Create($request->all());
        return redirect()->route('edads.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Edad  $edad
     * @return \Illuminate\Http\Response
     */
    public function show(Edad $edad)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Edad  $edad
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $edad = Edad::findOrFail($id);
        $concepto = $edad->concepto;
        return view('admin.edads.edit', ['edad' => $edad]); //Y la pasamos a la vista en una array
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Edad  $edad
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Edad $edad)
    {
        $edad->update($request->all());
        return redirect()->route('edads.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Edad  $edad
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Edad::destroy($id);
        return redirect()->route('edads.index');
    }
}
