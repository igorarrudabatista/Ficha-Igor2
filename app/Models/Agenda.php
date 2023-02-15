<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Agenda extends Model


{
    use HasFactory;
    protected $table = 'Agenda';

    protected $fillable = [
            'start_time',
            'finish_time',
            'comments',
            'users',
            
     ];

    public function Users() {
        return $this->BelongsTo(User::class, 'users');
        }      
     
}
