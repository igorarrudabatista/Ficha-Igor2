<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ficha - Voler Admin Dashboard</title>
    <link rel="stylesheet" href="{{asset('/css/bootstrap.css')}}">
    <link rel="stylesheet" href="{{asset('vendors/chartjs/Chart.min.css')}}">
    <link rel="stylesheet" href="{{asset('vendors/simple-datatables/style.css')}}">
    <link rel="stylesheet" href="{{asset('vendors/perfect-scrollbar/perfect-scrollbar.css')}}">    
    <link rel="stylesheet" href="{{asset('/css/app.css')}}">
    <link rel="shortcut icon" href="{{asset('/images/favicon.svg')}}" type="image/x-icon">
    <link rel="stylesheet" href="{{asset('/vendors/quill/quill.bubble.css')}}">
    <link rel="stylesheet" href="{{asset('/vendors/quill/quill.snow.css')}}">
    <link rel="stylesheet" href="{{asset('/vendors/perfect-scrollbar/perfect-scrollbar.css')}}">
</head>
<body>
    <div id="app">
        <div id="sidebar" class='active'>
            <div class="sidebar-wrapper active">
    <div class="sidebar-header">
        <img src="http://www3.seduc.mt.gov.br/image/layout_set_logo?img_id=8125250&t=1671702144343" alt="" srcset="">
    </div>
    <div class="sidebar-menu">
        <ul class="menu">
            
                
                <li class='sidebar-title'>Menu</li>
                
            
                
                <li class="sidebar-item  "> 
                    {{-- active --}}

                    <a href="{{asset('/painel')}}" class='sidebar-link'>
                        <i data-feather="home" width="20"></i> 
                        <span>Dashboard</span>
                    </a>                 
                </li>

                               
                <li class="sidebar-item  ">

                    <a href="{{asset('/painel/index')}}" class='sidebar-link'>
                        <i data-feather="layout" width="20"></i> 
                        <span>Painel Gerencial</span>
                    </a>

                    
                </li>                     
                <li class="sidebar-item  has-sub">

                    <a href="#" class='sidebar-link'>
                        <i data-feather="user" width="20"></i> 
                        <span>Usuários do Sistema</span>
                    </a>

                    <ul class="submenu ">
                        
                        <li>
                            <a href="/users">Ver Usuários</a>
                        </li>
                        
                        <li>
                            <a href="/users/create">Criar Usuários</a>
                        </li>
                        
                        <li>
                            <a href="/roles">Perfil de Usuários</a>
                        </li>

                    </ul>
                </li>
                <li class='sidebar-title'>Cadastro &amp; SIstema</li>
                
                <li class="sidebar-item  has-sub">
                    
                    <a href="#" class='sidebar-link'>
                        <i data-feather="briefcase" width="20"></i> 
                        <span>Alunos</span>
                    </a>

                    
                    <ul class="submenu ">

                        <li>
                            <a href="{{asset('/aluno')}}">Ver Alunos</a>
                        </li>
                    <li>
                            <a href="{{asset('/aluno/create')}}">Cadastrar Alunos</a>
                        </li>
                        
                        
                    </ul>
                    
                </li>
                
                <li class="sidebar-item  has-sub">
                    
                    <a href="#" class='sidebar-link'>
                        <i data-feather="home" width="20"></i> 
                        <span>Escola</span>
                    </a>

                    
                    <ul class="submenu ">

                        <li>
                            <a href="{{asset('/escola')}}">Consulta Escolas</a>
                        </li>

                    <li>
                            <a href="{{asset('/escola/create')}}">Cadastrar Escola</a>
                        </li>
                        
                        
                    </ul>
                    
                </li>
                
                
                <li class="sidebar-item  has-sub">

                    <a href="" class='sidebar-link'>
                        <i data-feather="file-text" width="20"></i> 
                        <span>Fichas</span>
                    </a>

                    
                    <ul class="submenu ">
                        
                        <li>
                            <a href="{{asset('/ficha/create')}}">Criar Fichas</a>
                        </li>
                        <hr> 
                        <li>
                            <a href="{{asset('/ficha')}}">Ver Fichas <b> Escola </b> </a>
                        </li>
                        <li>
                            <a href="{{asset('/ficha_conselho')}}">Ver Fichas <b>  Conselho </b> </a>
                        </li>
                        <li>
                            <a href="{{asset('/ficha_ministerio_publico')}}">Ver Fichas <b> Ministério Público </b> </a>
                        </li>

                        <hr>
                       
                             
                        <li>
                            <a href="{{asset('/ficha/atender')}}">Fichas Tramitadas para mim</a>
                        </li>  

                        <li>
                            <a href="{{asset('/ficha/todasfichas')}}"> Ver Todas Fichas</a>
                        </li>
                        
                        
                    </ul>
                    
                </li>
                
            
 

               
                <li class="sidebar-item  has-sub">

                    <a href="#" class='sidebar-link'>
                        <i data-feather="layers" width="20"></i> 
                        <span>Ministerio</span>
                    </a>

                    <ul class="submenu ">
                        
                        <li>
                            <a href="/ministerio">Ver Ministerio</a>
                        </li>
                        
                        <li>
                            <a href="/ministerio/create">Criar Ministerio</a>
                        </li>
                        
          
                    </ul>
                </li>
                <li class="sidebar-item  has-sub">

                    <a href="#" class='sidebar-link'>
                        <i data-feather="layers" width="20"></i> 
                        <span>Polo</span>
                    </a>

                    <ul class="submenu ">
                        
                        <li>
                            <a href="/polo">Ver Polos</a>
                        </li>
                        
                        <li>
                            <a href="/polo/create">Criar Polos</a>
                        </li>
                        
          
                    </ul>
                </li>
                <li class="sidebar-item  has-sub">

                    <a href="#" class='sidebar-link'>
                        <i data-feather="layers" width="20"></i> 
                        <span>Categoria</span>
                    </a>

                    <ul class="submenu ">
                        
                        <li>
                            <a href="/categoria">Ver Categoria</a>
                        </li>
                        
                        <li>
                            <a href="/categoria/create">Criar Categoria</a>
                        </li>
                        
          
                    </ul>
                </li>
                <li class="sidebar-item  has-sub">

                    <a href="#" class='sidebar-link'>
                        <i data-feather="layers" width="20"></i> 
                        <span>Prazo</span>
                    </a>

                    <ul class="submenu ">
                        
                        <li>
                            <a href="/prazo">Ver Prazo</a>
                        </li>
                        
                        <li>
                            <a href="/prazo/create">Criar Prazo</a>
                        </li>
                        
          
                    </ul>
                </li>
                <li class="sidebar-item  has-sub">

                    <a href="#" class='sidebar-link'>
                        <i data-feather="layers" width="20"></i> 
                        <span>Conselho</span>
                    </a>

                    <ul class="submenu ">
                        
                        <li>
                            <a href="/conselho">Ver Conselho</a>
                        </li>
                        
                        <li>
                            <a href="/conselho/create">Criar Conselho</a>
                        </li>
                        
          
                    </ul>
                </li>
                <li class="sidebar-item  ">

                    <a href="form-editor.html" class='sidebar-link'>
                        <i data-feather="layers" width="20"></i> 
                        <span>Form Editor</span>
                    </a>

                    
                </li>
                
            
                
                <li class="sidebar-item  ">

                    <a href="table.html" class='sidebar-link'>
                        <i data-feather="grid" width="20"></i> 
                        <span>Table</span>
                    </a>

                    
                </li>
                
            
                
                <li class="sidebar-item  ">

                    <a href="table-datatable.html" class='sidebar-link'>
                        <i data-feather="file-plus" width="20"></i> 
                        <span>Datatable</span>
                    </a>

                    
                </li>
                
            
                
                <li class='sidebar-title'>Extra UI</li>
                
            
                
                <li class="sidebar-item  has-sub">

                    <a href="#" class='sidebar-link'>
                        <i data-feather="user" width="20"></i> 
                        <span>Widgets</span>
                    </a>

                    
                    <ul class="submenu ">
                        
                        <li>
                            <a href="ui-chatbox.html">Chatbox</a>
                        </li>
                        
                        <li>
                            <a href="ui-pricing.html">Pricing</a>
                        </li>
                        
                        <li>
                            <a href="ui-todolist.html">To-do List</a>
                        </li>
                        
                    </ul>
                    
                </li>
                
            
                
                <li class="sidebar-item  has-sub">

                    <a href="#" class='sidebar-link'>
                        <i data-feather="trending-up" width="20"></i> 
                        <span>Charts</span>
                    </a>

                    
                    <ul class="submenu ">
                        
                        <li>
                            <a href="ui-chart-chartjs.html">ChartJS</a>
                        </li>
                        
                        <li>
                            <a href="ui-chart-apexchart.html">Apexchart</a>
                        </li>
                        
                    </ul>
                    
                </li>
                
            
                
                <li class='sidebar-title'>Pages</li>
                
            
                
                <li class="sidebar-item  has-sub">

                    <a href="#" class='sidebar-link'>
                        <i data-feather="user" width="20"></i> 
                        <span>Authentication</span>
                    </a>

                    
                    <ul class="submenu ">
                        
                        <li>
                            <a href="auth-login.html">Login</a>
                        </li>
                        
                        <li>
                            <a href="auth-register.html">Register</a>
                        </li>
                        
                        <li>
                            <a href="auth-forgot-password.html">Forgot Password</a>
                        </li>
                        
                    </ul>
                    
                </li>
            
                
               <li class="sidebar-item  has-sub">

                    <a href="#" class='sidebar-link'>
                        <i data-feather="alert-circle" width="20"></i> 
                        <span>Errors</span>
                    </a>

                    
                    <ul class="submenu ">
                        
                        <li>
                            <a href="error-403.html">403</a>
                        </li>
                        
                        <li>
                            <a href="error-404.html">404</a>
                        </li>
                        
                        <li>
                            <a href="error-500.html">500</a>
                        </li>
                        
                    </ul>
                    
                </li>
             
            
        </ul>
    </div>
    <button class="sidebar-toggler btn x"><i data-feather="x"></i></button>
