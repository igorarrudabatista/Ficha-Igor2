@extends('base.base')
@section('content')

<div class="main-content container-fluid">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Ficha Conselho</h3>
                <p class="text-subtitle text-muted">There's a lot of form layout that you can use</p>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class='breadcrumb-header'>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html">Painel</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Criar Ficha Conselho</li>
                    </ol>
                </nav>
            </div>
        </div>

    </div>

<section id="multiple-column-form">
    <div class="row match-height">
        <div class="col-12">
            <div class="card">
               
                <div class="card-content">
                    <div class="card-body">
                        <div class="container">
                          
                            <section class="section">
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="card">
                                                <div class="card-header">
                                                    <div class="container">
                                                        <div class="row d-flex justify-content-center">
                                                          <div class="col-sm">
                                                          </div>
                                                          <div class="d-flex justify-content-center">
                                                            <B> MINISTÉRIO PÚBLICO DO ESTADO DE MATO GROSSO <br>

                                                                NÚCLEO DE DEFESA DA CIDADANIA DA CAPITAL  
                                                                  <br>  8° PROMOTORIA DE JUSTIÇA CÍVEL </B>
                                                          </div> 
                                                          <div class="col-sm">
                                                          </div>
                                                        </div>
                                                        <br> 

                                                        <div class="row justify-content-md-center">
                                                            <div class="col-sm">
                                                            </div>
                                                            <div class="col-md-auto ">
                                                        <code> MISSÃO: </code> Defender o regime democrático, a ordem jurídica e os interesses sociais e indivíduais indispensáveis, buscando a justiça social
                                                         e o pleno exercício da cidadania.
                                                            </div> 
                                                            <div class="col-sm">
                                                            </div>
                                                          </div>
                                                           
                                                          <br> 
                                                            <div class="row justify-content-md-center">
                                                                <div class="col-sm">
                                                                </div>
                                                                <div class="col-md-auto ">
                                                                <B> FICHA DE ESTUDANTE INFREQUENTE / INDISCIPLINADO / INFRATOR - FICAI </B>
                                                                <br> <br>
                                                            </div> 
                                                            <div class="col-sm">
                                                            </div>
                                                        </div>
                                                        <form action="{{asset('/ficha_conselho')}}" method="POST">
                                                            @csrf
                                                          
                                                <h5 class="card-title justify-content-md-center">IDENTIFICAÇÃO DA ESCOLA</h5>
                                                </div>
                                                <div class="card-body">
                                                    <code> Lotação: </code>


                                                    {{-- <select name="escola_id" id="escola_id" class="form-control">
                                                        <option value="" disabled> Selecionar Escola </option>
                                                        @foreach ($escola as $escolas)
                                                        <option value="{{ $escolas->id}}"> {{$escolas->EscolaNome}} </option>
                                                        @endforeach
                                                    </select> --}}
                                               
                                                     <code> Endereço:  </code> Endereço aqui</code> 
                                                    <code>Telefone: </code> 65 99999 <code> Município: </code> Cuiabá <code> UF: </code> MT   </p>

                                                </div>
                                                <hr>
                                                <div class="card-header">
                                                    <h6 class="card-title">IDENTIFICAÇÃO DO ESTUDANTE</h5>
                                                </div>
                                                <div class="card-body">
                                                {{-- <select name="aluno_id" id="aluno_id" class="form-control">
                                                        <option value="" disabled> Selecionar Aluno </option>
                                                        @foreach ($aluno as $alunos)
                                                        <option value="{{ $alunos->id}}"> {{$alunos->AlunoNome}} </option>
                                                        @endforeach
                                                    </select> --}}

                                                    <code> Endereço: </code> Endereço
                                                    <code> Telefone: </code> Telefone
                                                    <code> Município: </code> Municipio
                                                    <code> UF: </code> MT
                                                    <code> Filiação: </code> Maria das Graças 
                                                    <code> Data de Nascimento: </code> 13/10/1985
                                                    <code> Ano: </code> 6a Série 
                                                    <code> Turno: </code> Matutino 
                                                </div>
                                            </div>
                                            <hr>


                                                    <div class="card-content">
                                                        <div class="card-body">
                                                            <div class="row">
                                                                <div class="col-12 col-sm-12 col-md-4 ">
                                                                    <div class="list-group" role="tablist">
                                                                        <a class="list-group-item list-group-item-action active" id="list-home-list"
                                                                            data-bs-toggle="list" href="#list-home" role="tab">1. Registro de Encaminhamento do Conselho Tutelar</a>
                                                                       
                                                                        <a class="list-group-item list-group-item-action" id="list-settings-tramitar"
                                                                            data-bs-toggle="list" href="#list-tramitar" role="tab">2. Tramitar</a>
                                                                        <a class="list-group-item list-group-item-action" id="list-settings-finalizar"
                                                                            data-bs-toggle="list" href="#list-finalizar" role="tab">3. FINALIZAR CADASTRO</a>
                                                                   
                                                                        </div>
                                                                </div>

                                                                <div class="col-12 col-sm-12 col-md-8 mt-1">
                                                                    <div class="tab-content text-justify" id="nav-tabContent">
                                                                        <div class="tab-pane show active" id="list-home" role="tabpanel"
                                                                            aria-labelledby="list-home-list">
                                                                            
                                                                            <div class="form-group">

                                                                                    <div class="form-group">                                                                                   

                                                                                            <div class="form-group col-md-4 col-4">
                                                                                            <label for="first-name-column">Encmaminhado em:</label>
                                                                                            <input type="date" class="form-control" id="data_encaminhamento" name="data_encaminhamento" >

                                                                                    </div>

                                                                                <label for="first-name-column">Nome do Responsável pelo Encaminhamento</label>
                                                                                <input type="text" class="form-control" id="Nome_Responsavel" name="Nome_Responsavel" >


                                                                            </div>
                                                                            <div class="form-group">
                                                                                <label for="last-name-column">CPF</label>
                                                                                <input type="text" class="form-control" id="CPF_Responsavel" name="CPF_Responsavel" >

                                                                            </div>
                                                                                  
                                                                            {{-- <div class="card-body">
                                                                                <h4 class="card-title">Escreva o motivo</h4>
                                                                                <div>
                                                                                <input type="text" class="form-control" id="Obs_motivo" name="Obs_motivo">

                                                                            <p><br></p>
                                                                                </div>
                                                                            </div> --}}
                                                                              
                                                                        </div>

                                                                    </div>


                                                                    {{-- <div class="tab-pane" id="list-ministerio" role="tabpanel"
                                                                    aria-labelledby="list-settings-list">
                                                                    <div class="row">

                                                                        <div class="form-group col-md-4 col-4">
                                                                        <label for="first-name-column">Encaminhando Ministério Público em</label>
                                                                        <input type="date" id="first-name-column" class="form-control" placeholder="First Name"
                                                                            name="fname-column">
                                                                        </div>

                                                                        <div class="form-group col-md-4 col-4">
                                                                            <label for="last-name-column">CPF</label>
                                                                            <input type="text" id="last-name-column" class="form-control" placeholder="000.000.000-00"
                                                                                name="lname-column">
                                                                        </div> 
                                                                    </div>
                                                                    <div class="form-group col-md-6 col-6">
                                                                        <label for="last-name-column">Nome </label>
                                                                        <input type="text" id="last-name-column" class="form-control" placeholder="Nome"
                                                                            name="lname-column">
                                                                    </div>

                                                                    <section class="section">
                                                                        <div class="row">
                                                                            <div class="col">
                                                                                <div class="card">
                                                                                    <div class="card-header">
                                                                                        Procedimentos Realizados
                                                                                    </div>
                                                                                    <div class="card-body">
                                                                                        <div class="form-group with-title mb-3">
                                                                                            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                                                                                            <label>Escreva aqui</label>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </section>
                                                                    <div class="clearfix"> 
                                                                        
                                                                        <button class="btn btn-primary float-end"> Salvar</button>
                                                                    </div>
                                                            </div> --}}

                                                            <div class="tab-pane" id="list-tramitar" role="tabpanel"
                                                            aria-labelledby="list-settings-list">
                                                            <div class="row">

                                                                <div class="col-xl-6 col-sm-6 col-12">
                                                                    <div class="card text-center bg-lighten-2">
                                                                        <div class="card-content d-flex">
                                                                            <div class="card-body">
                                                                                <img src="https://www.onlyoffice.com/blog/wp-content/uploads/2022/09/Blog_fillable_form_in_PDF.jpg" alt="" height="100"
                                                                                    class="mb-1">
                                                                                <h4 class="card-title white">Tramitar para</h4>
                                                                                {{-- <select name="status_id" id="status_id" class="form-control">
                                                                                    <option value="" enable> Selecione </option>
                                                                                    @foreach ($user as $users)

                                                                                    <option value="{{ $users->id}}"> {{$users->name}} </option>
                                                                                    @endforeach
                                                                                </select> --}}

                                                                              

                                                                            </div>
                                                                        </div> 
                                                                    </div>
                                                                </div> 
                                                            </div>
                                                            </div>
                                                            
                                                                <div class="tab-pane" id="list-finalizar" role="tabpanel"
                                                                aria-labelledby="list-settings-list">
                                                                <div class="row">
                                                                <div class="col-xl-4 col-sm-6 col-12">
                                                                    <div class="card text-center bg-lighten-2">
                                                                        <div class="card-content d-flex">
                                                                            <div class="card-body">
                                                                                <img src="https://www.onlyoffice.com/blog/wp-content/uploads/2022/09/Blog_fillable_form_in_PDF.jpg" alt="" height="100"
                                                                                    class="mb-1">
                                                                                <h4 class="card-title white">Finalize o formulário clicando em Salvar</h4>
                                                                                <p class="card-text white">Obrigado</p>
                                                                                <button class="btn btn-primary white"> Salvar</button>

                                                                            </div>
                                                                        </div> 
                                                                    </div>
                                                                </div> 


                                               

                                                              
                                                               
                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </section>
                                    <!-- List group navigation ends -->


<script src="{{asset('/js/pages/form-editor.js')}}"></script>

@endsection