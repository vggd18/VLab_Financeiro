<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;
use App\Models\Pessoa;
use App\Policies\CategoryPolicy;
use App\Policies\PessoaPolicy;
use App\Policies\TransactionPolicy;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        Pessoa::class => PessoaPolicy::class,
        Pessoa::class => CategoryPolicy::class,
        Pessoa::class => TransactionPolicy::class
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        //
    }
}
