<?php

namespace App\Http\Middleware;

use App\Models\Post;
use Closure;
use Illuminate\Http\Request;

class PostRoleCheckMiddelware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        $id= request('id');
        $author_id= Post::find($id)->user_id;
        if(auth()->user()->isAdmin=="1" || auth()->user()->isPremimum=="1" || auth()->user()->id==$author_id){
            return $next($request);
        }else{
            return redirect()->route("home")->with("error","You are just a normal user!");
        }
    }
}
