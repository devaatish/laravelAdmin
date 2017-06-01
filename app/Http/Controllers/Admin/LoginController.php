<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Auth\Access\Response;
use Illuminate\Support\Facades\Input;
use Validator;
use Mockery\CountValidator\Exception;

class LoginController extends Controller
{
    public function index()
    {
    	return view('admin.signInlayout.signIn');
    }

    public function login(Request $request)
    {
    	$ans = $this->validate($request, [
		  'CaptchaCode'=> 'valid_captcha'
		]);
		dd($ans);

    	$rules = [
            'username' => 'required',
            'password' => 'required',
            'CaptchaCode' => 'required|valid_captcha'
        ];

        $input =Input::only(
            'username',
            'password',
            'CaptchaCode'
        );

        dd($request->all());
        $validator = Validator::make($input,$rules); dd($validator->fails());

        if($validator->fails())
        {
        	//dd($validator->messages());
            $error=array_flatten($validator->messages()->toArray());
            //dd($error);
            return redirect("AdminPanel");
        }

    	dd($request->all());
    }
}
