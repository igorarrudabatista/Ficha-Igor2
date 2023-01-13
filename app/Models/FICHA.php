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

      public function categoria() {
          return $this->hasMany(CATEGORIA::class, 'categoria_id');
          
          }    
        
    public function escola() {
    return $this->belongsTo(ESCOLA::class);
            }    
           
    public function Aluno() {
    return $this->belongsTo(ALUNO::class);
            }    
           
     
}
