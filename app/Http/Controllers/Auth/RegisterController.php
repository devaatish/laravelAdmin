<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
use App\Http\Requests;
use Session;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            // 'password' => 'required|string|min:6|confirmed',
            'password' => 'required|string|min:6',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
        ]);
    }

    public function show()
    {
        return view('admin.signInlayout.signup');
    }

    public function signUp(Request $request)
    {
        if($request)
        {
            $data = [
                'name' => $request->name,
                'email' => $request->email,
                'password' => $request->password
            ];

            $validate = $this->validator($data);

            if($validate->fails())
            {
                $error=array_flatten($validate->messages()->toArray()); 
                Session::flash('message', $error); 
                Session::flash('alert-class', 'alert-danger');  
                return redirect("AdminPanel/Signup");
            }
            else
            {
                $this->create($data);
                Session::flash('message', ['Registered Succsessfully. Please Login']); 
                Session::flash('alert-class', 'alert-success'); 
                return redirect("AdminPanel");
            }

        }
    }
}
