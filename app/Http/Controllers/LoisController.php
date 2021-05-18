<?php

namespace App\Http\Controllers;


use App\Models\Comission;
use App\Models\Enonce;
use App\Models\Lois;
use App\Models\Ministere;
use App\Models\Session;
use Illuminate\Http\Request;

class LoisController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $commission = Comission::all();
        return view('lois.index' , ['commissions' => $commission]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create1()
    {
        $comission = Comission::all();
        $ministere = Ministere::all();
        $sessions = Session::all();
        return view ('lois.create',['sessions'=>$sessions , 'ministeres'=>$ministere , 'comissions'=>$comission]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $lois = new Lois();
        $lois->name= $request->input('name');
        $lois->contenu= $request->input('contenu');
        $lois->NbAraticle= $request->input('nbarticle');
        $lois->DtDepot= $request->input('DtDepot');
        $lois->ministere_id = $request->input('ministere');
        $lois->session_id = $request->input('session');
        $lois->comission_id = $request->input('comission');
    //    $lois->comission_id = $id;
        $lois->save();
        $id=$request->input('comission');
        return redirect('lois/'.$id) ;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id, Lois $model)
    {
        $comission=Comission::find($id);
        $lois=Lois::all();
        $loisdd =$lois->where('comission_id','=', $comission->id );
        return view('lois.detail',['comission'=>$comission , 'lois'=>$loisdd , 'lois' => $model->SimplePaginate(5)]);
    }

    public function detail($id)
    {
        $lois=Lois::find($id);
        return view('lois.description',['lois'=>$lois]);
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

    public function updateEnonce(Request $request)
    {

        $enonce = new Enonce();
        $enonce->lois_id = $request->input('id');
        $enonce
            ->addMedia($request->file)
            ->toMediaCollection();

        $enonce->save();
            return redirect('loisdetails/'.$request->input('id'));
    }




    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
