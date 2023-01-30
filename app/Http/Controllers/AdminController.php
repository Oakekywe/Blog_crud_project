<?php

namespace App\Http\Controllers;

use App\Models\ContentMessage;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    function index(){
        return view("admin.Index");
    }
    function contact_message(){
        $messages= ContentMessage::latest()->get();
        return view("admin.contact-message",["messages"=> $messages]);
    }
    function manage_premimum_user(){
        $users= User::all();
        return view("admin.manage-premimum-user",["users"=>$users]);
    }
    function deleteUser($id){
        $delete_user_data= User::find($id);
        $delete_user_data->delete();
        return back()->with("message","A User Deleted");
    }
    function editUser($id){
        $user= User::find($id);
        return view("admin.edit-premimum-user",["user"=>$user]);
    }
    function updateUser($id){
        $update_user_data= User::find($id);

        $validation= request()->validate([
            "username"=>"required",
            "email"=>"required",
            "isAdmin"=>"required",
            "isPremimum"=>"required",
        ]);
        if($validation){
            $username= request("username");
            $email= request("email");
            $isAdmin= request("isAdmin");
            $isPremimum= request("isPremimum");

            $update_user_data->username= $username;
            $update_user_data->email= $email;
            $update_user_data->isAdmin= $isAdmin;
            $update_user_data->isPremimum= $isPremimum;
            $update_user_data->update();
            return back()->with("message","User Data Updated");
        }else{
            return back()->withErrors($validation);
        }

    }
}
