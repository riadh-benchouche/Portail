<?php

namespace App\Http\Controllers;

use App\Models\Annonce;
use App\Models\User;
use App\Notifications\AnnonceAjouter;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Notification;
use PDF;


class AnnonceController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $annonces = Annonce::all();
        return view('Annonces.index', ['annonces' => $annonces]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Annonces.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $annonce = new Annonce();
        $annonce->title = $request->input('title');
        $annonce->contenu = $request->input('contenu');
        $annonce->type = $request->input('type');
        $annonce
            ->addMedia($request->file)
            ->toMediaCollection();

        $annonce->save();

        $users =User::all();
        Notification::send($users, new AnnonceAjouter($annonce));

         session()->flash('success', 'Annonce Ajouter');

        return redirect('annonce');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

   //  $notif=null;
   //     foreach (auth()->user()->unreadNotifications as $notification){
   //         if($notification->data['AnnonceId']==$id) $notif=$notification;
    //    }
   //     if($notif!=null){ $notif->markAsRead();
            //return redirect('annonce/'.$id);
      //  }
        $annonce = Annonce::find($id);

        return view('Annonces.detail', ['annonce'=>$annonce]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $annonce = Annonce::find($id);

        return view('Annonces.edit', ['annonce'=>$annonce]);
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
        $annonce = Annonce::find($id);
        if ($request->file != null) {
            $annonce->getFirstMedia()->delete();
            $annonce->addMedia($request->file)->toMediaCollection();
            $annonce->title = $request->input('title');
            $annonce->contenu= $request->input('contenu');
        }
        else {
            $annonce->title = $request->input('title');
            $annonce->contenu= $request->input('contenu');
        }

        $annonce->save();
        return redirect('annonce');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $annonce = Annonce::find($id);
        $annonce->getFirstMedia()->delete();
        $annonce-> delete();
        return redirect('annonce');
    }

    public function createPDF($id) {
        // retreive all records from db
        $annonce = Annonce::find($id);
        // $data = Employee::all();

        // share data to view
        view()->share('annonce',$annonce);

        $pdf = PDF::setOptions(['isRemoteEnabled' => true ])->loadView('pdf_view', $annonce);

        return $pdf->stream($annonce->title.'.pdf');
        //$pdf->loadHtml('pdf_view');
        //$pdf->loadHtml(ob_get_clean());
        //   PDF::loadView('pdf_view', $annonce);

        // download PDF file with download method
        // return $pdf->download($annonce->title.'.pdf');
    }
}
