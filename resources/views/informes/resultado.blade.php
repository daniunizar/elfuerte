@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col 12">
            <h1>Resultado de Informe</h1>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
        <table>
            <tr>
                <th>Sexo</th>
                <th>Cantidad</th>
                <th>Porcentaje</th>
            </tr>
            @foreach($resultado_sexos as $clave=>$valor)
            <tr>
                <td>{{$clave}}</td>
                <td>{{$valor}}</td>
                <td>{{$valor}}</td>
            </tr>
            @endforeach
        </table>

        <table>
            <tr>
                <th>Edad</th>
                <th>Cantidad</th>
                <th>Porcentaje</th>
            </tr>
            @foreach($resultado_edads as $clave=>$valor)
            <tr>
                <td>{{$clave}}</td>
                <td>{{$valor}}</td>
                <td>{{$valor}}</td>
            </tr>
            @endforeach
        </table>

        <table>
            <tr>
                <th>Sexo y Rango de edad</th>
                <th>Cantidad</th>
                <th>Porcentaje</th>
            </tr>
            @foreach($resultado_sexo_edad as $clave=>$valor)
            <tr>
                <td>{{$clave}}</td>
                <td>{{$valor}}</td>
                <td>{{$valor}}</td>
            </tr>
            @endforeach
        </table>

        <table>
            <tr>
                <th>Tipo de Procedencia</th>
                <th>Cantidad</th>
                <th>Porcentaje</th>
            </tr>
            @foreach($resultado_tipo_procedencia as $clave=>$valor)
            <tr>
                <td>{{$clave}}</td>
                <td>{{$valor}}</td>
                <td>{{$valor}}</td>
            </tr>
            @endforeach
        </table>

        <table>
            <tr>
                <th>Procedencia Nacional</th>
                <th>Cantidad</th>
                <th>Porcentaje</th>
            </tr>
            @foreach($resultado_procedencia_nacional as $clave=>$valor)
            <tr>
                <td>{{$clave}}</td>
                <td>{{$valor}}</td>
                <td>{{$valor}}</td>
            </tr>
            @endforeach
        </table>

        <table>
            <tr>
                <th>Procedencia Internacional</th>
                <th>Cantidad</th>
                <th>Porcentaje</th>
            </tr>
            @foreach($resultado_procedencia_internacional as $clave=>$valor)
            <tr>
                <td>{{$clave}}</td>
                <td>{{$valor}}</td>
                <td>{{$valor}}</td>
            </tr>
            @endforeach
        </table>
        </div>
    </div>
</div>

@endsection