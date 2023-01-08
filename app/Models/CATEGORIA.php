<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CATEGORIA extends Model
{
    use HasFactory;
    protected $table = "categoria";

     protected $fillable = [
         'FichaCatNome',
         'FichaCatSts',
    
        
     ];

   // protected $guarded = [];

      public function FICHA(){
          return $this->belongsTo(FICHA::class);
      }


    }
