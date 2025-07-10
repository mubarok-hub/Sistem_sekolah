<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Route;

class RouteServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        $this->routes(function () {
            Route::middleware('web')
                ->group(base_path('routes/web.php'));

            Route::prefix('api')
                ->middleware('api')
                ->group(base_path('routes/api.php'));
        });
    }

    public static function redirectTo(): string
    {
        $user = auth()->user();

        return match ($user->role) {
            'admin' => route('admin.dashboard'),
            'guru'  => route('guru.dashboard'),
            'murid' => route('murid.dashboard'),
            'wali'  => route('wali.dashboard'),
            default => '/login',
        };
    }
}
