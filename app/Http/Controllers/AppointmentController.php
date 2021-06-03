<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use Illuminate\Http\Request;

class AppointmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('appointments.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        /* If user is admin asign to specific ID else assign to authUser */
        $assignee =
            ($request->assignee && auth()->user()->isAdmin ) ?
                $request->assignee :
                $assignee = auth()->user()->id;

        $appointment = new Appointment([
            'start' => $request->start,
            'end' => $request->end,
            'title' => $request->title,
            'description' => $request->description,
            'user_id' => $assignee
        ]);

        $appointment->save();

        return $appointment;
    }

    public function filter(Request $request)
    {
        if (auth()->user()->isAdmin) {
            return Appointment::whereBetween('start', [$request->start, $request->end])
                ->with('user:id,name,lastname')
                ->get();
        } else {
            return Appointment::whereBetween('start', [$request->start, $request->end])
                ->where('user_id', auth()->user()->id)
                ->get();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Appointment  $appointment
     * @return \Illuminate\Http\Response
     */
    public function show(Appointment $appointment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Appointment  $appointment
     * @return \Illuminate\Http\Response
     */
    public function edit(Appointment $appointment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Appointment  $appointment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Appointment $appointment)
    {
        $user = auth()->user();
        if ($appointment->user_id === $user->id || $user->isAdmin) {
            $appointment->update($request->all());
        } else {
            abort(403);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Appointment  $appointment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Appointment $appointment)
    {
        $user = auth()->user();
        if ($appointment->user_id === $user->id || $user->isAdmin) {
            $appointment->delete();
        } else {
            abort(403);
        }
    }
}
