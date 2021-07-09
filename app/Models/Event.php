<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;

    public function categories()
    {
        return $this ->belongsTo('App\Models\Category_e', 'category_id' ,'id');
    }

    public function lois()
    {
        return $this ->belongsTo('App\Models\Lois', 'lois_id' ,'id');
    }

    protected $fillable = [

        'title', 'start_date', 'end_date',

    ];
}
