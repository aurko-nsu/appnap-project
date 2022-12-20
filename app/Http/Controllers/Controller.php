<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;
use App\Models\Users;
use App\Models\Product;
use App\Models\Product_picture;
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
            return redirect('login')->with('success' , 'Successfully registered! Now Login.');
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
                    return redirect('product');
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
        return view('profile.profile_page' , $data);
    }

    public function logout()
    {
        if(Session::has('login_id'))
            Session::pull('login_id');
        return redirect('login')->with('success' , 'Logged Out! We are gonna miss you!');
    }

    public function add_product_page()
    {
        $data['product_activity'] = '';
        $data['add_product_activity'] = 'active';
        $data['user'] = Users::where('id' , '=' , Session::get('login_id'))->first();
        return view('profile.add_product' , $data);
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
        $temp = $request->file('images');
        $product = new Product();
        $product->name = $request->name;
        $product->user_id = Session::get('login_id');
        $product->slug = $request->slug;
        $product->price = $request->price;
        $product->category = $request->category;
        $product->brand = $request->brand;
        $product->picture = $temp[0]->getClientOriginalName();
        $update = $product->save();

        if($request->file('images'))
            {
                $image_path = public_path('product_images'.'/'.Session::get('login_id').'/'.$product->id);
                foreach(($request->file('images')) as $file)
                {
                    $fileName = $file->getClientOriginalName();
                    $file->move($image_path , $fileName);
                    Product_picture::create([
                        'user_id' => Session::get('login_id'),
                        'product_id' => $product->id,
                        'picture' => $fileName,
                    ]);
                } 
            }
        if($update)
            return back()->with('success' , 'Product Uploaded');
        else
            return back()->with('error' , 'Upload Failed');
    }

    public function product()
    {
        $data['product_activity'] = 'active';
        $data['add_product_activity'] = '';
        $data['user'] = Users::where('id' , '=' , Session::get('login_id'))->first();
        $data['product'] = Product::where('user_id' , '=' , Session::get('login_id'))->get();
        return view('profile.product' , $data);
    }
}