</div>
        </div>
        <div id="main">
            <nav class="navbar navbar-header navbar-expand navbar-light">
                <a class="sidebar-toggler" href="#"><span class="navbar-toggler-icon"></span></a>
                <button class="btn navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
                    aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav d-flex align-items-center navbar-light ms-auto">
                        <li class="dropdown nav-icon">
                            <a href="#" data-bs-toggle="dropdown" class="nav-link  dropdown-toggle nav-link-lg nav-link-user">
                                <div class="d-lg-inline-block">
                                    <i data-feather="bell"></i>
                                </div>
                            </a>
                            <div class="dropdown-menu dropdown-menu-end dropdown-menu-large">
                                <h6 class='py-2 px-4'>Notificação</h6>
                                <ul class="list-group rounded-none">
                                    <li class="list-group-item border-0 align-items-start">
                                        <div class="avatar bg-success me-3">
                                            <span class="avatar-content"><i data-feather="shopping-cart"></i></span>
                                        </div>
                                        <div>
                                            <h6 class='text-bold'>Notificação</h6>
                                            <p class='text-xs'>
                                                5 Notificações                                             </p>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <li class="dropdown nav-icon me-2">
                            <a href="#" data-bs-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user">
                                <div class="d-lg-inline-block">
                                    <i data-feather="mail"></i>
                                </div>
                            </a>
                            <div class="dropdown-menu dropdown-menu-end" >
                                <h6 class='py-2 px-4'>Mensagem</h6>
                                <ul class="list-group rounded-none">
                                    <li class="list-group-item border-0 align-items-start">
                                        <div class="avatar bg-success me-3">
                                        </div>
                                        <div>
                                            <h6 class='text-bold'>Menagem</h6>
                                            <p class='text-xs'>
                                                Mensagem aqui                                         </p>
                                        </div>
                                    </li>
                                </ul>
                                {{-- <a class="dropdown-item" href="#"><i data-feather="user"></i> Minha Conta</a> --}}
                                {{-- <a class="dropdown-item active" href="#"><i data-feather="mail"></i> Mensagens</a> --}}
                                {{-- <a class="dropdown-item" href="#"><i data-feather="settings"></i> Configurações</a> --}}
                                {{-- <div class="dropdown-divider"></div> --}}
                                {{-- <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                <a class="dropdown-item" href="route('logout')"
                                onclick="event.preventDefault();
                                            this.closest('form').submit();" ><i data-feather="log-out"></i> Sair</a> --}}
                            </div>
                        </li>
                        <li class="dropdown">
                            <a href="#" data-bs-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user">
                                <div class="avatar me-1">
                                    <img src="{{asset('images/avatar/avatar-s-1.png')}}" alt="" srcset="">
                                </div>
                                <div class="d-none d-md-block d-lg-inline-block">Olá, {{{ isset(Auth::user()->name) ? Auth::user()->name : Auth::user()->name }}} </div>
                            </a>
                            <div class="dropdown-menu dropdown-menu-end">
                                <a class="dropdown-item" href="#"><i data-feather="user"></i> Conta</a>
                                <a class="dropdown-item active" href="#"><i data-feather="mail"></i> Messages</a>
                                <a class="dropdown-item" href="#"><i data-feather="settings"></i> Configurações</a>
                                <div class="dropdown-divider"></div>
                                {{-- <form method="POST" action="{{ route('logout') }}">
                                    @csrf --}}
                                    <a class="dropdown-item" href="{{asset('/logout')}}"
                                    > Sair</a>                            </div> 
                        </li>
                    </ul>
                </div>
            </nav>
            
            @yield('content')

            <footer>
                <div class="footer clearfix mb-0 text-muted">
                    <div class="float-start">
                        <p>2023 &copy; SEDUC</p>
                    </div>
                    <div class="float-end">
                        <p>Desenvolvido pela <span class='text-danger'><i data-feather="heart"></i></span>  <a href="https://seduc.mt.gov.br">SEDUC </a></p>
                    </div>
                </div>
            </footer>
        </div>
    </div>
    
    <script src="{{asset('/js/feather-icons/feather.min.js')}}"></script>
    <script src=" {{asset('/vendors/perfect-scrollbar/perfect-scrollbar.min.js')}} "></script>
    <script src="{{asset('/js/app.js')}}"></script>
    <script src="{{asset('/vendors/chartjs/Chart.min.js')}}"></script>
    <script src="{{asset('/vendors/apexcharts/apexcharts.min.js')}}"></script>
    <script src="{{asset('/js/pages/dashboard.js')}}"></script>
    <script src="{{asset('/vendors/quill/quill.min.js')}}"></script>
    <script src="{{asset('/js/pages/form-editor.js')}}"></script>
    <script src="{{asset('vendors/simple-datatables/simple-datatables.js')}}"></script>
    <script src="{{asset('/js/vendors.js')}}"></script>
    <script src="{{asset('/js/main.js')}}"></script>

</body>
</html>
