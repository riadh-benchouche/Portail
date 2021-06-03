<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;
use Spatie\MediaLibrary\Models\Media;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;




class RH extends Model implements HasMedia
{
    use HasFactory;
    use HasMediaTrait;
    use SoftDeletes;
    protected $dates=['deleted_at'];
    public $table = 'r_h_s';

}
