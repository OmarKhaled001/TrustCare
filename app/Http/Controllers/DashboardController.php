<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Models\Doctor;
use App\Models\Service;
use App\Models\Section;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    //get all doctor
    
    public function index(){
        $CountDoctors= Doctor::count();
        $Doctors= Doctor::all();
        $LastDoctors= Doctor::latest()->first()->id;
        $GrowsDoctors= Doctor::whereDate('created_at', date('y-m-d'))->count();
        $Service= Service::count();
        $Section= Section::count();

        return view("Dashboard.Admin.index",array(
            "count_doctors"=>$CountDoctors,
            "doctors"=>$Doctors,
            "GrowsDoctors"=>$GrowsDoctors,
            "LastDoctors"=>$LastDoctors,
            "service"=>$Service,
            "section"=>$Section,

        ));
    }
}
