<?php

namespace App\Http\Controllers;

use App\Models\Comission;
use App\Models\Traveau;
use Illuminate\Http\Request;

class TraveauController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
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
        $comission = Comission::all();
        return view('travaux.create', ['commissions'=>$comission] );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $travail = new Traveau();

        $travail->name = $request->input('name');
        $travail->commission_id = $request->input('commission');
        $travail->contenu = $request->input('contenu');
        $travail
            ->addMedia($request->file)
            ->toMediaCollection();

        $travail->save();

        return redirect('commission/'.$request->commission);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Traveau  $traveau
     * @return \Illuminate\Http\Response
     */
    public function show(Traveau $id)
    {
        $traveaux = Traveau::find($id)->first();

      // dd($traveaux->getMedia());
        //$actualites = Actualite::lates    t()->take(3)->get();

        //  dd($actualites);
        return view ('travaux.detail', ['travau'=>$traveaux ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Traveau  $traveau
     * @return \Illuminate\Http\Response
     */
    public function edit(Traveau $id)
    {
        $travaux = Traveau::find($id);

        return view('travaux.edit', ['travaux'=>$travaux]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Traveau  $traveau
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Traveau $id)
    {

        $travaux = Traveau::find($id);
        if ($request->file != null) {
            $travaux->getFirstMedia()->delete();
            $travaux->addMedia($request->file)->toMediaCollection();
            $travaux->commission_id = $request->input('commission');
            $travaux->title = $request->input('name');
            $travaux->contenu= $request->input('contenu');
        }
        else {
            $travaux->title = $request->input('title');
            $travaux->contenu= $request->input('contenu');
        }
        //    $actualite->putMedia($key('file'))->toMediaCollection();


        $travaux->save();
        return redirect('travaux'/$travaux->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Traveau  $traveau
     * @return \Illuminate\Http\Response
     */
    public function destroy(Traveau $id)
    {
        $travaux = Traveau::find($id)->first();

        $back = $travaux->commission_id;

        $travaux->getFirstMedia()->delete();
        $travaux-> delete();

        return redirect('commission/'.$back);
    }
}
