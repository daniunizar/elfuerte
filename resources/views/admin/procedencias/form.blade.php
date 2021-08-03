<div class="form-group">
    <label for="lugar_procedencia">Lugar de procedencia</label>
    <input type="text" class="form-control" id="lugar_procedencia" name="lugar_procedencia" value="{{isset($procedencia->concepto)?$procedencia->concepto:''}}">
</div>
 <div class="form-check">
    @isset($procedencia->internacional)
        @if($procedencia->internacional == 0)
        <input type="checkbox" class="form-check-input" id="procedencia_internacional" name="procedencia_internacional">
        @else
        <input type="checkbox" class="form-check-input" id="procedencia_internacional" name="procedencia_internacional" checked>
        @endif
    @else
    <input type="checkbox" class="form-check-input" id="procedencia_internacional" name="procedencia_internacional">
    @endif
    <label class="form-check-label" for="procedencia_internacional">Procedencia Internacional</label>
 </div>
<a href="{{ route('procedencias.index') }}" class="btn btn-secondary">Cancelar</a> <!--Este enlace lleva al método index del controlador Procedencias que retorna la vista procedencias.index con el listado de procedencias-->
