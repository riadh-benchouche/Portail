<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;

class Lois extends Model implements HasMedia
{
    public $table = 'lois';
    use HasMediaTrait;
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

    public function enonce()
    {
        return $this->hasOne(Enonce::class );
    }
    public function preliminaire()
    {
        return $this->hasOne(Preliminaire::class);
    }
    public function seance()
    {
        return $this->hasOne(Seance::class);
    }
    public function complementaire()
    {
        return $this->hasOne(complementaire::class);
    }
    public function intervention()
    {
        return $this->hasOne(Intervention::class);
    }


}
