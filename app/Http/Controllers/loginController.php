<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\login;
use App\Models\product;

class loginController extends Controller
{

    public function loginpage(Request $request){
        if($request->session()->exists('email')){
            $products = product::all();
            return view('admin.home.index', compact('products'));
            // return redirect()->route('admin.home.index',compact( 'products'));
        }
        return view('admin.login.index');
    }

    public function check(Request $request){

        $request->validate([
            'email' => 'required | email',
            'password' => 'required | min:6'
        ]);

        $email = $request->email;
        $password = $request->password;

        

        $user = login::where('email',$email)->where('password', $password)->get();

        if(count($user) != 0){
            $request->session()->put('email',$email);
            return redirect()->route('admin.home.index');
        }else{
            return redirect()->back()->with('error', 'Invalid email or password');
        }
    }

    public function home(Request $request){
        if(!$request->session()->exists('email')){
            return redirect()->route('admin.login.index');
        }
        $products = product::all();
        return view('admin.home.index', compact('products'));
        // return view('admin.home.index');
    }

    public function logout(Request $request){
        $request->session()->flush();
        return redirect()->route('admin.login.index');
      }
}
