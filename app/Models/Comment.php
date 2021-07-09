<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\HasMedia\HasMedia;

class Comment extends Model
{
    public function users()
    {
        return $this ->belongsTo('App\Models\User', 'user_id' ,'id');
    }
    use HasFactory;
    public $table = 'comments';
}
