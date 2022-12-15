<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;
use App\Models\Users;
use Hash;
use Session;

class Controller extends BaseController
{
    public function registration()
    {
        return view('register_page');
    }

    public function login()
    {
        return view('login_page');
    }

    public function register_user(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:5',
        ]);

        $user = new Users();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $registered = $user->save();
        if($registered)
            return back()->with('success' , 'Successfully registered!');
        else
            return back()->with('error' , 'Something went wrong!');
    }

    public function login_user(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);
        $user_data = Users::where('email', '=', $request->email)->first();
        if($user_data)
            {
                if(Hash::check($request->password, $user_data->password))
                {
                    $request->session()->put('login_id' , $user_data->id);
                    return redirect('profile');
                }
                else
                {
                    return back()->with('error' , 'Wrong Password');
                }
            }
        else
            return back()->with('error' , 'Email does not exist');
    }

    public function profile()
    {
        $data = array();
        if(Session::has('login_id'))
        {
            $data = Users::where('id' , '=' , Session::get('login_id'))->first();
        }
        return view('profile_page' , compact('data'));
    }

    public function logout()
    {
        if(Session::has('login_id'))
            Session::pull('login_id');
        return redirect('login')->with('success' , 'Logged Out');
    }
}
