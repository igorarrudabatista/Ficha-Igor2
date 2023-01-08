@extends('base.base')
@section('content')


<div id="auth">
        
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
                                <input type="email" id="first-name-column" class="form-control" name="fname-column">
                            </div>
    
                            <div class="form-group">
                                <label for="first-name-column">CPF</label>
                                <input type="email" id="first-name-column" class="form-control" name="fname-column">
                            </div>
    
                            <div class="form-group">
                                <label for="first-name-column">Data de Nascimento</label>
                                <input type="date" id="first-name-column" class="form-control" name="fname-column">
                            </div>
    
                            <div class="clearfix">
                                <button class="btn btn-primary float-end">Pesquisar</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
        </div>

   



@endsection