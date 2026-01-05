<?php

namespace App\Http\Controllers;

use App\Models\barangay;
use App\Models\location;
use App\Models\countries;
use Illuminate\Http\Request;

class UtilsController extends Controller
{
    public function getRegion ()
    {
        $regions = location::select('region')->distinct('region')->orderBy('region', 'asc')->get();

        return response()->json($regions);
    }

    public function getProvince (Request $request)
    {
         $location = location::where('region', $request->region)->select('province')->distinct('province')->orderBy('province', 'asc')->get();
        return response()->json($location, 201);
    }

    public function getCity (Request $request)
    {
         $location = location::where('province', $request->province)->select('city')->distinct('city')->orderBy('city', 'asc')->get();
        return response()->json($location, 201);
    }

    public function getBarangay (Request $request)
    {
        $barangay = barangay::where('city_id', $request->city)->select('name as barangay')->distinct('name')->orderBy('name', 'asc')->get();
        return response()->json($barangay, 201);
    }

    public function getDestinations()
    {
        $location = location::select('province')->distinct('province')->orderBy('province', 'asc')->get();
        return response()->json($location, 201);
    }
    
        public function getCountries()
    {
        $countries = countries::select('name')->distinct('name')->orderBy('name', 'asc')->get();
        return response()->json($countries, 201);
    }
}
