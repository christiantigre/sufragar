@extends('adminlte::page')

@section('content')
    
        <div class="row">

            <div class="col-md-9">
                <div class="panel panel-default">
                    <div class="panel-heading">Listas</div>
                    <div class="panel-body">
                        <a href="{{ url('/admin/list/create') }}" class="btn btn-success btn-sm" title="Add New List">
                            <i class="fa fa-plus" aria-hidden="true"></i> Nuevo
                        </a>

                        <form method="GET" action="{{ url('/admin/list') }}" accept-charset="UTF-8" class="navbar-form navbar-right" role="search">
                            <div class="input-group">
                                <input type="text" class="form-control" name="search" placeholder="Search..." value="{{ request('search') }}">
                                <span class="input-group-btn">
                                    <button class="btn btn-secondary" type="submit">
                                        <i class="fa fa-search"></i>
                                    </button>
                                </span>
                            </div>
                        </form>

                        <br/>
                        <br/>
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Lista Número</th>
                                        <th>Nombre</th><th>Integrantes</th><th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($list as $item)
                                    <tr>
                                        <td>{{ $loop->iteration or $item->id }}</td>
                                        <td>
                                            <center>
                                            {{ $item->lista_numero }}
                                            </center>
                                        </td>
                                        <td>{{ $item->nombre }}</td>
                                        <td>
                                            <center>
                                            {{ $item->cantidad_integrantes }}
                                            </center>
                                        </td>
                                        <td>
                                            <a href="{{ url('/admin/addmember/' . $item->id) }}" title="Agregar Integrante"><button class="btn btn-default btn-sm"><i class="fa fa-plus" aria-hidden="true"></i> Integrante</button></a>

                                            <a href="{{ url('/admin/list/' . $item->id) }}" title="Ver Lista"><button class="btn btn-info btn-sm"><i class="fa fa-eye" aria-hidden="true"></i> Ver</button></a>
                                            <a href="{{ url('/admin/list/' . $item->id . '/edit') }}" title="Editar Lista"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Editar</button></a>

                                            <form method="POST" action="{{ url('/admin/list' . '/' . $item->id) }}" accept-charset="UTF-8" style="display:inline">
                                                {{ method_field('DELETE') }}
                                                {{ csrf_field() }}
                                                <button type="submit" class="btn btn-danger btn-sm" title="Delete List" onclick="return confirm(&quot;Desea eliminar?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> Eliminar</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            <div class="pagination-wrapper"> {!! $list->appends(['search' => Request::get('search')])->render() !!} </div>
                        </div>

                    </div>
                </div>
            </div>


            @include('admin.sidebar')

        </div>
    
@endsection
