<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\AppointmentRequest;
use App\Http\Resources\AppointmentResource;
use App\Models\Appointment;
use Illuminate\Http\Request;

class AppointmentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    //Testing crud operations
    public function index()
    {
        $appointments = Appointment::all();
        return AppointmentResource::collection($appointments);
    }

    /**
     * Store a newly created resource in storage.
     */
    //start_date'=>'2023-10-10 08:25:30',
    //                'end_date'=>'2023-10-10 09:50:00',
    ////              Is this the user who is going to be here
    //                'user_id'=>2,
    //                'doctor_id'=>1
    public function store(AppointmentRequest $request)
    {
        //Store it to the database
        $appointments = Appointment::create([
            'end_date'=>$request->end_date,
            'start_date'=>$request->start_date,
            'user_id'=>$request->user_id,
            'doctor_id'=>$request->doctor_id
        ]);
        return new AppointmentResource($appointments);
    }

    /**
     * Display the specified resource.
     */
    public function show(AppointmentRequest $request, Appointment $appointment)
    {
        return new AppointmentResource($appointment);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(AppointmentRequest $request, Appointment $appointment)
    {
        $appointment->update([
            'end_date'=>$request->end_date,
            'start_date'=>$request->start_date,
            'user_id'=>$request->user_id,
            'doctor_id'=>$request->doctor_id
        ]);
        return new AppointmentResource($appointment);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(AppointmentRequest $appointmentRequest , Appointment $appointment)
    {
        $appointment->delete();
        return response()->json([
           'Appointment has been Deleted'
        ]);
    }
}
