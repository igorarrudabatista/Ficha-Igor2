<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\
    {
    HomeController, AlunosController, FichaController, PainelGerencialController,
    UsuariosController, RoleController, UserController, ProductController,
    MinisterioController, PoloController, EscolaController, PessoaController,
    CategoriaController, PrazoController, ConselhoController

    };

 Route::get('/escola/teste',      [PessoaController::class, 'index']);


Route::get('/painel', function () {
    return view('painel');
})->middleware(['auth', 'verified'])->name('painel');

Route::get('/perfil', [ProfileController::class, 'edit'])->name('profile.edit');


Route::middleware('auth')->group(function () {

Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

////// BASE
Route::get('/base', [HomeController::class, 'home']);
    
    
// ////// Alunos
//     Route::get('/aluno/index',  [AlunosController::class, 'index']);
//     Route::get('/aluno/create', [AlunosController::class, 'create']);


////// FICHAS
// Route::get('/ficha/table', [FichaController::class, 'home']);
// Route::get('/ficha/form',  [FichaController::class, 'create']);

Route::get('/ficha/update/Conselho1/{id}',           [FichaController::class, 'Conselho1']);
Route::get('/ficha/update/Conselho2/{id}',           [FichaController::class, 'Conselho2']);
Route::get('/ficha/update/Conselho3/{id}',           [FichaController::class, 'Conselho3']);

////// PAINEL GERENCIAL (DASHBOARD)
Route::get('/painel', [PainelGerencialController::class, 'dashboard']);

Route::get('/painel/index', [PainelGerencialController::class, 'index']);
Route::get('/painel/cadastro/index', [PainelGerencialController::class, 'cadastro_menu']);
Route::get('/painel/consulta_ficha', [PainelGerencialController::class, 'consulta_ficha']);
Route::get('/painel/consulta_aluno', [PainelGerencialController::class, 'consulta_aluno']);

Route::get('/painel/cadastro/cadastro_aluno',      [PainelGerencialController::class, 'cadastro_aluno']);
//Route::get('/painel/cadastro/cadastro_categoria',  [PainelGerencialController::class, 'cadastro_categoria']);
Route::get('/painel/cadastro/cadastro_conselho',   [PainelGerencialController::class, 'cadastro_conselho']);
Route::get('/painel/cadastro/cadastro_escola',     [PainelGerencialController::class, 'cadastro_escola']);
Route::get('/painel/cadastro/cadastro_ministerio', [PainelGerencialController::class, 'cadastro_ministerio']);
Route::get('/painel/cadastro/cadastro_polo',       [PainelGerencialController::class, 'cadastro_polo']);
Route::get('/painel/cadastro/cadastro_prazo',      [PainelGerencialController::class, 'cadastro_prazo']);
Route::get('/painel/cadastro/cadastro_serie',      [PainelGerencialController::class, 'cadastro_serie']);


// ---------USUARIOS GET
// Route::get('/usuarios/index',               [UsuariosController::class, 'index']);
// Route::get('/usuarios/show',                [UsuariosController::class, 'show']);
// Route::get('/usuarios/create',              [UsuariosController::class, 'create']);
// Route::get('/usuarios/edit',                [UsuariosController::class, 'edit']);



Route::get('/usuarios/atribuir_perfil_usuarios',      [RoleController::class, 'atribuir_perfil_usuarios']);


Route::get('/usuarios/perfil_usuarios',               [RoleController::class, 'perfil_usuarios']);
Route::get('/usuarios/form_usuarios',                 [UsuariosController::class, 'form_usuarios']);


    Route::resource('roles', RoleController::class);
    Route::resource('users', UserController::class);
    Route::resource('products', ProductController::class);
    Route::resource('ministerio', MinisterioController::class);
    Route::resource('polo',     PoloController::class);
    Route::resource('aluno', AlunosController::class);
    Route::resource('escola', EscolaController::class);
    Route::resource('categoria', CategoriaController::class);
    Route::resource('ficha', FichaController::class);
    Route::resource('prazo', PrazoController::class);
    Route::resource('conselho', ConselhoController::class);
    
    


//Route::resource('usuarios', UserController::class);


// ---------USUARIOS POST
Route::post('/usuarios/atribuir_perfil',              [UsuariosController::class, 'atribuir_perfil_usuarios_store']);
Route::post('/usuarios',                              [UsuariosController::class, 'store_usuarios']);

/////LOGOUT
// Route::post('logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');


Route::get('logout', [AuthenticatedSessionController::class, 'destroy'])
->name('logout');

});

require __DIR__.'/auth.php';
