<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use CountryState;

class AdminController extends Controller
{
    public function dashboard()
    {
    	//$ans = $this->getCountryState(); dd($ans);
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
}
