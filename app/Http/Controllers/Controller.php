<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;
use App\Models\Users;
use App\Models\Product;
use Hash;
use Session;

class Controller extends BaseController
{
    public function registration()
    {
        $data['title'] = 'Registration Page';
        $data['view_page'] = 'register_page';
        return view('frame' , $data);
    }

    public function login()
    {
        $data['title'] = 'Login Page';
        $data['view_page'] = 'login_page';
        return view('frame' , $data);
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
        $data['user'] = Users::where('id' , '=' , Session::get('login_id'))->first();
        return view('profile_page' , $data);
    }

    public function logout()
    {
        if(Session::has('login_id'))
            Session::pull('login_id');
        return redirect('login')->with('success' , 'Logged Out! We are gonna miss you!');
    }

    public function add_product_page()
    {
        $data['user'] = Users::where('id' , '=' , Session::get('login_id'))->first();
        return view('add_product' , $data);
    }

    public function add_product(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'slug' => 'required',
            'price' => 'required',
            'category' => 'required',
            'brand' => 'required'
        ]);
        $product = new Product();
        $product->name = $request->name;
        $product->slug = $request->slug;
        $product->price = $request->price;
        $product->category = $request->category;
        $product->brand = $request->brand;
        $product->picture = 'kichuna';
        $update = $product->save();

        if($update)
            return back()->with('success' , 'Product Uploaded');
        else
            return back()->with('error' , 'Upload Failed');
    }
}
