<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Doctor;
use App\Http\Resources\Doctor as DoctorResource;

class DoctorController extends Controller
{

    public function index()
    {
        //Get doctors
        $doctors = Doctor::orderBy('created_at','')->paginate(5);

        //Return collection of doctors as a resource
        return DoctorResource::collection($doctors);

    }

    public function store(Request $request)
    {
        $doctor = $request->isMethod('put') ? Doctor::findOrFail
        ($request->doctor_id) : new Doctor;

        $doctor->id = $request->input('doctor_id');
        $doctor->name = $request->input('name');
        $doctor->email = $request->input('email');
        $doctor->phone = $request->input('phone');
        $doctor->note = $request->input('note');

        if($doctor->save()){
            return new DoctorResource($doctor);
        }
    }

    public function show($id)
    {
        //Get doctor
        $doctor = Doctor::findOrFail($id);

        //Return single doctor as a resource
        return new DoctorResource($doctor);
    }
 
    public function destroy($id)
    {
        //Get doctor
        $doctor = Doctor::findOrFail($id);

        //Return single doctor as a resource
        if($doctor->delete()){
            return new DoctorResource($doctor);
        }
    }
}
