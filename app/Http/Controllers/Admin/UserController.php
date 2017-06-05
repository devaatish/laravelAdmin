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
use Datatables;
use DB;
use Validator;
use Session;
use App\User;

class UserController extends Controller
{

	public function datatable()
    {
        return view('admin.users.showUsers');
    }

    public function getUsers()
    {
    	$users = DB::table('users')->select('*');
        return Datatables::of($users)
            ->make(true);
    }
    
}

/* 
Datatable implementation follow link - http://itsolutionstuff.com/post/laravel-5-implementing-datatables-tutorial-using-yajra-packageexample.html
Note: for datatable class not found error Delete all files under bootstrap/cache folder .
If error still exist then Delete vendor folder and reinstall all packages using composer install.
*/
