<?php

namespace App\Http\Controllers;

use App\Models\Comission;
use App\Models\Department;
use App\Models\G_Parlementaire;
use App\Models\Service;
use App\Models\User;
use App\Http\Requests\UserRequest;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use function React\Promise\all;


class UserController extends Controller
{
    /**
     * Display a listing of the users
     *
     * @param  \App\Models\User  $model
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $commission = Comission::all();
        $groupes = G_Parlementaire::all();
        $users = User::where('category','=','Député')->paginate(6);
        return view('users.index', ['users' => $users, 'commissions'=>$commission, 'groupes'=>$groupes]);
    }
    public function search()
    {
        $commission = Comission::all();
        $groupes = G_Parlementaire::all();

        $n = request()->input('n');
        $g = request()->input('g');
        $m = request()->input('m');
        $comission = request()->input('comission');
        $president = request()->input('president');
        $depute = User::Where('category','=','Député');

        if ($comission && $president && $g) {
            $users=$depute->Where('matricule','like',"$m%")->Where('name','like',"%$n%" )->Where('comission_id','=',"$comission" )->Where('president','=',"$president" )->Where('groupe_id','=',"$g" )->get();
        }
        elseif ($comission && !$president && $g) {
            $users=$depute->Where('matricule','like',"$m%")->Where('name','like',"%$n%" )->Where('comission_id','=',"$comission" )->Where('groupe_id','=',"$g" )->get();
        }
        elseif (!$comission && $president && $g) {
            $users=$depute->Where('matricule','like',"$m%")->Where('name','like',"%$n%" )->Where('president','=',"$president" )->Where('groupe_id','=',"$g" )->get();
        }
        elseif ($comission && $president && !$g) {
            $users=$depute->Where('matricule','like',"$m%")->Where('name','like',"%$n%" )->Where('comission_id','=',"$comission" )->Where('president','=',"$president" )->get();
        }
        if ($comission && !$president && !$g) {
            $users=$depute->Where('matricule','like',"$m%")->Where('name','like',"%$n%" )->Where('comission_id','=',"$comission" )->get();
        }
        elseif (!$comission && $president && !$g) {
            $users=$depute->Where('matricule','like',"$m%")->Where('name','like',"%$n%" )->Where('president','=',"$president" )->get();
        }
        elseif (!$comission && !$president && $g) {
            $users=$depute->Where('matricule','like',"$m%")->Where('name','like',"%$n%" )->Where('groupe_id','=',"$g" )->get();
        }
        else {
            $users=$depute->Where('matricule','like',"$m%")->Where('name','like',"%$n%" )->get();
        }
        return view('users.searchd', ['users' => $users, 'commissions'=>$commission,'groupes'=>$groupes]);
    }

    public function searchf()
    {
        $directions = Department::all();
        $services = Service::all();

        $n = request()->input('n');
        $m = request()->input('m');
        $direction = request()->input('dir');
        $service = request()->input('ser');
        $fonc = User::Where('category','=','Salarié');

        if ($direction && $service) {
            $users=$fonc->Where('matricule','like',"$m%")->Where('name','like',"%$n%" )->Where('department_id','=',"$direction" )->Where('service_id','=',"$service" )->get();
        }
        elseif ($direction && !$service) {
            $users=$fonc->Where('matricule','like',"$m%")->Where('name','like',"%$n%" )->Where('department_id','=',"$direction" )->get();
        }
        elseif (!$direction && $service) {
            $users=$fonc->Where('matricule','like',"$m%")->Where('name','like',"%$n%" )->Where('service_id','=',"$service" )->get();
        }
        else {
            $users=$fonc->Where('matricule','like',"$m%")->Where('name','like',"%$n%" )->get();
        }
        return view('users.searchf', ['users' => $users, 'directions'=>$directions,'services'=>$services]);
    }


    public function index1()
    {
        $directions = Department::all();
        $services = Service::all();
        $users = User::where('category','=','Salarié')->paginate(6);
        return view('users.indexfon', ['users' => $users,'directions'=>$directions,'services'=>$services]);
    }
    public function index2()
    {
        $users = User::where('category','=',null)->paginate(6);
        return view('users.indexall', ['users' => $users]);
    }


    public function create()
    {
        return view('users.create');
    }


    public function store(UserRequest $request, User $model)
    {
        $model->create($request->merge(['password' => Hash::make($request->get('password'))])->all());

        return redirect()->route('user.index')->withStatus(__('User successfully created.'));
    }


    public function edit(User $user)
    {
        $roles = Role::all();
        $services = Service::all();
        $comissions = Comission::all();
        $departments = Department::all();
        $groupes = G_Parlementaire::all();

      // dd( $roles);
        // $user = User::find(id);

        return view('users.edit', compact('user','departments','roles','services','comissions','groupes'));
    }


    public function update(UserRequest $request, User  $user)
    {
        $comission= null;
        $service= null;
        $president = null;
        $fonction = null;
        $department = null;
        $groupe = null;

        if ( $request->categorie == 'Député'  )
        {
          $groupe = $request->input('groupe');
          $comission = $request->input('comission');
          $service = null;
          $president = $request->input('president');
          $fonction = null;
            $department = null;

        }
        elseif ( $request->categorie == 'Salarié'){
            $service = $request->input('service');
            $comission = null;
            $president = null;
            $fonction = $request->input('fonction');
            $department =  $request->input('department');
            $groupe = null;

        }


        $hasPassword = $request->get('password');
             if ($request->file == null )
             {

                 $user->update(
                     $request->merge(['password' => Hash::make($request->get('password'))])
                         ->except([$hasPassword ? '' : 'password'],
                             $user->matricule = $request->input('matricule'),
                             $user->phone = $request->input('phone'),
                             $user->email = $request->input('email'),
                             $user->fonction = $fonction,
                             $user->Wilaya = $request->input('Wilaya'),
                             $user->nom_a = $request->input('nom_a'),
                             $user->category = $request->input('categorie'),
                               $user->comission_id = $comission,
                             $user->groupe_id = $groupe,
                             $user->department_id = $department,
                               $user->service_id = $service,
                               $user->president = $president,

                             $user->syncRoles($request->role)
                         ));
             }

             else
                 {
                     if ($user->getFirstMedia() != null) {
                     $user->getFirstMedia()->delete();
                     }

                     $hasPassword = $request->get('password');
                     // ini_set('memory_limit','256M');
                     $user->update(
                         $request->merge(['password' => Hash::make($request->get('password'))])
                             ->except([$hasPassword ? '' : 'password'],
                                 $user->matricule = $request->input('matricule'),
                                 $user->phone = $request->input('phone'),
                                 $user->email = $request->input('email'),
                                 $user->fonction = $fonction,
                                 $user->Wilaya = $request->input('Wilaya'),
                                 $user->nom_a = $request->input('nom_a'),
                                 $user->category = $request->input('categorie'),
                                 $user->groupe_id = $groupe,
                                 $user->department_id = $department,
                                 $user->comission_id = $comission,
                                 $user->service_id = $service,
                                 $user->president = $president,
                                 $user->syncRoles($request->role),
                                 $user->addMedia($request->file)->toMediaCollection(),
                             // $user->getFirstMedia()->delete(),
                             // $user->addMedia($request->file)->toMediaCollection()
                             ));
             }






        //$user->save();
     //   $service->service_d = $request->input('service_d');

        return redirect()->route('user.index')->withStatus(__('User successfully updated.'));
    }

    public function show($id)
    {
        $user= User::find($id);
        return view('users.detail', ['user'=>$user]);
    }
}
