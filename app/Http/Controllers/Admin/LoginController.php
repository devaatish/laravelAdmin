<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Auth\Access\Response;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Mail;
use Mockery\CountValidator\Exception;
use Illuminate\Support\Facades\Hash;
use Validator;
use Session;
use App\User;

class LoginController extends Controller
{
    public function index()
    {
    	return view('admin.signInlayout.signIn');
    }

    public function validateCapcha(Request $request)
    {
        $ans = $this->validate($request, [
          'CaptchaCode'=> 'valid_captcha'
        ]);

        return $ans;
    }

    public function login(Request $request)
    {
    	$rules = [
            'username' => 'required',
            'password' => 'required'
            //'CaptchaCode'=> 'required|valid_captcha'
        ];

        $input =Input::only(
            'username',
            'password'
            //'CaptchaCode'
        );

        $validates = captcha_validate($request->CaptchaCode); 

        if($validates == false)
        {
            Session::flash('alert-danger', ['CaptchaCode not matched.']); 
            return redirect("AdminPanel");  
        }
        else
        {
            $validator = Validator::make($input,$rules); 
            
            if($validator->fails())
            {
                $error=array_flatten($validator->messages()->toArray()); dd($error);
                Session::flash('alert-danger',$error); 
                return redirect("AdminPanel");
            }
            
            if(Auth::attempt(['name'=>$request->username,'password'=>$request->password],$request->remember ? true : false))
            { 
                return redirect('AdminPanel/Dashboard');
            }
            else
            { 
                Session::flash('alert-danger', ['Invalid Credentials.']); 
                return redirect("AdminPanel");
            } 
        }
      
           
    }

    public function logout()
    {
    	if(Auth::check())
    	{
    		Auth::logout();
    		Session::flush();
    	}
    	return redirect('AdminPanel');	
    }

    public function forgotPassword(Request $request)
    {
        $rules = [
            'email' => 'required|email'
        ];

        $input =Input::only(
            'email'
        );

        $validator = Validator::make($input,$rules);
        if($validator->fails()){
            $error=array_flatten($validator->messages()->toArray());
            $response['msg'] = $error;
        }else{
            try{
                $email = $request->email;
                
                $user = User::where('email',$email)->first();
                $url = url('/');
                if($user){
                    $remember_token = str_random(30);
                    $user->remember_token = $remember_token;
                    $user->save();

                    $data = [
                        'email'=> $email,
                        'remember_token' => $remember_token,
                        'url' => $url
                    ];

                    /*
                    $to = "sunitineo@gmail.com,suniti.yadav@wwindia.com";
                    $subject = "HTML email";

                    $message = "
                    <html>
                    <head>
                    <title>HTML email</title>
                    </head>
                    <body>
                    <p>This email contains HTML Tags!</p>
                    <table>
                    <tr>
                    <th>Firstname</th>
                    <th>Lastname</th>
                    </tr>
                    <tr>
                    <td>John</td>
                    <td>Doe</td>
                    </tr>
                    </table>
                    </body>
                    </html>
                    ";

                    // Always set content-type when sending HTML email
                    $headers = "MIME-Version: 1.0" . "\r\n";
                    $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
                    $headers .= 'From: <sunitiyadav1@gmail.com>' . "\r\n";

                    $aa = mail($to,$subject,$message,$headers);
                    dd($aa);
                    */


                    Mail::send('emails.forgotmail', $data, function ($message) use ($data) {
                       // $message->from('support@neosoft.com');
                        $message->from('sunitiyadav1@gmail.com');
						$message->to( $data['email'] )->subject('Forgot Password Link');
                    });



                    //  $ans = Mail::send('emails.forgotmail', ['name' => 'abc'], function ($message) use($data)
                    // {
                    //     $message->to('suniti.yadav@wwindia.com', 'suniti')->subject('Welcome to Expertphp.in!');
                    
                    // });

                    // dd($ans);


                    $response['msg'] = "Password Reset link has been sent to your mail id.";
                }else{
                    $response['msg'] = "No User exists with the provided mail id.";
                }
            }catch(\ErrorException $e){
                $response['msg'] = "Whooops! something went wrong";
            }catch(\RuntimeException $e){
                $response['msg'] = "Whooops! something went wrong";
            }
        }
        
        dd($response);
	    return view('admin.signInlayout.message',$response);
    }

    public function resetPassword(Request $request)
    {
    	//return  view('admin.signInlayout.resetPassword');
        $user = User::where('remember_token',$request->remember_token)->first();
       
        if($user) {
            $response['remember_token'] = $request->remember_token;
			return  view('admin.signInlayout.resetPassword',$response);
            
        }else{

            $response['msg'] = "Please Try Again.";
	     	return view('admin.signInlayout.message',$response);
        }
        

    }

    public function updatepassword(Request $request)
    {
        $rules = [
            'password' => 'required|confirmed',
            'remember_token' => 'required'

        ];

        $input =Input::only(
            'password',
            'password_confirmation',
            'remember_token'
        );

        $validator = Validator::make($input,$rules);

        if($validator->fails()){
            $error=array_flatten($validator->messages()->toArray());
            $response['status'] = 0;
            $response['data']    = (object) [];
            $response['message'] = $error;
            return $response;
        }

        $password = Hash::make(Input::get('password'));
        $user = User::where('remember_token',$request->remember_token)->first();

        if($user) {
            $user->password = $password;
            $user->save();
            $response['message'] = "Password is updated successfully.";
            
        }else{
            $response['message'] = "Invalid request.";
        }

	    $response['msg'] = $response['message'];
	    return view('admin.signInlayout.message',$response);

    }

}
