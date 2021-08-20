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
        $fecha_visita = $visitante->lote->fecha; //aaaa-mm-dd hh:mm:ss
        $fecha_visita_explotada = explode(' ',$fecha_visita);
        $fecha_aislada = $fecha_visita_explotada[0];//aaaa-mm-dd
        $hora_aislada = $fecha_visita_explotada[1];//hh:mm:ss
        $fecha_explotada = explode('-', $fecha_aislada); 
        $hora_explotada = explode(':', $hora_aislada); 
        $anyo = $fecha_explotada[0];
        $mes = $fecha_explotada[1];
        $dia = $fecha_explotada[2];
        $hora = $hora_explotada[0];
        $minutos = $hora_explotada[1];
        $hora_formateada = $hora .":". $minutos;

        //$visitante = $visitante->concepto;
        return view('visitantes.edit', ['visitante' => $visitante, 'sexos'=>$sexos, 'edads'=>$edads, 'listado_procedencias_internacionales' => $procedencias_internacionales, 'listado_procedencias_nacionales' => $procedencias_nacionales, 'fecha_visita'=>$fecha_aislada, 'hora_visita'=>$hora_formateada]); 
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
        //$visitante->update($request->all());
        $visitante = Visitante::find($visitante->id);
        $visitante->sexo_id = $request->sexo_id;
        $visitante->edad_id = $request->edad_id;
        $visitante->procedencia_id = $request->procedencia_id;
        $fecha = $request->dia . " " . $request->hora.":00";
        $visitante->lote->fecha = $fecha;
        $visitante->update();
        $visitante->lote->update();
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

    public function informar(Request $request){
        $inicio= $request->inicio;
        $final_parcial = $request->final;
        $final=$final_parcial . ' 23_59:00';
        $resultado_sexos = $this->obtenerInformeSexos($inicio, $final);
        $resultado_edads = $this->obtenerInformeEdad($inicio, $final);
        // $sexos = Sexo::all();
        // $edads = Edad::all();
        // $procedencias = Procedencia::all();
        // $visitantes = Visitante::all();
        // $seleccion = Visitante::join('lotes', 'lotes.id', '=', 'visitantes.lote_id')
        // ->select('*')
        // ->where("lotes.fecha", ">=", $inicio)
        // ->where("lotes.fecha", "<=", $final)
        // ->get(); //parámetros: tabla2, tabla2.campotabla, comparador, tabla1.campotabla
        // dd($seleccion);
        // return view('informes.resultado', ['sexos'=>$sexos, 'edads'=>$edads, 'procedencias'=>$procedencias, 'visitantes' => $visitantes, ]); 
        return view('informes.resultado', ['resultado_sexos'=>$resultado_sexos, 'resultado_edads'=>$resultado_edads]); 
    }

    public function obtenerInformeSexos($inicio, $final){
        $sexos = Sexo::all();
        $aux = [];
        foreach($sexos as $sexo){
            $resultado = Visitante::where('sexo_id', $sexo->id)
            ->join('lotes', 'lotes.id', '=', 'visitantes.lote_id')
            ->where("lotes.fecha", ">=", $inicio)
            ->where("lotes.fecha", "<=", $final)
            ->count();
            $aux[$sexo->concepto]=$resultado;
        }
        return $aux;
    }
    public function obtenerInformeEdad($inicio, $final){
        $edads = Edad::all();
        $aux = [];
        foreach($edads as $edad){
            $resultado = Visitante::where('edad_id', $edad->id)
            ->join('lotes', 'lotes.id', '=', 'visitantes.lote_id')
            ->where("lotes.fecha", ">=", $inicio)
            ->where("lotes.fecha", "<=", $final)
            ->count();
            $aux[$edad->concepto]=$resultado;
        }
        return $aux;
    }

}
