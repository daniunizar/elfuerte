@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col 12">
            <h1>Grupos</h1>
        </div>
    </div>
    <div class="row mt-5 mb-5">
        <div class="col-12" >
                <a href="{{route('grupos.create')}}"class="btn btn-primary">Nuevo Registro</a>
                <!--El href con la ruta lleva al método create del controller Grupos, que a su vez redirige a la view grupos.create-->
        </div>
    </div>
    <div class="row">
        <div class='col-12'>
        <table class="table table-bordered table-hover text-center">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Fecha</th>
                    <th scope="col">Cantidad</th>
                    <th scope="col">Mujeres Menores</th>
                    <th scope="col">Mujeres Jóvenes</th>
                    <th scope="col">Mujeres Adultas</th>
                    <th scope="col">Mujeres Mayores</th>
                    <th scope="col">Varones Menores</th>
                    <th scope="col">Varones Jovenes</th>
                    <th scope="col">Varones Adultos</th>
                    <th scope="col">Varones Mayores</th>
                    <th scope="col">Procedencia Internacional</th>
                    <th scope="col">Lugar de Procedencia</th>
                    <th scope="col" colspan="2">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($listado as $grupo)
                <tr>
                    <th scope="row">{{$grupo->id}}</th>
                    <td>{{$grupo->fecha_visita}}</td>
                    <td>{{$grupo->cantidadTotalVisitantes}}</td>
                    <td>{{$grupo->Mujeres_Menores}}</td>
                    <td>{{$grupo->Mujeres_Jovenes}}</td>
                    <td>{{$grupo->Mujeres_Adultas}}</td>
                    <td>{{$grupo->Mujeres_Mayores}}</td>
                    <td>{{$grupo->Varones_Menores}}</td>
                    <td>{{$grupo->Varones_Jovenes}}</td>
                    <td>{{$grupo->Varones_Adultos}}</td>
                    <td>{{$grupo->Varones_Mayores}}</td>
                    <td>{{$grupo->ProcedenciaInternacional}}</td>
                    <td>{{$grupo->LugarProcedencia}}</td>
                    <td>
                        <!-- <a href="{{url('/grupos/'.$grupo->id.'/edit')}}" class="btn btn-warning">Editar</a>     -->
                        <a href="{{route('grupos.edit', $grupo->id)}}" class="btn btn-warning">Editar</a>    
                    <td>
                        <form action="{{route('grupos.destroy', $grupo->id)}}" method='POST'>
                        @csrf
                        {{method_field('DELETE')}}
                            <input type="submit" id="btn_delete" class="btn btn-danger" value="Eliminar"></input></td>
                        </form>    
                </tr>
                @endforeach
            </tbody>
        </table>
        </div>
    </div>
</div>
<script>
    /*
    document.getElementById("btnCrear").addEventListener("click", fnSubmit);
    function fnSubmit(e){
        e.preventDefault();
        var target = this.dataset.target;
        var formulario = document.querySelector(target);
        var cantidad_total_visitantes = $('#cantidad_total_visitantes').val();
        var muj_men = $('#muj_men').val();
        var muj_jov = $('#muj_jov').val();
        var muj_adu = $('#muj_adu').val();
        var muj_may = $('#muj_may').val();
        var var_men = $('#var_men').val();
        var var_jov = $('#var_jov').val();
        var var_adu = $('#var_adu').val();
        var var_may = $('#var_may').val();
        var procedenciaInternacional = $('#procedenciaInternacional').val();
        var procedencia = $('#procedencia').val();
        var datos = new FormData(formularioGrupos); //metemos todos los datos del formulario en un FormData
        $.ajax({
          type: "POST",
          url: "{{route('grupos.store')}}",       
          data: datos,
          success: function(){
            $("#modal_grupos").modal('hide');
          },
          error: function(error){console.log("Ha ocurido un error: "+error)},
          processData: false,  // tell jQuery not to process the data
          contentType: false   // tell jQuery not to set contentType
        });
    }
    document.getElementById("btnActualizar").addEventListener("click", fnUpdate);
    function fnUpdate(e){
        e.preventDefault();
        var target = this.dataset.target;
        var formulario = document.querySelector(target);
        var cantidad_total_visitantes = $('#cantidad_total_visitantes').val();
        var muj_men = $('#muj_men').val();
        var muj_jov = $('#muj_jov').val();
        var muj_adu = $('#muj_adu').val();
        var muj_may = $('#muj_may').val();
        var var_men = $('#var_men').val();
        var var_jov = $('#var_jov').val();
        var var_adu = $('#var_adu').val();
        var var_may = $('#var_may').val();
        var procedenciaInternacional = $('#procedenciaInternacional').val();
        var procedencia = $('#procedencia').val();
        var datos = new FormData(formularioGrupos); //metemos todos los datos del formulario en un FormData
        var id = $('#id').val();
        datos.append('id', id); //Incluimos la ID del grupo para poder actualizarlo
        $.ajax({
          type: "PATCH",
          url: "{{url('/')}}/grupos/"+id,      
          data: datos,
          success: function(){
            $("#modal_grupos").modal('hide');
          },
          error: function(error){console.log("Ha ocurido un error: "+error)},
          processData: false,  // tell jQuery not to process the data
          contentType: false   // tell jQuery not to set contentType
        });
    }
    */
</script>

@endsection
