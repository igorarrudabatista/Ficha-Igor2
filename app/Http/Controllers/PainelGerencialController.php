<?php

namespace App\Http\Controllers;
use App\Models\FICHA;
use App\Models\ALUNO;
use App\Models\ESCOLA;
use App\Models\User;



use Illuminate\Http\Request;

class PainelGerencialController extends Controller
{



        public function dashboard() {

            $usuarios = User::orderBy('id','DESC')->paginate(5);

            $userCount  =  FICHA::where('status_id', '=', auth()->id())
            ->count();
            $alunos = ALUNO::count();
            $escolas = ESCOLA::count();
            $totalfichas = FICHA::count();
            $fichasNAOtramitadas = FICHA::where('status_id', '=', NULL)->count();
            $fichasTramitadas = FICHA::where('status_id', '!=', NULL)->count();
        
            return view('painel.painel-dashboard',compact('fichasTramitadas',
                                                          'fichasNAOtramitadas',
                                                          'totalfichas',
                                                          'escolas',
                                                          'alunos',
                                                          'userCount',
                                                          'usuarios'));

        }

    public function index() {
        $userCount  =  FICHA::where('status_id', '=', auth()->id())
        ->count();
        return view('painel.index',compact('userCount')); 
    }

    public function consulta_aluno() {
        $userCount  =  FICHA::where('status_id', '=', auth()->id())
        ->count();
        return view('painel.consulta_aluno',compact('userCount'));
    }

    public function consulta_ficha() {
        $userCount  =  FICHA::where('status_id', '=', auth()->id())
        ->count();
        return view('painel.consulta_ficha',compact('userCount'));    
    }

//// Cadastro
    public function cadastro_menu() {
        $userCount  =  FICHA::where('status_id', '=', auth()->id())
        ->count();
        return view('painel.cadastro.index',compact('userCount'));
    }

    public function cadastro_aluno() {
        $userCount  =  FICHA::where('status_id', '=', auth()->id())
        ->count();
        return view('painel.cadastro.cadastro_aluno',compact('userCount'));
    }
    public function cadastro_categoria() {
        $userCount  =  FICHA::where('status_id', '=', auth()->id())
        ->count();
        return view('painel.cadastro.cadastro_categoria',compact('userCount'));    
    }
    public function cadastro_conselho() {
        $userCount  =  FICHA::where('status_id', '=', auth()->id())
        ->count();
        return view('painel.cadastro.cadastro_conselho',compact('userCount'));
    }
    
    public function cadastro_escola() {
        $userCount  =  FICHA::where('status_id', '=', auth()->id())
        ->count();
        return view('painel.cadastro.cadastro_escola',compact('userCount'));
    }
    
    public function cadastro_ministerio() {
        $userCount  =  FICHA::where('status_id', '=', auth()->id())
        ->count();
        return view('painel.cadastro.cadastro_ministerio',compact('userCount'));
    }
    
    public function cadastro_polo() {
        $userCount  =  FICHA::where('status_id', '=', auth()->id())
        ->count();
        return view('painel.cadastro.cadastro_polo',compact('userCount'));
  }
    
    public function cadastro_prazo() {
        $userCount  =  FICHA::where('status_id', '=', auth()->id())
        ->count();
        return view('painel.cadastro.cadastro_prazo',compact('userCount'));
  }
    
    public function cadastro_serie() {
        $userCount  =  FICHA::where('status_id', '=', auth()->id())
        ->count();
        return view('painel.cadastro.cadastro_serie',compact('userCount'));
  }
    

}