<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    use HasFactory;

    protected $table = 'categoria';

    // protected $fillable = [
    //     'FichaCatNome',
    //     'FichaCatSts',
      
    // ];

   protected $guarded = [];


    public function FICHA() {
        return $this->hasMany(FICHA::class);
        }   
}
