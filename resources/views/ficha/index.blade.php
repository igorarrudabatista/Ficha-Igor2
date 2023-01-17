@extends('base.base')
@section('content')



<div class="main-content container-fluid">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Ficha</h3>
                <p class="text-subtitle text-muted">
                   <p> Listagem de Fichas criadas por você, <b> {{{ isset(Auth::user()->name) ? Auth::user()->name : Auth::user()->name }}}  </b></p>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class='breadcrumb-header'>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html">Painel</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Fichas</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    
    <section class="section">
        <div class="card">
            <div class="card-header">
            </div>
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
                            <th>Situação</th>
                            <th>Id da Ficha</th>
                            <th>Categoria</th>
                            <th>Nome do Aluno</th>
                            <th>Escola</th>
                            <th>Data de Abertura</th>
                            <th>Atualizado em</th>
                            <th>Ação</th>
                            <th>Tramitado para</th>
                        </tr>
                    </thead>
                    @foreach($ficha as $fichas) 
                    <tbody>
                        <tr>
                        <td>
                            @if ($fichas->status_id != '')
                            <span class="badge bg-success">Tramitado</span>

                            @else

                            <span class="badge bg-danger">Não Tramitado</span>


                            @endif

                        </td>

                           <td>{{$fichas->id}}</td>

                           <td>{{$fichas->categoria->FichaCatNome ?? ' Registro Não Encontrado'  }}</td>
                           
                           <td>{{$fichas->aluno->AlunoNome ?? ' Registro Não Encontrado'}}</td>

                           <td>{{$fichas->escola->EscolaNome ??  ' Registro Não Encontrado'}}</td>


                           
                           <!-- <td><span class="badge bg-warning"> Não Tramitada </span> </td> -->
                           {{-- <td>
                            <!-- Button trigger modal -->

                            <div class="dropdown">
                            <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                            Tramitar para
                            </button>
                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                          
                                @foreach ($users as $user)
                                    
                                <li><a class="dropdown-item" href="{{asset('/ficha/update/Conselho2')}}/{{$user->id}}">{{$user->name}}</a></li>
                                @endforeach
                    
                                <!-- <li><a class="dropdown-item" href="{{asset('/ficha/update/Conselho2')}}/{{$fichas->id}}">Conselho 2</a></li>
                                <li><a class="dropdown-item" href="{{asset('/ficha/update/Conselho3')}}/{{$fichas->id}}">Conselho 3</a></li> -->
                            </ul>
                            </div>


                            <!-- <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                            Tramitar</button>

                           Modal                             <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Tramitação de Ficha</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                
                                <div class="modal-body">

                                <a class="dropdown-item  text-light" href="{{asset('/ficha/update/Conselho1')}}/{{$fichas->id}}">
                                    <i class="fas fa-check"></i> Conselho 1</a> <br>
                                <a class="dropdown-item  text-light" href="{{asset('/ficha/update/Conselho2')}}/{{$fichas->id}}">
                                    <i class="fas fa-check"></i> Conselho 2</a> <br>
                                <a class="dropdown-item text-light" href="{{asset('/ficha/update/Conselho3')}}/{{$fichas->id}}">
                                    <i class="fas fa-check"></i> Conselho 3</a>
                                                              
                                </div>

                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                                    <button type="button" class="btn btn-primary">Salvar</button>
                                </div>
                                </div>
                            </div>
                            </div> -->



                           </td> --}}
                           <td>{{$fichas->created_at ??  'Sem registros'}} </td>
                           <td>{{$fichas->updated_at ??  'Sem registros'}} </td>
                           <td> <a class="btn btn-warning" href="{{ route('ficha.edit',$fichas->id) }}">Editar</a>
                           {!! Form::open(['method' => 'DELETE','route' => ['ficha.destroy', $fichas->id],'style'=>'display:inline']) !!}
                           {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}

                           {!! Form::close() !!}
                            
                            <td>
                            @if ($fichas->status_id != '')
                            <span class="badge bg-success">{{$fichas->users->name ?? 'Não encontrado'}} <br> {{$fichas->users->email ?? 'Não encontrado'}} </span>
                            
                            {{-- @elseif  ($fichas->FichaStatus == 'Conselho2')
                            <span class="badge bg-warning">Conselho 2</span>

                            @elseif  ($fichas->FichaStatus == 'Conselho3')
                            <span class="badge bg-primary">Conselho 3</span> --}}

                            @else
                            <span class="badge bg-danger">Não Tramitado</span>
                            @endif
                            
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