<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

class AuthController extends Controller
{
    function login(){
        return view("auth.Login");
    }
    function post_login(){
        //validation
        $validation= request()->validate([
            "email"=>"required",
            "password"=>"required",
        ]);
        if($validation){
            $auth=Auth::attempt(["email"=>request("email"),"password"=>request("password")]);
            if($auth){
                return redirect()->route("home");
            }else{
                return back()->with("error","Authentication Failed");
            }
        }else{
            return back()->withErrors($validation);
        }
    }

    function register(){
        return view("auth.Register");
    }
    function post_register(){
        $validation= request()->validate([
            "username"=>"required",
            "email"=>["required",Rule::unique('users','email')],
            "password"=>"required||min:7||confirmed",
            "image"=>"required",
        ]);
        if($validation){
            $image_file= request('image'); //move to public path
            $image_name= uniqid()."_". $image_file->getClientOriginalName(); //save to database
            $image_file->move(public_path("images/profiles"),$image_name);
            $password= $validation['password'];
            //save into database
            $user=new User();
            $user->username= $validation['username'];
            $user->email= request("email");
            $user->password= Hash::make($password);
            $user->image= $image_name;
            $user->save();
            if(Auth::attempt(["email"=>request("email"),"password"=>request("password")])){
                return redirect()->route("home");
            }
        }else{
            return back()->withErrors($validation);
        }
    }

    function post_userProfile() 
    {
        
        $username= request("username");
        $email= request("email");
        $image= request("image"); //file
        $old_password= request("old_password");
        $new_password= request("new_password");
        // dd($username,$email,$image,$old_password,$new_password);
        $id= auth()->user()->id;
        $current_user_data= User::find($id);
        $current_user_data->username= $username;
        $current_user_data->email= $email;

        if($image){
            // move to public folder
            $image_name= uniqid()."_".$image->getClientOriginalName();
            $image->move(public_path("images/profiles/"),$image_name);

            //overwirte photo name to database
            $current_user_data->image= $image_name;
            $current_user_data->update();
            return back()->with("success","New image successfully changed!");
        }

        if($old_password && $new_password){
            // check user input old password to current user password from table            
            if(Hash::check($old_password,$current_user_data->password)){

                $current_user_data->password= Hash::make($new_password);
                $current_user_data->update();
                return back()->with("success", "New Password Successfully Changed!");
            }else{
                return back()->with("error", "Incorrect Old Password!");
            }
        }
        $current_user_data->update();
        return back();
    }

    function logout(){
        Auth::logout();
        return redirect()->route("login");
    }
    
}
