<?php

namespace App\Http\Controllers;

use App\Models\Comission;
use App\Models\Lois;
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $comission=Comission::find($id);
        $lois=Lois::all();
        foreach ($lois as $loi)
        {
            $loisd=$lois->first()->comission_id;
        }

        $loisdd =$lois->where('comission_id','=', $comission->id );
       // $loisd =Lois::where($comission->id == $lois->comission_id)->first();
        return view('lois.detail',['comission'=>$comission , 'lois'=>$loisdd]);
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
