<?php

namespace App\Http\Controllers;

use App\Models\ContentMessage;
use Illuminate\Http\Request;

class ContactUsController extends Controller
{
    function sendContactMessage(){
        $validation= request()->validate([
            "username"=>"required",
            "email"=>"required",
            "message"=>"required",
        ]);
        if($validation){
            $contentMessageData= new ContentMessage();
            $contentMessageData->username= request("username");
            $contentMessageData->email= request("email");
            $contentMessageData->message= request("message");
            $contentMessageData->save();
            return back()->with("message","Messages sended!");
        }else{
            return back()->withErrors($validation);
        }
    }

    function deleteContactMessage($id){
        $delete_contact_message= ContentMessage::find($id);
        $delete_contact_message->delete();        
        return back()->with("message","Message Deleted!");
    }
}
