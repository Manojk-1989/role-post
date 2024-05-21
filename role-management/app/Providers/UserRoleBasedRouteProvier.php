<?php

namespace App\Providers;

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;

class UserRoleBasedRouteProvier extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        // No route registration here
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        $this->configureRoutes();
    }

    /**
     * Configure the routes based on the request header.
     */
    protected function configureRoutes(): void
    {
        $this->app->booted(function () {

            // dd(request());
            // return response()->json($this->app->request->method());
            // if ($this->app->request->getRequestUri() == '/api/login') {
            //     Route::middleware('api')
            //     ->prefix('api')
            //     ->group(base_path('routes/api.php'));
            // } else {
                $site = request()->header('site');
                if ($site === 'user') {
                    Route::prefix('v0')
                        ->middleware('api-user')
                        ->group(base_path('routes/api-user.php'));
                } else if($site === 'admin'){
                    Route::prefix('v0')
                        ->middleware('api-admin')
                        ->group(base_path('routes/api-admin.php'));
                } else {
                    Route::middleware('api')
                ->prefix('api')
                ->group(base_path('routes/api.php'));
                }
            // }
            
            
        });
    }
}
