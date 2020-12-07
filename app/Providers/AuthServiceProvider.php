<?php

namespace App\Providers;

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
        'App\Models\Post' => 'App\Policies\PostPolicy',         // Policy declare lote tar.
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()          // Policy 
    {
        $this->registerPolicies();          
        // Gate::define('view', function ($user,$post) {   // 'view' from PostPolicy. GATE ka tone tar shrr tal.
        //     return $user->id === $post->user_id;
        // });
        // Gate::before(function ($user) {                     // before ka, Policy tway br tway ma run khin mhar Gate::before ko ayin run tar.
        //     return $user->id === 2;                         // by doing this, it gives User 2 superuser privileges
        // });
        //
    }
}
