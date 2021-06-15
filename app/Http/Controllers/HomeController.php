<?php


namespace App\Http\Controllers;

use App\Models\Actualite;
use App\Models\Annonce;
use App\Models\Event;
use App\Models\Lois;
use App\Models\RH;
use App\Models\Traveau;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Calendar;
use ArielMejiaDev\LarapexCharts\LarapexChart;





class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        //$janvier = Lois::where()
        $calendar = Calendar::setOptions([
            //'locale' => 'fr',
            'lang' => 'fr'
        ]);

        $chart2 = (new LarapexChart)->radialChart()
            ->setTitle('Passing effectiveness.')
            ->setSubtitle('Barcelona city vs Madrid sports.')
            ->addData([75, 60])
            ->setLabels(['Barcelona city', 'Madrid sports'])
            ->setColors(['#D32F2F', '#03A9F4']);

        $chart = (new LarapexChart)->barChart()
            ->setTitle('Nombre de lois')
            //->setSubtitle('Wins during season 2021.')
            ->addData('Lois Abordé', \App\Models\Lois::query()->inRandomOrder()->limit(12)->pluck('id')->toArray())
            ->addData('Lois en Cours', \App\Models\Lois::query()->inRandomOrder()->limit(12)->pluck('id')->toArray())
            ->setColors(['#54a396', '#3e5c99'])
            ->setToolbar(true)

          //  ->setMarkers(['#FF5722', '#E040FB'], 7, 10)
        ->setXAxis(['Janvier', 'Février', 'Mars', 'Avril', 'Mai', 'Juin','Juillet','Septembre','Octobre','Novembre','Decembre']);

       //foreach (auth()->user()->unreadNotifications as $notification ){
       //  dd($notification->type);}
        $rhs = RH::latest()->take(8)->get();
        $actualites = Actualite::latest()->take(6)->get();
        $annonces = Annonce::latest()->take(6)->get();
        $events = Event::latest()->take(3)->get();
        $lois = Lois::where('DtAdoptAPN','!=',null)->latest()->take(5)->get();
        $travaux = Traveau::latest()->take(6)->get();

        return view('dashboard', compact('actualites','lois','events','travaux','chart','calendar','annonces','rhs', 'chart2'));

      //  return view('dashboard');
    }
    public function cal() {
        return view('layouts.minical');
    }
    public function cal2() {
        return view('layouts.minical2');
    }
}
