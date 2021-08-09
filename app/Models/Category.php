<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{

    use HasFactory;
    use SoftDeletes;
    protected $dates=['deleted_at'];
    public $table = 'table_categorie_document';

    public function documents(){
        return $this ->hasMany('App\Models\Document');
    }

}
