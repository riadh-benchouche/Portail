<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lois extends Model
{
    use HasFactory;

    public function ministeres()
    {
        return $this ->belongsTo('App\Models\Ministere', 'ministere_id' ,'id');
    }
    public function sessions()
    {
        return $this ->belongsTo('App\Models\Session', 'session_id' ,'id');
    }
    public function comissions()
    {
        return $this ->belongsTo('App\Models\Comission', 'comission_id' ,'id');
    }
}
