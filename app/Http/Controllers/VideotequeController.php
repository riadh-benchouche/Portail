<?php

namespace App\Http\Controllers;

use App\Models\GImage;
use App\Models\Videoteque;
use Illuminate\Http\Request;

class VideotequeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $videos =Videoteque::all();
        return view('Video.index', ['videos'=>$videos]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Video.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $video = new Videoteque();
        $video->title = $request->input('title');
        $video
            ->addMedia($request->file)
            ->toMediaCollection();


        $video->save();
        return redirect('Video');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Videoteque  $videoteque
     * @return \Illuminate\Http\Response
     */
    public function show(Videoteque $videoteque)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Videoteque  $videoteque
     * @return \Illuminate\Http\Response
     */
    public function edit(Videoteque $videoteque)
    {
        $video = Videoteque::find($id);

        return view('Image.edit', ['video'=>$video]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Videoteque  $videoteque
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $video = Videoteque::find($id);
        if ($request->file != null) {
            $video->getFirstMedia()->delete();
            $video->addMedia($request->file)->toMediaCollection();
            $video->title = $request->input('title');
        }
        else {
            $video->title = $request->input('title');
        }


        $video->save();
        return redirect('Video');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Videoteque  $videoteque
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $video = Videoteque::find($id);

        $video-> delete();
        $video->getFirstMedia()->delete();
        return redirect('Video');
    }
}
