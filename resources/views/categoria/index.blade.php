@extends('base.base')
@section('content')



<div class="main-content container-fluid">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Cadastro de Categoria</h3>
                <p class="text-subtitle text-muted">
                   <p>Cadastre as informações da Categoria.</p>
        
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class='breadcrumb-header'>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html">Painel Gerencial</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Categoria</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>

    <section class="section">
        <div class="card">
            <div class="card-header">
            </div>
            <div class="card">
        
            <div class="card-body">
                @if ($message = Session::get('success'))
                <div class="alert alert-success">
                    <p>{{ $message }}</p>
                </div>
            
                @elseif ($message = Session::get('edit'))
                   <div class="alert alert-warning">
                        <p>{{ $message }}</p>
                    </div>

                @elseif ($message = Session::get('delete'))
                    <div class="alert alert-danger">
                        <p>{{ $message }}</p>
                    </div>
                </div>
            </div>
                @endif
                
                <table class='table table-striped' id="table1">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nome</th>
                            <th>Status</th>
                            <th>Data de Criação</th>
                            <th>Data de Atualização</th>
                            <th>Ação</th>
                          
                        </tr>
                    </thead>
                    @foreach ($categoria as $key => $categorias)

                    <tbody>
                        <tr>
               
                           <td>{{ ++$i }}</td>

                           <td>{{$categorias->PoloNome?? 'Sem registros'  }}</td>
                           
                           <td>{{$categorias->categoriastatus ?? 'Sem registros'}}</td>

                        
                           <td>{{$categorias->created_at ??  'Sem registros'}} </td>
                           <td>{{$categorias->updated_at ??  'Sem registros'}} </td>
                           <td> <a class="btn btn-warning" href="{{ route('categoria.edit', $categorias->id) }}">Editar</a>
                           {!! Form::open(['method' => 'DELETE','route' => ['categoria.destroy', $categorias->id],'style'=>'display:inline']) !!}
                           {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}

                           {!! Form::close() !!}
 </td>


                            
                                            </tr>
                        
                        @endforeach

                        
                    </tbody>
                </table>
                
            </div>
        </div>
        
    </section>
</div>


@endsection