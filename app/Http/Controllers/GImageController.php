<?php

namespace App\Http\Controllers;

use App\Models\Actualite;
use App\Models\GImage;
use Illuminate\Http\Request;

class GImageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $images =GImage::all();
        return view('Image.index', ['images'=>$images]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Image.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $image = new GImage();
        $image->title = $request->input('title');
        $image
            ->addMedia($request->file)
            ->toMediaCollection();


        $image->save();
        return redirect('Image');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\GImage  $gImage
     * @return \Illuminate\Http\Response
     */
    public function show(GImage $gImage)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\GImage  $gImage
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $image = GImage::find($id);

        return view('Image.edit', ['image'=>$image]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\GImage  $gImage
     * @return \Illuminate\Http\Response
     */

     public function update(Request $request, $id)
     {
         $image = GImage::find($id);
         if ($request->file != null) {
             $image->getFirstMedia()->delete();

             $image->addMedia($request->file)->toMediaCollection();
             $image->title = $request->input('title');
         }
         else {
             $image->title = $request->input('title');
         }
         //


         $image->save();
         return redirect('Image');
     }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\GImage  $gImage
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $image = GImage::find($id);

        $image-> delete();
        $image->getFirstMedia()->delete();
        return redirect('Image');
    }
}
