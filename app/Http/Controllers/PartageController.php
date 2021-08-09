<?php

namespace App\Http\Controllers;

use App\Models\Partage;
use Illuminate\Http\Request;

class PartageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $partage = new Partage();
        $partage->department_id = $request->input('id');
        $partage->user_id = $request->input('user_id');
        $partage->name = $request->input('name');
        $partage
            ->addMedia($request->file)
            ->toMediaCollection();
        $partage->save();
        session()->flash('success', 'Service  Ajouter');

        return redirect('department/'.$request->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Partage  $partage
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $partage = Partage::find($id);
        return $partage->getFirstMedia();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Partage  $partage
     * @return \Illuminate\Http\Response
     */
    public function edit(Partage $partage)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Partage  $partage
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Partage $partage)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Partage  $partage
     * @return \Illuminate\Http\Response
     */
    public function destroy(Partage $partage)
    {
        //
    }
}
