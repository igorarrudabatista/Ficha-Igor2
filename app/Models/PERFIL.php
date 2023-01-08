<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PERFIL extends Model


{
    use HasFactory;
    protected $table = "perfil";

     protected $fillable = [
         'perfil_acesso',
        
     ];

    // public function categorias() {
    //     return $this->belongsToMany(CATEGORIA::class)->withPivot(['Quantidade']);
    //     }    
        
    // public function escola() {
    // return $this->belongsTo(ESCOLA::class);
    //         }    
           
     
}
