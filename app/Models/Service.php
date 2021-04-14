<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Service extends Model
{
    public function users(){
        return $this ->hasMany('App\Models\User');
    }

    use HasFactory;
    use SoftDeletes;
    protected $dates=['deleted_at'];
    public $table = 'service';
}
