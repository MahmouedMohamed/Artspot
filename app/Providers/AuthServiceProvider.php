<?php

namespace App\Providers;

use App\Ability;
use App\Policies\PostPolicy;
use App\Post;
use App\User;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        // 'App\Model' => 'App\Policies\ModelPolicy',
//        Post::class => PostPolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();
        Gate::define('view_reports',function (User $user){
           return($user->abilities()->contains('view_reports'));
        });
        Gate::define('edit_forum',function (User $user){
            return($user->abilities()->contains('view_reports'));
        });
    }
}
