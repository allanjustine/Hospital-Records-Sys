<?php

namespace App\Http\Controllers;

use App\Models\Room;
use App\Models\Patient;
use Illuminate\Http\Request;
use Inertia\Inertia;

class RoomController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $rooms = Room::orderBy('room_number')->with('patients')->paginate(10);

        return inertia('rooms/Index', compact('rooms'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return inertia('rooms/Create');
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
            'room_number' => 'required|unique:rooms',
            'doctor' => 'required',
            'capacity' => 'required',
        ]);

        Room::create([
            'room_number' => $request->room_number,
            'doctor' => $request->doctor,
            'capacity' => $request->capacity,
        ]);

        return redirect('/rooms')->with('success', 'A new room has been added.');
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
        $room = Room::findOrFail($id);

        return Inertia::render('rooms/Edit', [
            'room' => $room,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Room $room)
    {
        $room->update([
            'room_number' => $request->input('room_number'),
            'doctor' => $request->input('doctor'),
            'capacity' => $request->input('capacity'),

        ]);


        return redirect('/rooms')->with('success', 'The room updated successfully.');
    }

    public function delete($id)
    {
        $room = Room::findOrFail($id);

        return Inertia::render('rooms/Delete', [
            'room' => $room,
        ]);
    }

    public function destroy($id)
    {
        $room = Room::findOrFail($id);

        $patientUse = Patient::where('room_id', $id)->exists();
        if ($patientUse) {
            return back()->with('error', 'Cannot delete the car as it is in use by patients.');
        }

        $room->delete();

        return redirect('/rooms')->with('success', 'Car deleted from list successfully');
    }
}
