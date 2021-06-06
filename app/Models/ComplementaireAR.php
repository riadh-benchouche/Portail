<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;

class ComplementaireAR extends Model implements HasMedia
{
    use HasMediaTrait;
    public $table = 'complementaire_a_r_s';

    public function lois()
    {
        return $this->belongsTo(Lois::class, 'lois_id' , 'id');
    }
}
