<?php

namespace App\Http\Controllers;

use App\Models\BibliothequeU;
use App\Models\RH;
use Illuminate\Http\Request;

class BibliothequeuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $bibls = BibliothequeU::all();
        return view('bibliothequeUniversel.index', ['bibls' => $bibls]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('bibliothequeUniversel.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $bibls = new BibliothequeU();
        $bibls->name = $request->input('name');
        $bibls
            ->addMedia($request->file)
            ->toMediaCollection();


        $bibls->save();

        // session()->flash('success', 'Document uploider');

        return redirect('bibu');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        $bibls = BibliothequeU::find($id);
        return $bibls->getFirstMedia();

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $bibls = BibliothequeU::find($id);

        $bibls->getFirstMedia()->delete();
        $bibls-> delete();
        return redirect('bibu');
    }
}
