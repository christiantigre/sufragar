@extends('adminlte::page')

@section('content')
        <div class="row">

            <div class="col-md-9">
                <div class="panel panel-default">
                    <div class="panel-heading">Editar Integrante #{{ $integrante->id }}</div>
                    <div class="panel-body">
                        <a href="{{ URL::previous() }}" title="Atras"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Atras</button></a>
                        <br />
                        <br />

                        @if ($errors->any())
                            <ul class="alert alert-danger">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        @endif

                        {!! Form::model($integrante, [
                            'method' => 'PATCH',
                            'url' => ['/admin/integrante', $integrante->id],
                            'class' => 'form-horizontal',
                            'files' => true
                            ]) !!}

                            {{--
                        <form method="POST" action="{{ url('/admin/integrante/' . $integrante->id) }}" accept-charset="UTF-8" class="form-horizontal" enctype="multipart/form-data">
                            {{ method_field('PATCH') }}
                            {{ csrf_field() }}
                            @include ('admin.integrante.form', ['formMode' => 'edit'])
                                --}}

                                <div class="form-group {{ $errors->has('nombre_alumno') ? 'has-error' : ''}}">
    <label for="nombre_alumno" class="col-md-4  control-label">{{ 'Nombre Alumno' }}</label>
    <div class="col-md-6"> 
    <input class="form-control" name="nombre_alumno" type="text" id="nombre_alumno" value="{{ $integrante->nombre_alumno or ''}}" >
    {!! $errors->first('nombre_alumno', '<p class="help-block">:message</p>') !!}
    </div>
</div>
<div class="form-group {{ $errors->has('apellido_alumno') ? 'has-error' : ''}}">
    <label for="apellido_alumno" class="col-md-4  control-label">{{ 'Apellido Alumno' }}</label>
    <div class="col-md-6"> 
    <input class="form-control" name="apellido_alumno" type="text" id="apellido_alumno" value="{{ $integrante->apellido_alumno or ''}}" >
    {!! $errors->first('nombre_alumno', '<p class="help-block">:message</p>') !!}
    </div>
</div>
<div class="form-group {{ $errors->has('cargo') ? 'has-error' : ''}}">
    <label for="cargo" class="col-md-4  control-label">{{ 'Cargo' }}</label>
    <div class="col-md-6"> 
    <!--
        <input class="form-control" name="cargo" type="text" id="cargo" value="{{ $integrante->cargo or ''}}" >-->
    {!! Form::select('cargo_id', $cargos, null, ['class' => 'form-control','id'=>'cargo_id']) !!}
    {!! $errors->first('cargo', '<p class="help-block">:message</p>') !!}
</div>
</div>
<div class="form-group {{ $errors->has('curso') ? 'has-error' : ''}}">
    <label for="curso" class="col-md-4  control-label">{{ 'Curso' }}</label>
    <div class="col-md-6"> 
    <!--<input class="form-control" name="curso" type="text" id="curso" value="{{ $integrante->curso or ''}}" >-->
    {!! Form::select('curso_id', $cursos, null, ['class' => 'form-control','id'=>'curso_id']) !!}
    {!! $errors->first('curso', '<p class="help-block">:message</p>') !!}
    </div>
</div>
<div class="form-group {{ $errors->has('paralelo') ? 'has-error' : ''}}">
    <label for="paralelo" class="col-md-4  control-label">{{ 'Paralelo' }}</label>
    <div class="col-md-6"> 
    <!--<input class="form-control" name="paralelo" type="text" id="paralelo" value="{{ $integrante->paralelo or ''}}" >-->
    {!! Form::select('paralelo_id', $paralelos, null, ['class' => 'form-control','id'=>'paralelo_id']) !!}

    {!! $errors->first('paralelo', '<p class="help-block">:message</p>') !!}
</div>
</div>
<div class="form-group {{ $errors->has('descripcion') ? 'has-error' : ''}}">
    <label for="descripcion" class="col-md-4  control-label">{{ 'Descripcion' }}</label>
    <div class="col-md-6"> 
    <textarea class="form-control" rows="5" name="descripcion" type="textarea" id="descripcion" >{{ $integrante->descripcion or ''}}</textarea>
    {!! $errors->first('descripcion', '<p class="help-block">:message</p>') !!}
    </div>
</div>
<div class="form-group {{ $errors->has('lista_id') ? 'has-error' : ''}}">
    <label for="lista_id" class="col-md-4  control-label">{{ 'Lista' }}</label>
    <div class="col-md-6"> 
    <!--<input class="form-control" name="lista_id" type="hidden" id="lista_id" value="{{ $lista->id or ''}}" >-->
    {!! Form::select('lista_id', $listas, null, ['class' => 'form-control','id'=>'lista_id']) !!}
    

    <!--<input class="form-control" name="lista_id" type="number" id="lista_id" value="{{ $integrante->lista_id or ''}}" >-->
    {!! $errors->first('lista_id', '<p class="help-block">:message</p>') !!}
    </div>
</div>


<div class="form-group">
    <div class="col-md-offset-4 col-md-4">
        <input class="btn btn-primary" type="submit" value="Actualizar">
    </div>
</div>

                        {{--
                        </form>
                            --}}

                        {!! Form::close() !!}


                    </div>
                </div>
            </div>

            @include('admin.sidebar')

        </div>
@endsection
