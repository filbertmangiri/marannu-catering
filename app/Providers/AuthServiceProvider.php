<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;

use App\Enums\Role;
use App\Models\User;
use App\Policies\FoodstuffPolicy;
use App\Models\Foodstuff\Foodstuff;
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
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
        User::class => UserPolicy::class,
        Foodstuff::class => FoodstuffPolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        Gate::define('atleast_role', function (User $user, Role $role) {
            return $user && $role && $user->role->level() >= $role->level();
        });

        Gate::define('viewDashboard', function (User $user) {
            return $user && $user->role->level() >= Role::Employee->level();
        });
    }
}
