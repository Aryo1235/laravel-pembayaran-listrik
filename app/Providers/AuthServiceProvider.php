<?php

namespace App\Providers;

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
        //
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        $this->registerPolicies();

        // Gate untuk Admin
        Gate::define('isAdmin', function ($user) {
            return $user instanceof \App\Models\User && $user->isAdmin();
        });

        // Gate untuk Pelanggan
        Gate::define('isPelanggan', function ($user) {
            return $user instanceof \App\Models\Pelanggan && $user->isPelanggan();
        });
    }
}