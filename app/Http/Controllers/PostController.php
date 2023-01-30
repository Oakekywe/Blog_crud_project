<?php

namespace App\Http\Controllers;

use App\Models\ContentMessage;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    function deletePost($id) 
    {
        $delete_post= Post::find($id);
        $delete_post->delete();
        return redirect()->route("home")->with("message","Post deleted!");
    }

    function updatePost($id) 
    {   
        $title= request("title");
        $image= request("image"); //file
        $content= request("content");
        $update_post= Post::find($id);
        $update_post->title= $title;
        //image
        if($image){

            $imageName= uniqid()."_".$image->getClientOriginalName();
            $image->move(public_path("images/posts/"),$imageName);
            $update_post->image= $imageName;
        }
        $update_post->content= $content;
        $update_post->update();
        return redirect()->route("home")->with("message","Post Updated!");
        // dd($image);
    }

    function create_post() 
    {       
        $validation= request()->validate([
            "title"=>"required",
            "image"=>"required",
            "content"=>"required",
            
        ]);
        if($validation){
            $title= request("title");
            $image= request("image"); //file
            $content= request("content");
            //save data
            $post= new Post();
            $post->user_id= auth()->user()->id;
            $post->title= $title;
            //image section
            $image_name= uniqid()."_".$image->getClientOriginalName();
            $image->move(public_path("images/posts/"),$image_name);
            $post->image= $image_name;
            $post->content= $content;
            $post->save();

            return redirect()->route("home")->with("message","Post Added!");
            
        }else{
            return back()->withErrors($validation);
        }
    }

    
}

