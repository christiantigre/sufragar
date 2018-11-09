<div class="form-group {{ $errors->has('lista_numero') ? 'has-error' : ''}}">
    <label for="lista_numero" class="col-md-4 control-label">{{ 'Lista Número' }}</label>
    <div class="col-md-6"> 
    <input class="form-control" name="lista_numero" type="text" id="lista_numero" readonly="readonly" value="{{ $list->lista_numero or $contador}}" >
    {!! $errors->first('lista_numero', '<p class="help-block">:message</p>') !!}
    </div>
</div>
<div class="form-group {{ $errors->has('nombre') ? 'has-error' : ''}}">
    <label for="nombre" class="col-md-4 control-label">{{ 'Nombre' }}</label>
    <div class="col-md-6"> 
    <textarea class="form-control" rows="5" name="nombre" type="textarea" id="nombre" >{{ $list->nombre or ''}}</textarea>
    {!! $errors->first('nombre', '<p class="help-block">:message</p>') !!}
    </div>
</div>
<div class="form-group {{ $errors->has('presidente') ? 'has-error' : ''}}">
    <label for="presidente" class="col-md-4 control-label">{{ 'Presidente' }}</label>
    <div class="col-md-6"> 
    <textarea class="form-control" rows="5" name="presidente" type="textarea" id="presidente" >{{ $list->presidente or ''}}</textarea>
    {!! $errors->first('presidente', '<p class="help-block">:message</p>') !!}
    </div>
</div>
<div class="form-group {{ $errors->has('cantidad_integrantes') ? 'has-error' : ''}}">
    <label for="cantidad_integrantes" class="col-md-4 control-label">{{ 'Integrantes' }}</label>
    <div class="col-md-6"> 
    <input class="form-control" name="cantidad_integrantes" readonly="readonly" type="text" id="cantidad_integrantes" value="{{ $list->cantidad_integrantes or $integrantes}}" >
    {!! $errors->first('cantidad_integrantes', '<p class="help-block">:message</p>') !!}
    </div>
</div>
<div class="form-group {{ $errors->has('logo') ? 'has-error' : ''}}">
    <label for="logo" class="col-md-4 control-label">{{ 'Logo' }}</label>
    <div class="col-md-6"> 
    <input class="form-control" name="logo" type="file" id="logo" value="{{ $list->logo or ''}}" >
    {!! $errors->first('logo', '<p class="help-block">:message</p>') !!}
    </div>
</div>
<div class="form-group {{ $errors->has('descripcion') ? 'has-error' : ''}}">
    <label for="descripcion" class="col-md-4 control-label">{{ 'Detalles' }}</label>
    <div class="col-md-6"> 
    <textarea class="form-control" rows="5" name="descripcion" type="textarea" id="descripcion" >{{ $list->descripcion or ''}}</textarea>
    {!! $errors->first('descripcion', '<p class="help-block">:message</p>') !!}
    </div>
</div>


<div class="form-group">
    <div class="col-md-offset-4 col-md-4">
        <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Actualizar' : 'Crear' }}">
    </div>
</div>
