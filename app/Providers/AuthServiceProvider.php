<?php

namespace App\Providers;

use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        'App\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        $user = \Auth::user();

        
        // Auth gates for: User management
        Gate::define('user_management_access', function ($user) {
            return in_array($user->role_id, [1, 2]);
        });

        // Auth gates for: Roles
        Gate::define('role_access', function ($user) {
            return in_array($user->role_id, [1, 2]);
        });
        Gate::define('role_create', function ($user) {
            return in_array($user->role_id, [1, 2]);
        });
        Gate::define('role_edit', function ($user) {
            return in_array($user->role_id, [1, 2]);
        });
        Gate::define('role_view', function ($user) {
            return in_array($user->role_id, [1, 2]);
        });
        Gate::define('role_delete', function ($user) {
            return in_array($user->role_id, [1]);
        });

        // Auth gates for: Users
        Gate::define('user_access', function ($user) {
            return in_array($user->role_id, [1, 2]);
        });
        Gate::define('user_create', function ($user) {
            return in_array($user->role_id, [1, 2]);
        });
        Gate::define('user_edit', function ($user) {
            return in_array($user->role_id, [1, 2]);
        });
        Gate::define('user_view', function ($user) {
            return in_array($user->role_id, [1, 2]);
        });
        Gate::define('user_delete', function ($user) {
            return in_array($user->role_id, [1]);
        });

        // Auth gates for: Find tires by car number
        Gate::define('find_tires_by_car_number_access', function ($user) {
            return in_array($user->role_id, [1, 2]);
        });

        // Auth gates for: Car brands
        Gate::define('car_brand_access', function ($user) {
            return in_array($user->role_id, [1, 2]);
        });
        Gate::define('car_brand_create', function ($user) {
            return in_array($user->role_id, [1, 2]);
        });
        Gate::define('car_brand_edit', function ($user) {
            return in_array($user->role_id, [1, 2]);
        });
        Gate::define('car_brand_view', function ($user) {
            return in_array($user->role_id, [1, 2]);
        });
        Gate::define('car_brand_delete', function ($user) {
            return in_array($user->role_id, [1, 2]);
        });

        // Auth gates for: Car models
        Gate::define('car_model_access', function ($user) {
            return in_array($user->role_id, [1, 2]);
        });
        Gate::define('car_model_create', function ($user) {
            return in_array($user->role_id, [1, 2]);
        });
        Gate::define('car_model_edit', function ($user) {
            return in_array($user->role_id, [1, 2]);
        });
        Gate::define('car_model_view', function ($user) {
            return in_array($user->role_id, [1, 2]);
        });
        Gate::define('car_model_delete', function ($user) {
            return in_array($user->role_id, [1, 2]);
        });

        // Auth gates for: Car numbers
        Gate::define('car_number_access', function ($user) {
            return in_array($user->role_id, [1, 2]);
        });
        Gate::define('car_number_create', function ($user) {
            return in_array($user->role_id, [1, 2]);
        });
        Gate::define('car_number_edit', function ($user) {
            return in_array($user->role_id, [1, 2]);
        });
        Gate::define('car_number_view', function ($user) {
            return in_array($user->role_id, [1, 2]);
        });
        Gate::define('car_number_delete', function ($user) {
            return in_array($user->role_id, [1, 2]);
        });

        // Auth gates for: Tires
        Gate::define('tire_access', function ($user) {
            return in_array($user->role_id, [1, 2]);
        });
        Gate::define('tire_create', function ($user) {
            return in_array($user->role_id, [1, 2]);
        });
        Gate::define('tire_edit', function ($user) {
            return in_array($user->role_id, [1, 2]);
        });
        Gate::define('tire_view', function ($user) {
            return in_array($user->role_id, [1, 2]);
        });
        Gate::define('tire_delete', function ($user) {
            return in_array($user->role_id, [1, 2]);
        });

        // Auth gates for: Tire brands
        Gate::define('tire_brand_access', function ($user) {
            return in_array($user->role_id, [1, 2]);
        });
        Gate::define('tire_brand_create', function ($user) {
            return in_array($user->role_id, [1, 2]);
        });
        Gate::define('tire_brand_edit', function ($user) {
            return in_array($user->role_id, [1, 2]);
        });
        Gate::define('tire_brand_view', function ($user) {
            return in_array($user->role_id, [1, 2]);
        });
        Gate::define('tire_brand_delete', function ($user) {
            return in_array($user->role_id, [1, 2]);
        });

        // Auth gates for: Tire sizes
        Gate::define('tire_size_access', function ($user) {
            return in_array($user->role_id, [1, 2]);
        });
        Gate::define('tire_size_create', function ($user) {
            return in_array($user->role_id, [1, 2]);
        });
        Gate::define('tire_size_edit', function ($user) {
            return in_array($user->role_id, [1, 2]);
        });
        Gate::define('tire_size_view', function ($user) {
            return in_array($user->role_id, [1, 2]);
        });
        Gate::define('tire_size_delete', function ($user) {
            return in_array($user->role_id, [1, 2]);
        });

        // Auth gates for: Tire products
        Gate::define('tire_product_access', function ($user) {
            return in_array($user->role_id, [1, 2]);
        });
        Gate::define('tire_product_create', function ($user) {
            return in_array($user->role_id, [1, 2]);
        });
        Gate::define('tire_product_edit', function ($user) {
            return in_array($user->role_id, [1, 2]);
        });
        Gate::define('tire_product_view', function ($user) {
            return in_array($user->role_id, [1, 2]);
        });
        Gate::define('tire_product_delete', function ($user) {
            return in_array($user->role_id, [1, 2]);
        });

        // Auth gates for: Shop block
        Gate::define('shop_block_access', function ($user) {
            return in_array($user->role_id, [1, 2]);
        });

    }
}
