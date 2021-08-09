<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TeAstuce extends Model
{
    use HasFactory;

    protected $dates=['deleted_at'];
    public $table = 'te_astuces';
}
