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

        $users = User::select(['id', 'name', 'email','is_confirmed']);
        

        return Datatables::of($users)
            ->addColumn('action', function ($user) {
                $url = url('/')."/AdminPanel/EditUser/";
                $img = asset('theme/assets/img/ban1.png');
                $img1 = asset('theme/assets/img/user1.jpg');
                $list = "";
                $list .=  '<a href="'.$url.$user->id.'" class="btn btn-xs btn-primary"><i class="glyphicon glyphicon-edit"></i> Edit</a> 
                <a href="#" onclick="delUser('.$user->id.')" class="btn btn-xs btn-primary"><i class="glyphicon glyphicon-remove"></i> Delete</a>';
                if($user->is_confirmed == 1)
                {
                    $list .= '<span id="ban_'.$user->id.'"><a onclick="userBan('.$user->id.')"><img title="to ban user" src="'.$img.'" style="width:25px; height:25px;"></a></span>';
                }
                else
                {
                    $list .= '<span id="ban_'.$user->id.'"><a onclick="userUnBan('.$user->id.')"><img title="to unban user" src="'.$img1.'" style="width:25px; height:25px;"></a></span>';
                }

                return $list;
            })
            ->make(true);
    }

    public function delUser(Request $request)
    {
        $result = User::where('id',$request->id)->delete();
        if($result == 1)
        {
            $this->getUsers();
            $response['status'] = 1;
            $response['message'] = "User successfully deleted !!!";
        }
        else
        {
            $response['status'] = 0;
            $response['message'] = "User not deleted !!!";
        }

        return $response;
    }

    public function addUser()
    {
        return view('admin.users.addUser');
    }

    public function saveUser(Request $request)
    {
        
        if(Auth::check())
        {
            $data = [
                'name' => $request->name,
                'email' => $request->email,
                'password' => $request->password
            ];

            $validate = Validator::make($data, [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6',
            ]);

            if($validate->fails())
            {
                $error=array_flatten($validate->messages()->toArray()); 
                Session::flash('message', $error); 
                Session::flash('alert-class', 'alert-danger'); 
                return redirect("AdminPanel/AddUser");
            }
            else
            {
                 User::create([
                            'name' => $data['name'],
                            'email' => $data['email'],
                            'password' => bcrypt($data['password']),
                        ]);
                Session::flash('message', ['User Added Succsessfully.']); 
                Session::flash('alert-class', 'alert-success'); 
                return redirect("AdminPanel/AddUser");
            }

        }
        else
        {
            return redirect("AdminPanel");
        }
    }

    public function updateUser(Request $request)
    {
        
        if(Auth::check())
        {
            $data = [
                'id' => $request->id,
                'name' => $request->name,
                //'email' => $request->email,
                //'password' => $request->password
            ];

            $validate = Validator::make($data, [
                'id' => 'required',
                'name' => 'required|string|max:255',
                //'email' => 'required|string|email|max:255|unique:users',
                //'password' => 'required|string|min:6',
            ]);

            if($validate->fails())
            {
                $error=array_flatten($validate->messages()->toArray()); 
                Session::flash('message', $error); 
                Session::flash('alert-class', 'alert-danger'); 
                return redirect("AdminPanel/EditUser/".$request->id);
            }
            else
            {
                 User::where('id',$request->id)
                     ->update([
                            'name' => $data['name'],
                            //'email' => $data['email'],
                            //'password' => bcrypt($data['password']),
                        ]);
                Session::flash('message', ['User Info. edited Succsessfully.']); 
                Session::flash('alert-class', 'alert-success'); 
                return redirect("AdminPanel/EditUser/".$request->id);
            }

        }
        else
        {
            return redirect("AdminPanel");
        }
    }

    public function editUser($id)
    {
        $response['data'] = User::where('id',$id)->first();
        return view('admin.users.editUser',$response);
    }

    public function userBan(Request $request)
    {
        if(Auth::check())
        {
          $unactive = User::where('id', $request->user_id)           
                          ->update(['is_confirmed' => 0]);


          $response['status'] = 1;

          return $response;
        }
        else
        {
            return redirect("AdminPanel");
        }
    }

    public function userUnBan(Request $request)
    {
        if(Auth::check())
        {
          $active = User::where('id', $request->user_id)           
                          ->update(['is_confirmed' => 1]);


          $response['status'] = 1;

          return $response;
        }
        else
        {
            return redirect("AdminPanel");
        }
    }
    
}

/* 
Datatable implementation follow link - http://itsolutionstuff.com/post/laravel-5-implementing-datatables-tutorial-using-yajra-packageexample.html
For add edit actions - https://datatables.yajrabox.com/eloquent/add-edit-remove-column#edit-1230
Note: for datatable class not found error Delete all files under bootstrap/cache folder .
If error still exist then Delete vendor folder and reinstall all packages using composer install.
*/
