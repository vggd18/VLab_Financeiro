<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;
use App\Policies\CategoryPolicy;
use App\Policies\TransactionPolicy;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use App\Policies\UserPolicy;
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
        // USER PERMISSIONS
        Gate::define('create-user', [UserPolicy::class, 'create']);
        Gate::define('update-user', [UserPolicy::class, 'update']);
        Gate::define('delete-user', [UserPolicy::class, 'delete']);

        // CATEGORY PERMISSIONS
        Gate::define('viewAny-category', [CategoryPolicy::class, 'viewAny']);
        Gate::define('create-category', [CategoryPolicy::class, 'create']);
        Gate::define('delete-category', [CategoryPolicy::class, 'delete']);

        // TRANSACTION PERMISSION
        Gate::define('viewAny-transaction', [TransactionPolicy::class, 'viewAny']);
        Gate::define('create-transaction', [TransactionPolicy::class, 'create']);
        Gate::define('delete-transaction', [TransactionPolicy::class, 'delete']);
    }
}
