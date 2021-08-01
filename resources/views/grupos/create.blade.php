@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col 12">
            <h1>Grupos</h1>
        </div>
    </div>
    <div class="row mt-5 mb-5">
        <div class="col-12">
            <button type="button" class="btn btn-primary" id="btn_create">Nuevo Registro</button>
        </div>
    </div>
    <div class="row">
        <div class='col-12'>
        <table class="table table-bordered table-hover text-center">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Cantidad</th>
                    <th scope="col">Mujeres Menores</th>
                    <th scope="col">Mujeres Jóvenes</th>
                    <th scope="col">Mujeres Adultas</th>
                    <th scope="col">Mujeres Mayores</th>
                    <th scope="col">Hombres Menores</th>
                    <th scope="col">Hombres Jovenes</th>
                    <th scope="col">Hombres Adultos</th>
                    <th scope="col">Hombres Mayores</th>
                    <th scope="col">Procedencia Internacional</th>
                    <th scope="col">Lugar de Procedencia</th>
                    <th scope="col" colspan="2">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($listado as $grupo)
                <tr>
                    <th scope="row">{{$grupo->id}}</th>
                    <td>{{$grupo->cantidadTotalVisitantes}}</td>
                    <td>{{$grupo->Mujeres_Menores}}</td>
                    <td>{{$grupo->Mujeres_Jovenes}}</td>
                    <td>{{$grupo->Mujeres_Adultas}}</td>
                    <td>{{$grupo->Mujeres_Mayores}}</td>
                    <td>{{$grupo->Hombres_Menores}}</td>
                    <td>{{$grupo->Hombres_Jovenes}}</td>
                    <td>{{$grupo->Hombres_Adultos}}</td>
                    <td>{{$grupo->Hombres_Mayores}}</td>
                    <td>{{$grupo->ProcedenciaInternacional}}</td>
                    <td>{{$grupo->LugarProcedencia}}</td>
                    <td><button type="button" id="btn_edit" class="btn btn-warning">Editar</button></td>
                    <td><button type="button" id="btn_delete" class="btn btn-danger">Eliminar</button></td>
                </tr>
                @endforeach
            </tbody>
        </table>
        </div>
    </div>
<!-- Modal Grupos-->
<div class="modal fade" id="modal_grupos" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="modal_gruposLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modal_gruposLabel">Grupos</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form>
            <div class="form-group">
                <label for="cantidad_total_visitantes">Cantidad Total de Visitantes</label>
                <input type="number" class="form-control" id="cantidad_total_visitantes" aria-describedby="totalHelp" min=0 value=0>
                <small id="totalHelp" class="form-text text-muted">Cantidad total de visitantes</small>
            </div>
            <div class="form-group">
                <table class="text-center">
                    <tr>
                        <th></th>
                        <th scope="col">&lt;18</th>
                        <th scope="col">&lt;35</th>
                        <th scope="col">&lt;65</th>
                        <th scope="col">65+</th>
                    </tr>
                    <tr>
                        <th scope="row">Mujeres</th>
                        <td>                
                            <input type="number" class="form-control text-center" id="muj_men" min=0 value=0>
                        </td>
                        <td>
                            <input type="number" class="form-control text-center" id="muj_jov" min=0 value=0>       
                        </td>
                        <td>
                            <input type="number" class="form-control text-center" id="muj_adu" min=0 value=0>
                        </td>
                        <td>
                            <input type="number" class="form-control text-center" id="muj_may" min=0 value=0>
                        </td>
                    </tr>
                    <tr>
                        <th scope="row">Varones</th>
                        <td>                
                            <input type="number" class="form-control text-center" id="var_men" min=0 value=0>
                        </td>
                        <td>
                            <input type="number" class="form-control text-center" id="var_jov" min=0 value=0>       
                        </td>
                        <td>
                            <input type="number" class="form-control text-center" id="var_adu" min=0 value=0>
                        </td>
                        <td>
                            <input type="number" class="form-control text-center" id="var_may" min=0 value=0>
                        </td>
                    </tr>
                </table>
            </div>
            <div class="form-group form-check">
                <input type="checkbox" class="form-check-input" id="procedenciaInternacional">
                <label class="form-check-label" for="procedenciaInternacional">Procedencia Internacional</label>
            </div>
            <div class="form-group">
                <label for="procedencia">Procedencia</label>
                <select class="form-control" id="procedencia">
                <option>Francia</option>
                <option>2</option>
                <option>3</option>
                <option>4</option>
                <option>5</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Registrar</button>
        <button type="button" class="btn btn-primary">Editar</button>
      </div>
    </div>
  </div>
</div>
<!-- Fin Modal Grupos-->
</div>


@endsection
