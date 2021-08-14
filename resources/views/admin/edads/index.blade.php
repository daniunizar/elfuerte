@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col 12">
            <h1>Rangos de Edad</h1>
        </div>
    </div>
    <div class="row mt-5 mb-5">
        <div class="col-12" >
                <a href="{{route('edads.create')}}"class="btn btn-primary">Nuevo Rango de Edad</a>
                <!--El href con la ruta lleva al método create del controller Procedencias, que a su vez redirige a la view procedencia.create-->
        </div>
    </div>
    <div class="row">
        <div class='col-12'>
        <table class="table table-bordered table-hover text-center">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Rango de Edad</th>
                    <th scope="col" colspan="2">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($listado as $edad)
                <tr>
                    <th scope="row">{{$edad->id}}</th>
                    <td>{{$edad->concepto}}</td>
                    <td>
                        <a href="{{route('edads.edit', $edad->id)}}" class="btn btn-warning">Editar</a>    
                    <td>
                        <form action="{{route('edads.destroy', $edad->id)}}" method='POST'>
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
