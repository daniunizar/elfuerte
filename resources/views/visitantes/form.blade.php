<input type="hidden" id="proc_inter_recu" name="proc_inter_recu" value="{{$listado_procedencias_internacionales}}">
<input type="hidden" id="proc_nac_recu" name="proc_nac_recu" value="{{$listado_procedencias_nacionales}}">
<div class="form-group">
    <label for="cantidad_total_visitantes">Cantidad Total de Visitantes</label>
    <input type="number" class="form-control" id="cantidad_total_visitantes" name="cantidad_total_visitantes" aria-describedby="totalHelp" min=0 value="{{isset($grupo->cantidadTotalVisitantes)?$grupo->cantidadTotalVisitantes:0}}">
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
                <input type="number" class="form-control text-center" id="muj_men" name="muj_men" min=0 value="{{isset($grupo->Mujeres_Menores)?$grupo->Mujeres_Menores:0}}">
            </td>
            <td>
                <input type="number" class="form-control text-center" id="muj_jov" name="muj_jov" min=0 value="{{isset($grupo->Mujeres_Jovenes)?$grupo->Mujeres_Jovenes:0}}">       
            </td>
            <td>
                <input type="number" class="form-control text-center" id="muj_adu" name="muj_adu" min=0 value="{{isset($grupo->Mujeres_Adultas)?$grupo->Mujeres_Adultas:0}}">
            </td>
            <td>
                <input type="number" class="form-control text-center" id="muj_may" name="muj_may" min=0 value="{{isset($grupo->Mujeres_Mayores)?$grupo->Mujeres_Mayores:0}}">
            </td>
        </tr>
        <tr>
            <th scope="row">Varones</th>
            <td>                
                <input type="number" class="form-control text-center" id="var_men" name="var_men" min=0 value="{{isset($grupo->Varones_Menores)?$grupo->Varones_Menores:0}}">
            </td>
            <td>
                <input type="number" class="form-control text-center" id="var_jov" name="var_jov" min=0 value="{{isset($grupo->Varones_Jovenes)?$grupo->Varones_Jovenes:0}}">       
            </td>
            <td>
                <input type="number" class="form-control text-center" id="var_adu" name="var_adu" min=0 value="{{isset($grupo->Varones_Adultos)?$grupo->Varones_Adultos:0}}">
            </td>
            <td>
                <input type="number" class="form-control text-center" id="var_may" name="var_may" min=0 value="{{isset($grupo->Varones_Mayores)?$grupo->Varones_Mayores:0}}">
            </td>
        </tr>
    </table>
</div>
<div class="form-group form-check">
    @isset($grupo->ProcedenciaInternacional)
        @if($grupo->ProcedenciaInternacional == 0)
        <input type="checkbox" class="form-check-input" id="procedenciaInternacional" name="procedenciaInternacional">
        @else
        <input type="checkbox" class="form-check-input" id="procedenciaInternacional" name="procedenciaInternacional" checked>
        @endif
    @else
    <input type="checkbox" class="form-check-input" id="procedenciaInternacional" name="procedenciaInternacional">
    @endif
    <label class="form-check-label" for="procedenciaInternacional">Procedencia Internacional</label>
    

</div>
<div class="form-group">
    <label for="procedencia">Procedencia</label>
    <select class="form-control" id="procedencia" name="procedencia">
    <optgroup label="Internacional" name="procedencia_inter" id="procedencia_inter"> 
        @foreach($listado_procedencias_internacionales as $procedencia_internacional)
            <option value="{{$procedencia_internacional->id}}">{{$procedencia_internacional->concepto}}</option>
        @endforeach
    </optgroup> 
    <optgroup label="Nacional" name="procedencia_nacional" id="procedencia_nacional"> 
        @foreach($listado_procedencias_nacionales as $procedencia_nacional)
            <option value="{{$procedencia_nacional->id}}">{{$procedencia_nacional->concepto}}</option>
        @endforeach
    </optgroup> 
    </select>
</div>
<a href="{{ route('grupos.index') }}" class="btn btn-secondary">Cancelar</a> <!--Este enlace lleva al método index del controlador Grupos que retorna la vista grupos.index con el listado de grupos-->

