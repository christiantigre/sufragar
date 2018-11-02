<div class="form-group {{ $errors->has('numero_cedula') ? 'has-error' : ''}}">
    <label for="numero_cedula" class="control-label">{{ 'Numero Cedula' }}</label>
    <input class="form-control" name="numero_cedula" type="text" id="numero_cedula" value="{{ $voto->numero_cedula or ''}}" >
    {!! $errors->first('numero_cedula', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('lista_id') ? 'has-error' : ''}}">
    <label for="lista_id" class="control-label">{{ 'Lista Id' }}</label>
    <input class="form-control" name="lista_id" type="number" id="lista_id" value="{{ $voto->lista_id or ''}}" >
    {!! $errors->first('lista_id', '<p class="help-block">:message</p>') !!}
</div>


<div class="form-group">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Update' : 'Create' }}">
</div>
