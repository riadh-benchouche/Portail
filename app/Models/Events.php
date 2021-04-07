<?php

namespace App\Models;

use DateTime;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Events extends Model implements \LaravelFullCalendar\Event
{
    use HasFactory;
    protected $dates = ['start', 'end'];


    public function getId() {
        return $this->id;
    }
    public function getTitle()
    {
        return $this->title;
    }

    public function isAllDay()
    {
        return (bool)$this->all_day;
    }

    public function getStart()
    {
        return $this->start;
    }

    public function getEnd()
    {
        return $this->end;
    }

    public function getEventOptions()
    {
        return [
            'color' => $this->blue,
        ];
    }
}
