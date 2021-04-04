<?php

namespace App\Http\Controllers;

use App\Models\RH;
use App\Http\Requests\RhRequest;
use App\Models\User;
use App\Notifications\ajouter;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\Storage;
use Spatie\MediaLibrary\Models\Media;
use Spatie\MediaLibrary\UrlGenerator\UrlGenerator;


class Rhcontroller extends Controller
{
        public function index()
        {
            $rhs = RH::all();
            return view('Rh.index', ['rhs' => $rhs]);
        }
    public function create()
    {
        return view('Rh.create');
    }

    public function store(RhRequest $request)

    {
        $rh = new RH();
        $rh->name = $request->input('name');
        $rh
            ->addMedia($request->file)
            ->toMediaCollection();


        $rh->save();
        $users =User::all();
        Notification::send($users, new ajouter($rh));

       // session()->flash('success', 'Document uploider');
        notify()->success('Laravel Notify is awesome!');
        return redirect('rh');
    }
    public function show($id)
    {
        $rh = RH::find($id);
        return $rh->getFirstMedia();
    }

    public function destroy(RhRequest $request,$id)
    {
        $rh = RH::find($id);

        $rh-> delete();
        $rh->getFirstMedia()->delete();
        return redirect('rh');
    }



}
