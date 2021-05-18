<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;

class Intervention extends Model implements HasMedia
{
    use HasFactory;
    use HasMediaTrait;

    public $table = 'interventions';

    public function lois()
    {
        return $this->belongsTo(Lois::class, 'lois_id' , 'id');
    }
}
