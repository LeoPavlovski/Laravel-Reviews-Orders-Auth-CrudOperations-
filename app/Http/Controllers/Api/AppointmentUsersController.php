<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;
use App\Http\Resources\AppointmentResource;
use App\Models\Appointment;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AppointmentUsersController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $appointments = Appointment::all();
        return AppointmentResource::collection($appointments);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //TODO because we need the userId, doctorId etc we can retrieve information with where
        $validator = Validator::make($request->all(),[

        ]);

        //Retrieve the information here.
        $start_date = $request->input('start_date');
        $end_date = $request->input('end_date');
        $doctor_id = $request->input('doctor_id');
        $user_id = $request->input('user_id');

        if($end_date<$start_date){
            return response()->json([
               'message'=>'End Date cant be before the starting date.'
            ]);
        }

        $overlappingAppointments = Appointment::where('user_id',$user_id)
        ->where('doctor_id', $doctor_id)->where(function ($query) use ($start_date , $end_date){
            $query->where('start_date', '<=', $end_date)
                ->where('end_date', '>=', $start_date);
          })->get();

        if($overlappingAppointments->isNotEmpty()){
            $conflictEndDate = $overlappingAppointments->first()->end_date;
            $conflictStartDate = $overlappingAppointments->first()->start_date;
            return response()->json([
                'message'=>'The date is already taken',
                'message2'=>"FLEECE REZERVIRAL TERMIN BABA",
                'startDate'=>$conflictStartDate,
                'endDate'=>$conflictEndDate
            ]);
        }
        if($validator->passes()){
            Appointment::create([
                'start_date'=>$request->start_date,
                'end_date'=>$request->end_date,
                'doctor_id'=>$request->doctor_id,
                'user_id'=>$request->user_id
            ]);
            return response()->json([
                'appointment Created'
            ]);
        }
    }
    /**
     * Display the specified resource.
     */
    public function show(Appointment $appointment)
    {
        return new AppointmentResource($appointment);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UserRequest $request, Appointment $appointment)
    {
        return new AppointmentResource($appointment);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(UserRequest $request,  Appointment $appointment)
    {
        $appointment->delete();
        return response()->json([
           //Appointment deleted
            'message'=>'appointment deleted'
        ]);
    }
}
