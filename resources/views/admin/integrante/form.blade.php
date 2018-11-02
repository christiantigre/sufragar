<div class="form-group {{ $errors->has('nombre_alumno') ? 'has-error' : ''}}">
    <label for="nombre_alumno" class="col-md-4 control-label">{{ 'Nombre Alumno' }}</label>
    <div class="col-md-6">    
    <input class="form-control" name="nombre_alumno" type="text" id="nombre_alumno" value="{{ $integrante->nombre_alumno or ''}}" >
    {!! $errors->first('nombre_alumno', '<p class="help-block">:message</p>') !!}
    </div>
</div>
<div class="form-group {{ $errors->has('apellido_alumno') ? 'has-error' : ''}}">
    <label for="apellido_alumno" class="col-md-4 control-label">{{ 'Apellido Alumno' }}</label>
    <div class="col-md-6"> 
    <input class="form-control" name="apellido_alumno" type="text" id="apellido_alumno" value="{{ $integrante->apellido_alumno or ''}}" >
    {!! $errors->first('nombre_alumno', '<p class="help-block">:message</p>') !!}
    </div>
</div>
<div class="form-group {{ $errors->has('foto') ? 'has-error' : ''}}">
    <label for="foto" class="col-md-4 control-label">{{ 'Foto' }}</label>
    <div class="col-md-6"> 
    <input class="form-control" name="foto" type="file" id="foto" value="{{ $list->foto or ''}}" >
    {!! $errors->first('foto', '<p class="help-block">:message</p>') !!}
    </div>
</div>
<div class="form-group {{ $errors->has('cargo') ? 'has-error' : ''}}">
    <label for="cargo" class="col-md-4 control-label">{{ 'Cargo' }}</label>
    <div class="col-md-6"> 
    <!--
        <input class="form-control" name="cargo" type="text" id="cargo" value="{{ $integrante->cargo or ''}}" >-->
    {!! Form::select('cargo_id', $cargos, null, ['class' => 'form-control','id'=>'cargo_id']) !!}
    {!! $errors->first('cargo', '<p class="help-block">:message</p>') !!}
    </div>
</div>
<div class="form-group {{ $errors->has('curso') ? 'has-error' : ''}}">
    <label for="curso" class="col-md-4 control-label">{{ 'Curso' }}</label>
    <!--<input class="form-control" name="curso" type="text" id="curso" value="{{ $integrante->curso or ''}}" >-->
    <div class="col-md-6"> 
    {!! Form::select('curso_id', $cursos, null, ['class' => 'form-control','id'=>'curso_id']) !!}
    {!! $errors->first('curso', '<p class="help-block">:message</p>') !!}
    </div>
</div>
<div class="form-group {{ $errors->has('paralelo') ? 'has-error' : ''}}">
    <label for="paralelo" class="col-md-4 control-label">{{ 'Paralelo' }}</label>
    <!--<input class="form-control" name="paralelo" type="text" id="paralelo" value="{{ $integrante->paralelo or ''}}" >-->
    <div class="col-md-6"> 
    {!! Form::select('paralelo_id', $paralelos, null, ['class' => 'form-control','id'=>'paralelo_id']) !!}

    {!! $errors->first('paralelo', '<p class="help-block">:message</p>') !!}
    </div>
</div>
<div class="form-group {{ $errors->has('descripcion') ? 'has-error' : ''}}">
    <label for="descripcion" class="col-md-4 control-label">{{ 'Detalles' }}</label>
    <div class="col-md-6"> 
    <textarea class="form-control" rows="5" name="descripcion" type="textarea" id="descripcion" >{{ $integrante->descripcion or ''}}</textarea>
    {!! $errors->first('descripcion', '<p class="help-block">:message</p>') !!}
    </div>
</div>
<div class="form-group {{ $errors->has('lista_id') ? 'has-error' : ''}}">
    <label for="lista_id" class="col-md-4 control-label">{{ 'Lista' }}</label>
    <div class="col-md-6"> 
    <input class="form-control" name="lista_id" type="hidden" id="lista_id" value="{{ $lista->id or ''}}" >
    <input class="form-control" name="nombre_lista" readonly="readonly" type="text" id="nombre_lista" value="{{ $lista->nombre or ''}}" >

    <!--<input class="form-control" name="lista_id" type="number" id="lista_id" value="{{ $integrante->lista_id or ''}}" >-->
    {!! $errors->first('lista_id', '<p class="help-block">:message</p>') !!}
    </div>
</div>


<div class="form-group">
    <div class="col-md-offset-4 col-md-4">
            <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Actualizar' : 'Crear' }}">
    </div>
</div>
