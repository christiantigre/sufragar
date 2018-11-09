@extends('adminlte::page')

@section('content')
        <div class="row">

            <div class="col-md-9">
                <div class="panel panel-default">
                    <div class="panel-heading">Lista # {{ $list->id }}</div>
                    <div class="panel-body">

                        <a href="{{ url('/admin/addmember/' . $list->id) }}" title="Agregar Integrante"><button class="btn btn-primary btn-sm"><i class="fa fa-users" aria-hidden="true"></i> Agregar Integrante</button></a>
                        
                        <a href="{{ url('/admin/list') }}" title="Atras"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Atras</button></a>
                        <a href="{{ url('/admin/list/' . $list->id . '/edit') }}" title="Editar Lista"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Editar</button></a>

                        <form method="POST" action="{{ url('admin/list' . '/' . $list->id) }}" accept-charset="UTF-8" style="display:inline">
                            {{ method_field('DELETE') }}
                            {{ csrf_field() }}
                            <button type="submit" class="btn btn-danger btn-sm" title="Delete List" onclick="return confirm(&quot;Desea eliminar?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> Eliminar</button>
                        </form>
                        <br/>
                        <br/>

                        <div class="table-responsive">
                            <table class="table">
                                <tbody>
                                    <tr>
                                        <th>ID</th><td>{{ $list->id }}</td>
                                    </tr>
                                    <tr><th> Lista Número </th><td> {{ $list->lista_numero }} </td></tr>

                                    <tr><th> Presidente </th><td> {{ $list->presidente }} </td></tr>

                                    <tr><th> Nombre </th><td> {{ $list->nombre }} </td></tr><tr><th> Integrantes </th><td> {{ $list->cantidad_integrantes }} </td></tr>
                                    <tr>
                                        <th> Logo </th>
                                        <td>
                                            <img src="{{ asset('public/'.$list->logo) }}" style="max-width: 100px; min-width: 100px" />
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>

                        <table class="table">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Alumno</th>
                                        <th>Cargo</th>
                                        <th>Curso</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($integrantes as $item)
                                    <tr>
                                        <td>{{ $loop->iteration or $item->id }}</td>
                                        <td>{{ $item->nombre_alumno }} {{ $item->apellido_alumno }}</td>
                                        <td>{{ $item->Cargo->cargo_lista }}</td>
                                        <td>
                                            {{ $item->Curso->curso }}
                                            {{ $item->Paralelo->paralelo }}
                                        </td>
                                        <td>
                                            <a href="{{ url('/admin/integrante/' . $item->id) }}" title="Ver Integrante"><button class="btn btn-info btn-sm"><i class="fa fa-eye" aria-hidden="true"></i> Ver</button></a>
                                            <a href="{{ url('/admin/integrante/' . $item->id . '/edit') }}" title="Editar Integrante"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Editar</button></a>

                                            <form method="POST" action="{{ url('/admin/integrante' . '/' . $item->id) }}" accept-charset="UTF-8" style="display:inline">
                                                {{ method_field('DELETE') }}
                                                {{ csrf_field() }}
                                                <button type="submit" class="btn btn-danger btn-sm" title="Delete Integrante" onclick="return confirm(&quot;Desea eliminar?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> Eliminar</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>

                    </div>
                </div>
            </div>
            @include('admin.sidebar')
        </div>
@endsection
