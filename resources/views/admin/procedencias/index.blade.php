@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col 12">
            <h1>Lugares de Procedencia</h1>
        </div>
    </div>
    <div class="row mt-5 mb-5">
        <div class="col-12" >
                <a href="{{route('procedencias.create')}}"class="btn btn-primary">Nueva Procedencia</a>
                <!--El href con la ruta lleva al método create del controller Procedencias, que a su vez redirige a la view procedencia.create-->
        </div>
    </div>
    <div class="row">
        <div class='col-12'>
        <table class="table table-bordered table-hover text-center">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Concepto</th>
                    <th scope="col">Internacional</th>
                    <th scope="col" colspan="2">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($listado as $procedencia)
                <tr>
                    <th scope="row">{{$procedencia->id}}</th>
                    <td>{{$procedencia->concepto}}</td>
                    <td>{{$procedencia->internacional}}</td>
                    <td>
                        <a href="{{route('procedencias.edit', $procedencia->id)}}" class="btn btn-warning">Editar</a>    
                    <td>
                        <form action="{{route('procedencias.destroy', $procedencia->id)}}" method='POST'>
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

@endsection
