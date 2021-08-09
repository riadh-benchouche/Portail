<?php

namespace App\Http\Controllers;


use App\Models\Comission;
use App\Models\complementaire;
use App\Models\ComplementaireAR;
use App\Models\Enonce;
use App\Models\EnonceAR;
use App\Models\Intervention;
use App\Models\InterventionAR;
use App\Models\Lois;
use App\Models\LoisAR;
use App\Models\Ministere;
use App\Models\Preliminaire;
use App\Models\PreliminaireAR;
use App\Models\Seance;
use App\Models\SeanceAR;
use App\Models\Session;
use Illuminate\Http\Request;
use ArielMejiaDev\LarapexCharts\LarapexChart;

use App\Models\Category_e;
use Calendar;
use App\Models\Event;



class LoisController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()

    {
        $lois = Lois::all();
        //$loisC = $lois->where('DtAdoptAPN','=',null);
        $loisp = Lois::where('DtAdoptAPN','=',null)->paginate(6);


        return view('lois.index' , ['loisp'=>$loisp]);
    }

    public function index1()
    {
        $lois = Lois::all();
        //$loisC = $lois->where('DtAdoptAPN','=',null);
        $loisp = Lois::where('DtAdoptAPN','!=',null)->paginate(6);


        return view('lois.detail' , ['loisp'=>$loisp]);
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
        $lois->type = $request->input('type');
        $lois->ministere_id = $request->input('ministere');
        $lois->session_id = $request->input('session');
        $lois->comission_id = $request->input('comission');
    //    $lois->comission_id = $id;
        $lois->save();
        $id=$request->input('comission');
        return redirect('lois') ;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    //public function show($id)
   // {
     //   $comission=Comission::find($id);
        //$lois=Lois::all();
     //   $loisdd =Lois::all()->where('comission_id','=', $comission->id );
      //  $loisp = Lois::where('comission_id','=',$comission->id);


      //  return view('lois.detail',['comission'=>$comission , 'lois'=>$loisdd]);
   // }

    public function detail($id)
    {
        $lois=Lois::find($id);
        $catergorys = Category_e::all();
        $chart = (new LarapexChart)->pieChart()
            ->addData([$lois->oui, $lois->non, $lois->abs])
            ->setLabels(['OUI', 'NON', 'ABS'])
            ->setColors(['#D32F2F', '#03A9F4','#538037'])
            ->setGrid([false, '#3F51B5', 0.1]);

        $events = [];
        $data = Event::Where('lois_id','=',$id)->get();
        if($data->count())
        {
            foreach ($data as $key => $value)
            {
                $events[] = Calendar::event(
                    $value->categories->name,
                    false,
                    new \DateTime($value->start_date),
                    new \DateTime($value->end_date),
                    null,
                    // Add color
                    [
                        'color'=> $value->categories->color,
                        'textColor' => $value->textColor,
                        'url' => 'fullcalender/'.$value->id,
                        'description' => $value->description,
                        'locale' =>'fr',
                    ],
                );
            }
        }

        $calendar = \Calendar::addEvents($events)->setOptions([
            //'locale' => 'fr',
            'lang' => 'fr'
        ]);


        return view('lois.description',['lois'=>$lois, 'chart' => $chart,'catergorys'=>$catergorys, 'events'=>$events, 'calendar'=>$calendar]);
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


        $lois = Lois::find($request->input('id'));
        if($lois->type == 2 )
        {
            if($lois->etat < 4 )
            {
                $lois->etat = "4";
            }
        }
        else
        {
            if($lois->etat < 1 )
            {
                $lois->etat = "1";
            }
        }





        $enonce->save();
        $lois->save();

            return redirect('loisdetails/'.$request->input('id'));
    }

    public function updateEnonceAR(Request $request)
    {
        $enonce = new EnonceAR();
        $enonce->lois_id = $request->input('id');
        $enonce
            ->addMedia($request->file)
            ->toMediaCollection();

        $enonce->save();

        return redirect('loisdetails/'.$request->input('id'));
    }

    public function updatePre(Request $request)
    {
        $pre = new Preliminaire();
        $pre->lois_id = $request->input('id');
        $pre
            ->addMedia($request->file)
            ->toMediaCollection();

        $lois = Lois::find($request->input('id'));
        if($lois->etat < 2 ) {
            $lois->etat = "2";
        }
        $lois->DtPresCom = $request->input('date');


        $pre->save();
        $lois->save();

        return redirect('loisdetails/'.$request->input('id'));
    }
    public function updatePreAR(Request $request)
    {
        $pre = new PreliminaireAR();
        $pre->lois_id = $request->input('id');
        $file = $request->file;
        $pre
            ->addMedia($file)
            ->toMediaCollection();

        $pre->save();


        return redirect('loisdetails/'.$request->input('id'));
    }



    public function updateSean(Request $request)
    {
        $sean = new Seance();
        $sean->lois_id = $request->input('id');
        $sean
            ->addMedia($request->file)
            ->toMediaCollection();

        $lois = Lois::find($request->input('id'));
        if($lois->etat < 3 ) {
        $lois->etat = "3"; }

        $lois->DtDiscusGen = $request->input('date');


        $sean->save();
        $lois->save();

        return redirect('loisdetails/'.$request->input('id'));
    }

    public function updateSeanAR(Request $request)
    {
        $sean = new SeanceAR();
        $sean->lois_id = $request->input('id');
        $sean
            ->addMedia($request->file)
            ->toMediaCollection();


        $sean->save();

        return redirect('loisdetails/'.$request->input('id'));
    }

    public function updateComp(Request $request)
    {
        $comp = new complementaire();
        $comp->lois_id = $request->input('id');
        $comp
            ->addMedia($request->file)
            ->toMediaCollection();

        $lois = Lois::find($request->input('id'));
        if($lois->etat < 4 ) {
            $lois->etat = "4";
        }
        $comp->save();
        $lois->save();

        return redirect('loisdetails/'.$request->input('id'));
    }
    public function updateCompAR(Request $request)
    {
        $comp = new ComplementaireAR();
        $comp->lois_id = $request->input('id');
        $comp
            ->addMedia($request->file)
            ->toMediaCollection();


        $comp->save();

        return redirect('loisdetails/'.$request->input('id'));
    }

    public function updateN(Request $request)
    {
        $lois = Lois::find($request->input('id'));


        $lois->DtAdoptAPN = $request->input('date');
        $lois->Adoption = $request->input('Adoption');

        $lois
            ->addMedia($request->file)
            ->toMediaCollection();
        if($lois->etat < 5 ) {
            $lois->etat = "5";
        }

        $lois->save();

        return redirect('loisdetails/'.$request->input('id'));
    }

    public function updateNAR(Request $request)
    {
        $lois = new LoisAR();
        $lois->lois_id = $request->input('id');
        $lois
            ->addMedia($request->file)
            ->toMediaCollection();


        $lois->save();

        return redirect('loisdetails/'.$request->input('id'));
    }

    public function updateInter(Request $request)
    {
        $inter = new Intervention();
        $inter->lois_id = $request->input('id');
        $inter
            ->addMedia($request->file)
            ->toMediaCollection();

        $lois = Lois::find($request->input('id'));

        $inter->save();
        $lois->save();

        return redirect('loisdetails/'.$request->input('id'));
    }

    public function updateInterAR(Request $request)
    {
        $inter = new InterventionAR();
        $inter->lois_id = $request->input('id');
        $inter
            ->addMedia($request->file)
            ->toMediaCollection();


        $inter->save();

        return redirect('loisdetails/'.$request->input('id'));
    }

    public function updateLois(Request $request)
    {

        $lois = Lois::find($request->input('id'));
        $lois->DtVote = $request->input('date');
        $lois->oui = $request->input('oui');
        $lois->non = $request->input('non');
        $lois->abs = $request->input('abs');
        if($lois->etat < 5 ) {
            $lois->etat = 5;
        }

        if ($request->input('oui')>$request->input('non')){
            $lois->resultat = true;
        }
        else {
            $lois->resultat = false;
        }

        $lois->save();

        return redirect('loisdetails/'.$request->input('id'));
    }

    public function downloadS($id)
    {
        $sean = Seance::find($id);
        return $sean ->getFirstMedia();
    }
    public function downloadSA($id)
    {
        $sean = SeanceAR::find($id);
        return $sean ->getFirstMedia();
    }

    public function downloadI($id)
    {
        $inter = Intervention::find($id);
        return $inter ->getFirstMedia();
    }
    public function downloadIA($id)
    {
        $inter = InterventionAR::find($id);
        return $inter ->getFirstMedia();
    }

    public function downloadN($id)
    {
        $lois = Lois::find($id);
        return $lois ->getFirstMedia();
    }

    public function downloadNA($id)
    {
        $lois = LoisAR::find($id);
        return $lois ->getFirstMedia();
    }


    public function downloadP($id)
    {
        $pre = Preliminaire::find($id);
        return $pre ->getFirstMedia();
    }
    public function downloadPA($id)
    {
        $pre = PreliminaireAR::find($id);
        return $pre ->getFirstMedia();
    }

    public function downloadC($id)
    {
        $comp = complementaire::find($id);
        return $comp ->getFirstMedia();
    }

    public function downloadCA($id)
    {
        $comp = ComplementaireAR::find($id);
        return $comp ->getFirstMedia();
    }

        public function download($id)
        {
            $enonce = Enonce::find($id);
            return $enonce ->getFirstMedia();
        }

    public function downloadE($id)
    {

        $enonce = EnonceAR::find($id);
        return $enonce ->getFirstMedia();
    }

    public function deleteE($id)
    {
        $sean = Enonce::find($id);

        $idL = $sean->lois_id;
        $sean->getFirstMedia()->delete();
        $sean-> delete();

        return redirect('loisdetails/'.$idL);
    }

    public function deleteEA($id)
    {
        $sean = EnonceAR::find($id);

        $idL = $sean->lois_id;
        $sean->getFirstMedia()->delete();
        $sean-> delete();

        return redirect('loisdetails/'.$idL);
    }

    public function deleteN($id)
    {
        $lois = Lois::find($id);
        $lois->getFirstMedia()->delete();

        return redirect('loisdetails/'.$lois->id);
    }

    public function deleteNA($id)
    {
        $lois = LoisAR::find($id);
        $lois->getFirstMedia()->delete();

        return redirect('loisdetails/'.$lois->id);
    }

    public function deleteI($id)
    {
        $inter = Intervention::find($id);

        $idL = $inter->lois_id;
        $inter->getFirstMedia()->delete();
        $inter-> delete();

        return redirect('loisdetails/'.$idL);
    }

    public function deleteIA($id)
    {
        $inter = InterventionAR::find($id);

        $idL = $inter->lois_id;
        $inter->getFirstMedia()->delete();
        $inter-> delete();

        return redirect('loisdetails/'.$idL);
    }

    public function deleteS($id)
    {
        $enonce = Seance::find($id);

        $idL = $enonce->lois_id;
        $enonce->getFirstMedia()->delete();
        $enonce-> delete();

        return redirect('loisdetails/'.$idL);
    }

    public function deleteSA($id)
    {
        $enonce = SeanceAR::find($id);

        $idL = $enonce->lois_id;
        $enonce->getFirstMedia()->delete();
        $enonce-> delete();

        return redirect('loisdetails/'.$idL);
    }

    public function deleteP($id)
    {
        $pre = Preliminaire::find($id);

        $idL = $pre->lois_id;
        $pre->getFirstMedia()->delete();
        $pre-> delete();

        return redirect('loisdetails/'.$idL);
    }

    public function deletePA($id)
    {
        $pre = PreliminaireAR::find($id);

        $idL = $pre->lois_id;
        $pre->getFirstMedia()->delete();
        $pre-> delete();

        return redirect('loisdetails/'.$idL);
    }

    public function deleteC($id)
    {
        $comp = complementaire::find($id);

        $idL = $comp->lois_id;
        $comp->getFirstMedia()->delete();
        $comp-> delete();

        return redirect('loisdetails/'.$idL);
    }

    public function deleteCA($id)
    {
        $comp = ComplementaireAR::find($id);

        $idL = $comp->lois_id;
        $comp->getFirstMedia()->delete();
        $comp-> delete();

        return redirect('loisdetails/'.$idL);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $lois = Lois::find($id);

        if ($lois->getFirstMedia()){
            $lois->getFirstMedia()->delete();
            $lois-> delete();
        }
        else {
            $lois-> delete();
        }



        return redirect('lois');

    }
}
