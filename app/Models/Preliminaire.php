<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;

class Preliminaire extends Model implements HasMedia
{
    use HasFactory;
    use HasMediaTrait;

    public $table = 'preliminaires';

    public function lois()
    {
        return $this->belongsTo(Lois::class, 'lois_id' , 'id');
    }
}
