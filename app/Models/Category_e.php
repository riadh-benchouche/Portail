<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category_e extends Model
{


    public function events(){
        return $this ->hasMany('App\Models\Event');
    }

    use HasFactory;
    use SoftDeletes;
    protected $dates=['deleted_at'];
    public $table = 'category_e';
}
