<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\City;
use App\Models\District;
use App\Models\Province;
use App\Models\VehicleModel;
use Illuminate\Http\Request;

class AjaxController extends Controller
{

    public function getMakeByModel(Request $request): \Illuminate\Http\JsonResponse
    {
        $responseData = VehicleModel::select('id','name')->where('make_id', '=', $request->makeID)->orderBy('name', 'ASC')->get();
         return response()->json($responseData);
    }




}
