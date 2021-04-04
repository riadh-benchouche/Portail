<?php

namespace App\Http\Controllers;

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
        return view('users.index', ['users' => $model->paginate(15)]);
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

      // dd( $roles);
        // $user = User::find(id);

        return view('users.edit', compact('user','roles'));
    }


    public function update(UserRequest $request, User  $user)
    {
        $hasPassword = $request->get('password');

        $user->update(
            $request->merge(['password' => Hash::make($request->get('password'))])
                ->except([$hasPassword ? '' : 'password'],
                    $user->phone = $request->input('phone'),
                    $user->fonction = $request->input('fonction'),
                    $user->Wilaya = $request->input('Wilaya'),
                    $user->syncRoles($request->role),
                ));



        //$user->save();
     //   $service->service_d = $request->input('service_d');

        return redirect()->route('user.index')->withStatus(__('User successfully updated.'));
    }

}
