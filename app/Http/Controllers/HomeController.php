<?php


namespace App\Http\Controllers;

use App\Models\Actualite;
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

        $chart = (new LarapexChart)->barChart()
           // ->setTitle('Nombre de lois')
            //->setSubtitle('Wins during season 2021.')
            ->addData('Lois Abordé', \App\Models\Lois::query()->inRandomOrder()->limit(12)->pluck('id')->toArray())
            ->addData('Lois en Cours', \App\Models\Lois::query()->inRandomOrder()->limit(12)->pluck('id')->toArray())
            ->setColors(['#E8E8ED', '#A1B0CE'])
            ->setGrid(false, '#3F51B5', 0.1)
            ->setXAxis(['Janvier', 'Février', 'Mars', 'Avril', 'Mai', 'Juin','Juillet','Septembre','Octobre','Novembre','Decembre']);
       //foreach (auth()->user()->unreadNotifications as $notification ){
       //  dd($notification->type);}
        $actualites = Actualite::latest()->take(3)->get();
        $travaux = Traveau::latest()->take(2)->get();

        return view('dashboard', compact('actualites','travaux','chart','calendar'));

      //  return view('dashboard');
    }
}
