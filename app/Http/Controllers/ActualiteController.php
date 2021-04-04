<?php

namespace App\Http\Controllers;

use App\Models\Actualite;
use Illuminate\Http\Request;

class ActualiteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $actualite = Actualite::all();
        return view('actualite.index', ['actualites' => $actualite]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('actualite.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $actualite = new Actualite();

        $actualite->title = $request->input('title');
        $actualite->contenu = $request->input('contenu');
        $actualite
            ->addMedia($request->file)
            ->toMediaCollection();


        $actualite->save();

        session()->flash('success', 'Actualité Ajouter');

        return redirect('actualite');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $actualite = Actualite::find($id);

        return view('actualite.edit', ['actualite'=>$actualite]);
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
        $actualite = Actualite::find($id);
if ($request->file != null) {
        $actualite->getFirstMedia()->delete();

        $actualite->addMedia($request->file)->toMediaCollection();
}
else {
    $actualite->title = $request->input('title');
    $actualite->contenu= $request->input('contenu');
}
        //    $actualite->putMedia($key('file'))->toMediaCollection();


        $actualite->save();
        return redirect('actualite');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $actualite = Actualite::find($id);

        $actualite-> delete();
        $actualite->getFirstMedia()->delete();
        return redirect('actualite');
    }
}
