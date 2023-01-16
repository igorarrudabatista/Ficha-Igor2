<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Wildside\Userstamps\Userstamps;


class FICHA extends Model


{
    use SoftDeletes;
    use HasFactory;
    use Userstamps;

    const CREATED_BY = 'created_by';
    const UPDATED_BY = 'updated_by';
    const DELETED_BY = 'deleted_by';

    protected $table = "ficha";

     protected $fillable = [
         'FichaStatus',
         'categoria_id',
         'escola_id',
         'aluno_id',
        
     ];

      public function CATEGORIA() {
          return $this->belongsTo(CATEGORIA::class, 'categoria_id');
          
          }    
        
    public function escola() {
    return $this->belongsTo(ESCOLA::class, 'escola_id' );
            }    
           
    public function Aluno() {
    return $this->belongsTo(ALUNO::class, 'aluno_id');
            }    

    public function User() {
    return $this->belongsTo(User::class, 'created_by');
            }    
           
     
}
