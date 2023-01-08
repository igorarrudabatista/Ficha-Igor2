<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Spatie\Permission\Traits\HasRoles;

use App\Models\TBGEDALUNO;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    
    public function home() {

   // $alunos = TBGEDALUNO::whereIn('GedAluCod', ['10'])->get();
    
    return view('base.base', [
        // 'alunos' => $alunos
    ]      
    );}

}
