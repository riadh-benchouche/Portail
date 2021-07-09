<?php

namespace App\Http\Controllers;

use App\Models\Actualite;
use App\Models\User;
use App\Models\Comment;
use App\Notifications\ActualiteAjouter;
use App\Notifications\ajouter;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Notification;

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

        $users =User::all();
        Notification::send($users, new ActualiteAjouter($actualite));

        session()->flash('success', 'Actualité Ajouter');

        return redirect('actualite');
    }

    public function comment(Request $request, $id)
    {
        $actualite = Actualite::find($id);
        $user = User::find(Auth::id());

        //$user = User::find(Auth::id());
        $comment = new Comment();
        $comment->commentable_type = "App\Models\Actualite";
        $comment->commentable_id = $actualite->id;
        $comment->comment = $request->input('content');
        $comment->user_id = $user->id;

        $comment->save();

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
        $actualite = Actualite::find($id);
        $comments = Comment::Where('commentable_id','=',$actualite->id)->Where('commentable_type','=','App\Models\Actualite')->get();

      //  dd($actualites);
        return view ('actualite.detail', ['actualite'=>$actualite , 'comments'=>$comments]);
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
    $actualite->title = $request->input('title');
    $actualite->contenu= $request->input('contenu');
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
