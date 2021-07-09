<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;

class InterVideo extends Model implements HasMedia
{
    use HasFactory;
    use HasMediaTrait;
    use SoftDeletes;

    protected $dates=['deleted_at'];
    public $table = 'inter_videos';

    public function users(){
        return $this ->hasMany('App\Models\User');
    }
}
