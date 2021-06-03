<?php


namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\RH;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Calendar;




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
       //foreach (auth()->user()->unreadNotifications as $notification ){
       //  dd($notification->type);}

        return view('dashboard');

      //  return view('dashboard');
    }
}
