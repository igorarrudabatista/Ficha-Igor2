<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PainelGerencialController extends Controller
{
    public function dashboard() {

        return view('painel.painel-dashboard'    
    );}
    public function index() {

        return view('painel.index'    
    );}

    public function consulta_aluno() {

        return view('painel.consulta_aluno'    
    );}

    public function consulta_ficha() {

        return view('painel.consulta_ficha'    
    );}

//// Cadastro
    public function cadastro_menu() {

        return view('painel.cadastro.index'    
    );}

    public function cadastro_aluno() {

        return view('painel.cadastro.cadastro_aluno'    
    );}
    public function cadastro_categoria() {

        return view('painel.cadastro.cadastro_categoria'    
    );}
    public function cadastro_conselho() {

        return view('painel.cadastro.cadastro_conselho'    
    );}
    
    public function cadastro_escola() {

        return view('painel.cadastro.cadastro_escola'    
    );}
    
    public function cadastro_ministerio() {

        return view('painel.cadastro.cadastro_ministerio'    
    );}
    
    public function cadastro_polo() {

        return view('painel.cadastro.cadastro_polo'    
    );}
    
    public function cadastro_prazo() {

        return view('painel.cadastro.cadastro_prazo'    
    );}
    
    public function cadastro_serie() {

        return view('painel.cadastro.cadastro_serie'    
    );}
    

}