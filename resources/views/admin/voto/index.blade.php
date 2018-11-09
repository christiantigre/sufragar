@extends('adminlte::page')

@section('content')
        <div class="row">
            

            <div class="col-md-9">
                <div class="panel panel-default">
                    <div class="panel-heading">Votos</div>
                    <div class="panel-body">
                        
                        <a href="{{ url('/admin/voto/reset') }}" class="btn btn-success btn-sm" title="Add New List">
                            <i class="fa fa-refresh" aria-hidden="true"></i> RESET
                        </a>

                        <br/>
                        <br/>
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>#</th><th>Nombre Lista</th><th>Número Lista </th><th>Votos</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i = 1; ?>
                                @foreach($voto as $item)
                                
                                    @if($i == 1)
                                    <tr style="background-color: green;">
                                    @else
                                    <tr>
                                    @endif
                                        <td>{{ $loop->iteration or $item->id }}</td>
                                        <td>{{ $item->nombre }}</td>
                                        <td>{{ $item->lista_numero }}</td>
                                        <td>{{ $item->cant }}</td>
                                    </tr>
                                    <?php $i++; ?>

                                @endforeach
                                <tr>
                                        <td>-</td>
                                        <td>{{ $nulos['nulo'] }}</td>
                                        <td>-</td>
                                        <td>{{ $nulos['cant'] }}</td>
                                    
                                </tr>
                                </tbody>
                            </table>
                            <div class="pagination-wrapper">  </div>
                        </div>

                    </div>
                </div>
            </div>

            @include('admin.sidebar')

        </div>
@endsection
