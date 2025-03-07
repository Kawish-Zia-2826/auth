<?php

namespace App\Providers;

use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;
use App\Models\User;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Gate::define('isAdmin',function(User $user){
                    return $user->role === 'admin';
                    // return dd($user);
        });
    
    Gate::define('viw-profile',function(User $user, $user_id){
        return $user->id === (int) $user_id;
});

Gate::define('update-profile',function(User $user, $user_id){
    return $user->id === (int) $user_id;
});



}
}
