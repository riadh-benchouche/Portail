<?php

namespace App\Http\Controllers;

use App\Mail\ContactMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function create()
    {
        return view('contact.create');
    }

    public function store(Request $request)
    {

        $data = request()->validate([
            'name' => 'required',
            'email'=> 'required',
            'contenu'=>'required'
        ]);


        Mail::to('r.benchouche1@gmail.com')->send(new ContactMail($data));

        return redirect('contact');
    }
}
