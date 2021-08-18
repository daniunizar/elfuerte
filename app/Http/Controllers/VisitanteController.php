<?php

namespace App\Http\Controllers;

use App\Models\Visitante;
use App\Models\Procedencia;
use App\Models\Edad;
use App\Models\Sexo;
use App\Models\Lote;

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
        $edads = Edad::orderBy('orden', 'ASC')->get();  
        $sexos = Sexo::orderBy('orden', 'ASC')->get();
        return view('visitantes.create', ['listado_procedencias_internacionales' => $procedencias_internacionales, 'listado_procedencias_nacionales' => $procedencias_nacionales, 'listado_edads'=>$edads, 'listado_sexos'=>$sexos]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //return $request->all();
        //Primero creamos el lote
        Lote::Create();
        //Recuperamos la id del lote
        $last_lote_id = Lote::latest('id')->first();
        //Recuperamos la request, y de ella hacemo un bucle teniendo en cuenta el número de visitantes total
        $edads = Edad::all();  
        $sexos = Sexo::all();
        foreach ($sexos as $sexo){
            foreach ($edads as $edad){
                $aux = $request->get($sexo->concepto.'_'.$edad->concepto);
                if($aux>0){
                    for($i=0; $i<$aux; $i++){
                        $visitante = new Visitante();
                        $visitante->sexo_id=$sexo->id;
                        $visitante->edad_id=$edad->id;
                        $visitante->procedencia_id=$request->get('procedencia');
                        $visitante->lote_id=$last_lote_id->id;
                        $visitante->save();
                    }
                }
            }
        }

        //Para cada visitante hacemos un registro en visitantes y de lote de damos el valor recuperado
        //Volvemos a la página de index
        return redirect()->route('visitantes.index');

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
    public function edit($id)
    {
        $edads = Edad::all();  
        $sexos = Sexo::all();
        $procedencias_internacionales = Procedencia::where('internacional', true)->get();
        $procedencias_nacionales = Procedencia::where('internacional', false)->get();
        $visitante = Visitante::findOrFail($id);
        //$visitante = $visitante->concepto;
        return view('visitantes.edit', ['visitante' => $visitante, 'sexos'=>$sexos, 'edads'=>$edads, 'listado_procedencias_internacionales' => $procedencias_internacionales, 'listado_procedencias_nacionales' => $procedencias_nacionales]); 
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
        $visitante->update($request->all());
        return redirect()->route('visitantes.index');
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
