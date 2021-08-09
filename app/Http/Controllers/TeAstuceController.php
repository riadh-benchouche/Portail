<?php

namespace App\Http\Controllers;

use App\Models\TeAstuce;
use App\Models\User;
use App\Notifications\TeAAjouter;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Notification;

class TeAstuceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $TeAs = TeAstuce::all();
        return view('TestEtAstuce.index', ['TeAs' => $TeAs]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('TestEtAstuce.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $TeAs =new TeAstuce();
        $TeAs->title = $request->input('title');
        $TeAs->contenu = $request->input('contenu');
        $TeAs->save();

        $users =User::all();
        Notification::send($users, new TeAAjouter($TeAs));

        return redirect('TestEtAstuce');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\TeAstuce  $teAstuce
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $TeA=TeAstuce::find($id);
        return view('TestEtAstuce.detail', ['TeAs' => $TeA]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\TeAstuce  $teAstuce
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $TeA=TeAstuce::find($id);
        return view('TestEtAstuce.edit', ['TeAs' => $TeA]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\TeAstuce  $teAstuce
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $TeA=TeAstuce::find($id);
        $TeA->title = $request->input('title');
        $TeA->contenu= $request->input('contenu');
        $TeA->save();


        return redirect('TestEtAstuce');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\TeAstuce  $teAstuce
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $TeA=TeAstuce::find($id);
        $TeA-> delete();
        return redirect('TestEtAstuce');

    }
}
