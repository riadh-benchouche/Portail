<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;

class Document extends Model implements HasMedia
{
    use HasFactory;
    use HasMediaTrait;
    use SoftDeletes;
    protected $dates=['deleted_at'];
    public $table = 'documents';

    public function categories()
    {
        return $this ->belongsTo('App\Models\Category', 'categorie_id' ,'id');
    }
}
