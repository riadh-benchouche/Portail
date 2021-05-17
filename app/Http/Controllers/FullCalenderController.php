<?php

namespace App\Http\Controllers;
use App\Models\Category_e;
use Illuminate\Http\Request;
use Calendar;
use App\Models\Event;

class FullCalenderController extends Controller
{
    public function index()
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
        return view('fullcalender',compact('events','calendar'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function create()
    {
        $catergorys = Category_e::all();
        return view("addevent" , compact('catergorys'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title'=>'required',
            'start_date'=>'required',
            'end_date'=>'required',
        ]);
        $events=new Event;
        $events->title=$request->input('title');
        $events->category_id = $request->input('category');
        $events->start_date=$request->input('start_date');
        $events->end_date=$request->input('end_date');
        $events->description=$request->input('description');
        $events->save();
        return redirect('fullcalender');
    }

    public function detail($id)
    {
        $event = Event::find($id);

        return view('calendardetail', ['event'=>$event]);
    }

    //public function show()
    //{
    //    $events = Event::all();
    //    return view('display')->with('events',$events);
    //}
    public function edit($id)
    {
        $events = Event::find($id);
        $catergorys = Category_e::all();

        return view('editform', ['events'=>$events , 'catergorys' => $catergorys]);
    }


    public function update(Request $request, $id)
    {
        $events = Event::find($id);
        $events->title=$request->input('title');
        $events->category_id = $request->input('category');
        $events->start_date=$request->input('start_date');
        $events->end_date=$request->input('end_date');
        $events->description=$request->input('description');
        $events->save();
        return redirect('fullcalender');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $events = Event::find($id);
        $events->delete();
        return redirect('/fullcalender');
    }
}
