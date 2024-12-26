<?php

namespace App\Http\Controllers;

use App\Models\Room;
use App\Models\Patient;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Inertia\Inertia;

class PatientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $patients = Patient::orderBy('name')->with('room')->paginate(10);

        return inertia('patients/Index', compact('patients'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $rooms = Room::orderBy('room_number')->get();
        return inertia('patients/Create', [
            'rooms' => $rooms
        ]);
        return inertia('patients/Create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'gender' => 'required',
            'date_of_birth' => 'required',
            'date_in' => 'required',
            'date_out' => 'required',
            'address' => 'required',
            'phone' => 'required',
            'reasons' => 'required',
            'room_id' => 'required'
        ]);

        Patient::create([
            'name' => $request->name,
            'gender' => $request->gender,
            'date_of_birth' => $request->date_of_birth,
            'date_in' => $request->date_in,
            'date_out' => $request->date_out,
            'address' => $request->address,
            'phone' => $request->phone,
            'reasons' => $request->reasons,
            'room_id' => $request->room_id
        ]);

        return redirect('/patients')->with('success', 'A new patient has been added.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $patient = Patient::with('room')->findOrFail($id);
        $rooms = Room::all();

        return Inertia::render('patients/Edit', [
            'patient' => $patient,
            'rooms' => $rooms,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Patient $patient)
    {
        $request->validate([
            'name' => 'required',
            'gender' => 'required',
            'date_of_birth' => 'required',
            'date_in' => 'required',
            'date_out' => 'required',
            'address' => 'required',
            'reasons' => 'required',
            'room_id' => 'required'
        ]);

        $patient->update([
            'name' => $request->input('name'),
            'gender' => $request->input('gender'),
            'date_of_birth' => $request->input('date_of_birth'),
            'date_in' => $request->input('date_in'),
            'date_out' => $request->input('date_out'),
            'address' => $request->input('address'),
            'phone' => $request->input('phone'),
            'reasons' => $request->input('reasons'),
            'room_id' => $request->input('room_id')

        ]);


        return redirect('/patients')->with('success', 'The patient updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function delete($id)
    {
        $patient = Patient::with('room')->findOrFail($id);
        $rooms = Room::all();

        return Inertia::render('patients/Delete', [
            'patient' => $patient,
            'rooms' => $rooms,
        ]);
    }

    public function destroy($id)
    {
        $patient = Patient::findOrFail($id);
        $patient->delete();

        return redirect('/patients')->with('success', 'Patient deleted from list successfully');
    }

    public function view($id)
    {
        $patient = Patient::with('room')->findOrFail($id);
        $rooms = Room::all();

        return Inertia::render('patients/View', [
            'patient' => $patient,
            'rooms' => $rooms,
        ]);
    }
}
