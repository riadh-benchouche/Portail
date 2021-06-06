<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ministere extends Model
{
    use HasFactory;
    public $table = 'ministere';
    public function lois(){
        return $this ->hasMany('App\Models\Lois');
    }
}
