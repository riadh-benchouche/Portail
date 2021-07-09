<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\Partage;
use App\Models\Service;
use App\Models\User;
use Illuminate\Http\Request;

class DepartmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $departments = Department::all();
        return view('department.index', ['departments' => $departments]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('department.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $department = new Department();

        $department->name = $request->input('name');
        $department->matricule = $request->input('matricule');

        $department->save();

        session()->flash('success', 'Department Ajouter ');

        return redirect('department');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Department  $department
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $department =Department::find($id);

        $service = Service::where('department_id','=',$department->id)->paginate(6);
        $partage = Partage::where('department_id','=',$department->id)->paginate(6);
        $membre1 =User::where('department_id','=',$department->id )->first();
        $membre =User::where('department_id','=',$department->id )->get();

        //dd($membre);
        return view('department.detail',['department' => $department, 'membres' => $membre ,'membre1' => $membre1 , 'partages'=>$partage, 'services' => $service]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Department  $department
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $department =Department::find($id);
        return view('department.edit', ['department'=>$department ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Department  $department
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $department =Department::find($id);

        $department->name = $request->input('name');
        $department->matricule = $request->input('matricule');

        $department->save();

        session()->flash('success', 'Department Ajouter ');

        return redirect('department');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Department  $department
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $department =Department::find($id);
        $department->delete();
        return redirect('department');
    }
}
