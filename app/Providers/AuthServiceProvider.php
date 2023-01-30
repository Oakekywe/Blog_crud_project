<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;

use App\Models\Post;
use App\Models\User;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

            Gate::define("admin",function(User $user){
                // $user= auth()->user();
                return $user->isAdmin=="1";
            });
            Gate::define("premimum_admin_postowner",function(User $user,$id){
                //postowner //need to know Post->user_id->currentuserid= user_id
                //admin
                //premimum_user
                $post_data= Post::find($id);
                $postOwnerid= $post_data->user_id;
                return $user->isPremimum=="1" || $user->isAdmin=="1" || $user->id==$postOwnerid;

            });
        
    }
}
