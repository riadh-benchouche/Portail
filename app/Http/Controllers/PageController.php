<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\RH;
use Calendar;
use App\Models\Category_e;



class PageController extends Controller
{
    /**
     * Display icons page
     *
     * @return \Illuminate\View\View
     */
    public function icons()
    {
        $events = [];
        $data = Event::all();
        if($data->count())
        {
            foreach ($data as $key => $value)
            {
                $events[] = Calendar::event(
                    $value->categories->name,
                    false,
                    new \DateTime($value->start_date),
                    new \DateTime($value->end_date),
                    null,
                    // Add color
                    [
                        'color'=> $value->categories->color,
                        'textColor' => $value->textColor,
                        'url' => 'fullcalender/'.$value->id,
                        'description' => $value->description,
                        'locale' =>'fr',
                    ],
                );
            }
        }

        $calendar = \Calendar::addEvents($events)->setOptions([
            //'locale' => 'fr',
            'lang' => 'fr'
        ]);
        return view('pages.icons',compact('events','calendar'));
    }

    /**
     * Display maps page
     *
     * @return \Illuminate\View\View
     */
    public function maps()
    {
        return view('pages.maps');
    }

    /**
     * Display tables page
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\View\View
     */
    public function tables()
    {
        return view('Rh.index');
    }

    public function Rh(RH $model)
    {
     //  return view('Rh.index', ['rhs' => $model->paginate(15)])  ;
    }

    /**
     * Display notifications page
     *
     * @return \Illuminate\View\View
     */
    public function notifications()
    {
        return view('pages.notifications');
    }

    /**
     * Display rtl page
     *
     * @return \Illuminate\View\View
     */
    public function rtl()
    {
        return view('pages.rtl');
    }

    /**
     * Display typography page
     *
     * @return \Illuminate\View\View
     */
    public function typography()
    {
        return view('pages.typography');
    }

    /**
     * Display upgrade page
     *
     * @return \Illuminate\View\View
     */
    public function upgrade()
    {
        return view('pages.upgrade');
    }
}
