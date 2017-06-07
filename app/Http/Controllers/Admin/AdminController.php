<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use CountryState;
use DB;

class AdminController extends Controller
{
    public function dashboard()
    {
    	return view('admin.layout.default');
    }

    public function getCountryState()
    {
    	$countries = CountryState::getCountries(); //dd($countries);
    	foreach ($countries as $key => $value) {
    		$states[$key] = CountryState::getStates($key); //dd($states);
    	}

    	$response['countryState'] = $states;
    	return $response;
    }

    public function index()
    {
        $countries = DB::table("countries")->pluck("name","id");
        return view('admin.countryCityState.showCCS',compact('countries'));
    }
    public function getStateList(Request $request)
    {
        $states = DB::table("states")
                    ->where("country_id",$request->country_id)
                    ->pluck("name","id");
        return response()->json($states);
    }
    public function getCityList(Request $request)
    {
        $cities = DB::table("cities")
                    ->where("state_id",$request->state_id)
                    ->pluck("name","id");
        return response()->json($cities);
    }

}
