<?php

namespace App\Providers;

use App\Models\Car;
use App\Models\Owner;
use App\Models\User;
use App\Policies\UserPolicy;
use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        Owner::class=>UserPolicy::class
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        Gate::define('admin-car',function (User $user){

            return $user->type==1 || $user->type==2 || $user->type==3;
        });

        Gate::define('edit-car',function (User $user){

            return $user->type==1 || $user->type==2 || $user->type==3;
        });

        Gate::define('delete-car', function (User $user){
            return $user->type==2 || $user->type==3;
        });
    }
}
