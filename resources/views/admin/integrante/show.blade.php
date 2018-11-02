@extends('adminlte::page')


@section('content')
        <div class="row">

            <div class="col-md-9">
                <div class="panel panel-default">
                    <div class="panel-heading">Integrante {{ $integrante->id }}</div>
                    <div class="panel-body">

                        <a href="{{ URL::previous() }}" title="Back"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
                        <a href="{{ url('/admin/integrante/' . $integrante->id . '/edit') }}" title="Edit Integrante"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>

                        <form method="POST" action="{{ url('admin/integrante' . '/' . $integrante->id) }}" accept-charset="UTF-8" style="display:inline">
                            {{ method_field('DELETE') }}
                            {{ csrf_field() }}
                            <button type="submit" class="btn btn-danger btn-sm" title="Delete Integrante" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>
                        </form>
                        <br/>
                        <br/>

                        <div class="table-responsive">
                            <table class="table">
                                <tbody>
                                    <tr>
                                        <th>ID</th><td>{{ $integrante->id }}</td>
                                    </tr>
                                    <tr>
                                        <th> Nombre Alumno </th><td> {{ $integrante->nombre_alumno }}  {{ $integrante->apellido_alumno }} </td>
                                    </tr>
                                    <tr>
                                        <th> Cargo </th>
                                        <td> {{ $integrante->Cargo->cargo_lista }} </td>
                                    </tr>
                                    <tr>
                                        <th> Curso </th>
                                        <td> {{ $integrante->Curso->curso }} {{ $integrante->Paralelo->paralelo }} </td>
                                    </tr>
                                    <tr>
                                        <th> Lista </th>
                                        <td> {{ $integrante->Lista->nombre }} </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>

            @include('admin.sidebar')
        </div>
@endsection
