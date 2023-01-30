<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class PageController extends Controller
{
    function index() 
    {   
        // $posts= Post::all(); // id 1 to infinity(means select all)
        // $posts= Post::latest()->get(); // id infinity to 1(means select all by desc)
        $posts= Post::latest()->paginate(9); //pagination
        return view('Index',["posts"=>$posts]);
    }

    function createPost() 
    {
        return view('user.CreatePost');
    }
    
    function showPostById($id) 
    {
        $post=Post::find($id);
        return view("user.showPost",["post"=>$post]);
    }       
    
    function editPost($id) 
    {   
        $post= Post::find($id);
        return view('user.EditPost',["post"=>$post]);
    }

    function userProfile() 
    {
        return view('user.UserProfile');
    }   

    function contactUs() 
    {
        return view('user.ContactUs');
    }

}
