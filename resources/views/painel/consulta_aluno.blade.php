@extends('base.base')
@section('content')


<div id="auth">

    

              
           
            <form action="{{asset('/painel/consulta_aluno')}}" method="GET" enctype="multipart/form-data">

    <div class="container">
        <div class="row">
            <div class="col-md-5 col-sm-12 mx-auto">
                <div class="card py-4">
                    <div class="card-body">
                        <div class="text-center mb-5">
                            <img src="{{asset('/images/search-student.png')}}" height="48" class='mb-4'>
                            <h3>Consulta de Alunos</h3>
                            <p></p>
                        </div>
                        <form action="index.html">
                            <div class="form-group">
                                <label for="first-name-column">Nome do Aluno</label>
                                {{-- <input type="email" id="first-name-column" class="form-control" name="fname-column"> --}}
                            </div>
    
                            <div class="form-group">
                                <label for="first-name-column">CPF</label>
                                <input type="text" id="search" class="form-control" name="search">
                            </div>
    
                            <div class="form-group">
                                <label for="first-name-column">Data de Nascimento</label>
                                {{-- <input type="date" id="first-name-column" class="form-control" name="fname-column"> --}}
                            </div>
    
                            <div class="clearfix">
                                <button class="btn btn-primary float-end">Pesquisar</button>
                            </div>
<br>
                            @if ($search)

                            <h3 class="app-content-headerText">Resultado para a busca: <small> {{$search}} </small> </h3>

                                @foreach ($data->alunos as $result)  
                                <p><b> Código INEP:  </b>   {{ $result->GedAluIdINEP }} - Sexo: {{ $result->GerPesSexo }}</p> 
                                <p><b> Nome do Aluno:</b>   {{ $result->NomeAluno }}</p> 
                                <p><b> Data Nascimento:</b> {{ $result->DataNascAluno }}</p> 
                                <p><b> Filiação 1:</b>      {{ $result->GerPesNomPai }}</p> 
                                <p><b> Filiação 2:</b>      {{ $result->GerPesNomMae }}</p> 
                                <p><b> Endereço:</b>        {{ $result->GerPesEnd }} - {{ $result->GerPesCmpLog }} - 
                                {{ $result->GerPesBairro }}  {{ $result->GerPesCEP }}</p> 

                            @endforeach 

              
                         

                            <button class="btn btn-warning float-end">Limpar pesquisa</button> </a>
                            @else
                            <h1 class="app-content-headerText"> Resultado:</h1>
                         
                                      @endif
                                      
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
        </div>

   



@endsection