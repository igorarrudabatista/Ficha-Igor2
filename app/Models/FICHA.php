<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FICHA extends Model


{
    use HasFactory;
    protected $table = "ficha";

     protected $fillable = [
         'FichaStatus',
         'categoria_id',
         'escola_id',
         'aluno_id',
        
     ];

    public function categorias() {
        return $this->belongsToMany(CATEGORIA::class)->withPivot(['Quantidade']);
        }    
        
    public function escola() {
    return $this->belongsTo(ESCOLA::class);
            }    
           
     
}
