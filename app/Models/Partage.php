<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;

class Partage extends Model implements HasMedia
{
    use HasMediaTrait;

    public function departements()
    {
        return $this ->belongsTo('App\Models\Department', 'department_id' ,'id');
    }

    public function users()
    {
        return $this ->belongsTo('App\Models\User', 'user_id' ,'id');
    }
    use HasFactory;
    use SoftDeletes;
    protected $dates=['deleted_at'];
    public $table = 'partages';
}
