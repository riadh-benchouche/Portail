<?php

namespace App\Http\Controllers;

use App\Models\Actualite;
use App\Models\Comission;
use App\Models\Traveau;
use App\Models\User;
use App\Models\Lois;
use App\Notifications\ActualiteAjouter;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Notification;

class CommissionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $commission = Comission::all();
        return view('commission.index', ['commissions' => $commission]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('commission.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $commission = new Comission();

        $commission->name = $request->input('name');
        $commission->matricule = $request->input('matricule');
        $commission
            ->addMedia($request->file)
            ->toMediaCollection();


        $commission->save();

        session()->flash('success', 'Actualité Ajouter');

        return redirect('commission');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        $comission =Comission::find($id);
        $travaux = Traveau::where('commission_id','=',$comission->id)->paginate(3);
        $loisp = Lois::where('comission_id','=',$comission->id)->paginate(6);
        $president =User::where('comission_id','=', $comission->id )
                                      ->where('president','=', 1)->first();
        $vice =User::where('comission_id','=', $comission->id )
            ->where('president','=', 2)->first();
        $refer =User::where('comission_id','=', $comission->id )
            ->where('president','=', 3)->first();
        $depute =User::where('comission_id','=', $comission->id )
            ->where('president', '=', 4)->first();

        $membre =User::where('comission_id','=', $comission->id )
                     ->where('president', '=', 4)->paginate(2);
        //dd($membre);
        return view('commission.detail',['president' => $president,'depute'=>$depute, 'refer'=>$refer, 'vice'=>$vice ,'membres' => $membre , 'loisp'=>$loisp, 'travaux' => $travaux]);
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
        //
    }
}
