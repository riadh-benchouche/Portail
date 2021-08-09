<?php

namespace App\Http\Controllers;

use App\Ldap\User;
use App\Models\G_Parlementaire;
use Illuminate\Http\Request;

class GParlementaireController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $g_parlementaires =G_Parlementaire::all();
        return view('G_Parlementaire.index', ['g_parlementaires' => $g_parlementaires]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('G_Parlementaire.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $g_parlementaire=new G_Parlementaire();
        $g_parlementaire->name = $request->input('name');
        $g_parlementaire->matricule = $request->input('matricule');
        $g_parlementaire
            ->addMedia($request->file)
            ->toMediaCollection();


        $g_parlementaire->save();

        session()->flash('success', 'Groupe Parlementaire Ajouter');

        return redirect('G_Parlementaire');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\G_Parlementaire  $g_Parlementaire
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $g_parlementaire =G_Parlementaire::find($id);
        $membre1 = \App\Models\User::where('groupe_id','=',$g_parlementaire->id )->first();
        $membres = \App\Models\User::where("groupe_id","=",$g_parlementaire->id)->get();
        return view('G_Parlementaire.detail',['g_parlementaire' => $g_parlementaire,'membres'=>$membres,'membre1'=>$membre1]);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\G_Parlementaire  $g_Parlementaire
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $g_parlementaire =G_Parlementaire::find($id);
        return view('G_Parlementaire.edit', ['g_parlementaire'=>$g_parlementaire]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\G_Parlementaire  $g_Parlementaire
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $g_parlementaire =G_Parlementaire::find($id);
        if ($request->file != null) {
            $g_parlementaire->getFirstMedia()->delete();
            $g_parlementaire->addMedia($request->file)->toMediaCollection();
            $g_parlementaire->name = $request->input('name');
            $g_parlementaire->matricule = $request->input('matricule');
        }
        else {
            $g_parlementaire->name = $request->input('name');
            $g_parlementaire->matricule = $request->input('matricule');
        }
        //


        $g_parlementaire->save();
        return redirect('G_Parlementaire');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\G_Parlementaire  $g_Parlementaire
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $g_parlementaire =G_Parlementaire::find($id);

        $g_parlementaire-> delete();
        $g_parlementaire->getFirstMedia()->delete();
        return redirect('G_Parlementaire');
    }
}
