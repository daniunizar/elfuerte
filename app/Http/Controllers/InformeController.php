<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Visitante;
use App\Models\Procedencia;
use App\Models\Edad;
use App\Models\Sexo;
use App\Models\Lote;

class InformeController extends Controller
{
    
    public function informar(Request $request){
        $inicio= $request->inicio;
        $final_parcial = $request->final;
        $final=$final_parcial . ' 23:59:00';
        $resultado_sexos = $this->obtenerInformeSexo($inicio, $final);
        $resultado_edads = $this->obtenerInformeEdad($inicio, $final);
        $resultado_sexo_edad = $this->obtenerInformeSexoEdad($inicio, $final);
        $resultado_tipo_procedencia = $this->obtenerInformeTipoProcedencia($inicio, $final);
        $resultado_procedencia_nacional = $this->obtenerInformeProcedenciaNacional($inicio, $final);
        $resultado_procedencia_internacional = $this->obtenerInformeProcedenciaInterNacional($inicio, $final);
        return view('informes.resultado', ['resultado_sexos'=>$resultado_sexos, 'resultado_edads'=>$resultado_edads,
         'resultado_sexo_edad'=>$resultado_sexo_edad,
          'resultado_tipo_procedencia'=>$resultado_tipo_procedencia,
          'resultado_procedencia_nacional'=>$resultado_procedencia_nacional,
          'resultado_procedencia_internacional'=>$resultado_procedencia_internacional        
        ]); 
    }

    public function obtenerInformeSexo($inicio, $final){
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

    public function obtenerInformeSexoEdad($inicio, $final){
        $sexos = Sexo::all();
        $edads = Edad::all();
        $aux = [];
        foreach($sexos as $sexo){
            foreach($edads as $edad){
                $resultado = Visitante::where('sexo_id', $sexo->id)
                ->where('edad_id', $edad->id)
                ->join('lotes', 'lotes.id', '=', 'visitantes.lote_id')
                ->where("lotes.fecha", ">=", $inicio)
                ->where("lotes.fecha", "<=", $final)
                ->count();
                $aux[$sexo->concepto.' '.$edad->concepto]=$resultado;
            }
        }
        return $aux;
    }

    public function obtenerInformeTipoProcedencia($inicio, $final){
            $internacional = Visitante::join('lotes', 'lotes.id', '=', 'visitantes.lote_id')
            ->join('procedencias', 'procedencias.id', '=', 'visitantes.procedencia_id')
            ->where("lotes.fecha", ">=", $inicio)
            ->where("lotes.fecha", "<=", $final)
            ->where ("procedencias.internacional", true)
            ->count();
            $nacional = Visitante::join('lotes', 'lotes.id', '=', 'visitantes.lote_id')
            ->join('procedencias', 'procedencias.id', '=', 'visitantes.procedencia_id')
            ->where("lotes.fecha", ">=", $inicio)
            ->where("lotes.fecha", "<=", $final)
            ->where ("procedencias.internacional", false)
            ->count();

        $resultado =  [];
        $resultado['internacional']=$internacional;
        $resultado['nacional']=$nacional; 
        return $resultado;
    }

    public function obtenerInformeProcedenciaNacional($inicio, $final){
        $procedencias = Procedencia::where('internacional', 0)->get();
        $aux = [];
        foreach($procedencias as $procedencia){
            $resultado = Visitante::join('lotes', 'lotes.id', '=', 'visitantes.lote_id')
            ->join('procedencias', 'procedencias.id', '=', 'visitantes.procedencia_id')
            ->where("lotes.fecha", ">=", $inicio)
            ->where("lotes.fecha", "<=", $final)
            ->where("visitantes.procedencia_id", $procedencia->id)
            ->count();
            $aux[$procedencia->concepto]=$resultado;
        }
        return $aux;
    }
    
    public function obtenerInformeProcedenciaInterNacional($inicio, $final){
        $procedencias = Procedencia::where('internacional', 1)->get();
        $aux = [];
        foreach($procedencias as $procedencia){
            $resultado = Visitante::join('lotes', 'lotes.id', '=', 'visitantes.lote_id')
            ->join('procedencias', 'procedencias.id', '=', 'visitantes.procedencia_id')
            ->where("lotes.fecha", ">=", $inicio)
            ->where("lotes.fecha", "<=", $final)
            ->where("visitantes.procedencia_id", $procedencia->id)
            ->count();
            $aux[$procedencia->concepto]=$resultado;
        }
        return $aux;
    }


    
}
