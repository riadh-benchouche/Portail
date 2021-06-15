<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Department extends Model
{
    public function services(){
        return $this ->hasMany('App\Models\Service');
    }
    public function users(){
        return $this ->hasMany('App\Models\User');
    }
    public function partages(){
        return $this ->hasMany('App\Models\Partage');
    }

    use HasFactory;
    use SoftDeletes;
    protected $dates=['deleted_at'];
    public $table = 'departments';
}
