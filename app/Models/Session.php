<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Session extends Model
{
    use HasFactory;
    public $table = 'session';

    public function lois(){
        return $this ->hasMany('App\Models\Lois');
    }
}
