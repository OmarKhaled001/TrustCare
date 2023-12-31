<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\DoctorResource;
use App\Helpers\ApiResponse;
use Illuminate\Http\Request;
use App\Models\Doctor;


class DoctorController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        $doctors = Doctor::all();
        if( $doctors){
            return ApiResponse::sendResponse(200,'Doctor`s Names', DoctorResource::collection( $doctors)); 
        }
        return ApiResponse::sendResponse(204,'Not Found'); 
    }
}
