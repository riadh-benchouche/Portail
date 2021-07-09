<?php

namespace App\Http\Controllers;

use App\Models\InterVideo;
use App\Models\User;
use Illuminate\Http\Request;

class InterVideoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $User=auth()->user()->id;
        $InterVideos =InterVideo::where('user_id','=',$User);
        return view('Intervention.index', ['InterVideos'=>$InterVideos]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $deputes=User::where('category','=','Député')->get();
        return view('Intervention.create', ['deputes'=>$deputes]);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $InterVideo=new InterVideo();
        $InterVideo->title = $request->input('title');
        $InterVideo->user_id = $request->input('Depute');
        $InterVideo
            ->addMedia($request->file)
            ->toMediaCollection();
        $InterVideo->save();
        return redirect('InterVideo');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\InterVideo  $interVideo
     * @return \Illuminate\Http\Response
     */
    public function show(InterVideo $interVideo)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\InterVideo  $interVideo
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $InterVvideo = InterVideo::find($id);
        $deputes=User::where('category','=','Député')->get();
        return view('Intervention.edit',['InterVvideo' =>$InterVvideo, 'deputes' => $deputes ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\InterVideo  $interVideo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $InterVideo = InterVideo::find($id);
        if ($request->file != null) {
            $InterVideo->getFirstMedia()->delete();
            $InterVideo->addMedia($request->file)->toMediaCollection();
            $InterVideo->title = $request->input('title');
            $InterVideo->user_id = $request->input('Depute');
        }
        else {
            $InterVideo->title = $request->input('title');
            $InterVideo->user_id = $request->input('Depute');
        }
        $InterVideo->save();
        return redirect('InterVideo');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\InterVideo  $interVideo
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $InterVideo = InterVideo::find($id);
        $InterVideo-> delete();
        $InterVideo->getFirstMedia()->delete();
        return redirect('InterVideo');
    }
}
