<?php

namespace App\Http\Controllers;

use App\Models\Comission;
use App\Models\Service;
use App\Models\User;
use App\Http\Requests\UserRequest;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;


class UserController extends Controller
{
    /**
     * Display a listing of the users
     *
     * @param  \App\Models\User  $model
     * @return \Illuminate\View\View
     */
    public function index(User $model)
    {
        return view('users.index', ['users' => $model->Paginate(3)]);
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

      // dd( $roles);
        // $user = User::find(id);

        return view('users.edit', compact('user','roles','services','comissions'));
    }


    public function update(UserRequest $request, User  $user)
    {

        if ($user->getFirstMedia() != null) {
            $user->getFirstMedia()->delete();

            $hasPassword = $request->get('password');
            // ini_set('memory_limit','256M');
            $user->update(
                $request->merge(['password' => Hash::make($request->get('password'))])
                    ->except([$hasPassword ? '' : 'password'],
                        $user->matricule = $request->input('matricule'),
                        $user->phone = $request->input('phone'),
                        $user->fonction = $request->input('fonction'),
                        $user->Wilaya = $request->input('Wilaya'),
                        $user->nom_a = $request->input('nom_a'),
                        $user->service_id = $request->input('service'),
                        $user->comission_id = $request->input('comission'),
                        $user->category = $request->input('categorie'),
                        $user->syncRoles($request->role),
                        $user->addMedia($request->file)->toMediaCollection(),
                    // $user->getFirstMedia()->delete(),
                    // $user->addMedia($request->file)->toMediaCollection()
                    ));
        }
         else {
             $hasPassword = $request->get('password');
             // ini_set('memory_limit','256M');
             $user->update(
                 $request->merge(['password' => Hash::make($request->get('password'))])
                     ->except([$hasPassword ? '' : 'password'],
                         $user->matricule = $request->input('matricule'),
                         $user->phone = $request->input('phone'),
                         $user->fonction = $request->input('fonction'),
                         $user->Wilaya = $request->input('Wilaya'),
                         $user->nom_a = $request->input('nom_a'),
                         $user->service_id = $request->input('service'),
                         $user->comission_id = $request->input('comission'),
                         $user->category = $request->input('categorie'),
                         $user->syncRoles($request->role), ));
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
