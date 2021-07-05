<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;


class UserController extends Controller
{
    function login(Request $request){
        $user =  User::where(['email'=>$request->email])->get()->first();
    
        if(!$user || !Hash::check($request->password,$user->password)){
                 return "Username & password not matched";
        }else{
            $request->session()->put('user',$user);
            return redirect('/');
        }
    }

    function register(Request $req){
            $user = new User;
            $user->name=$req->name;
            $user->email=$req->email;
            $user->password=Hash::make($req->password);
            $user->save();
            return redirect('/login');
    }
}
