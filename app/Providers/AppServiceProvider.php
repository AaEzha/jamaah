<?php

namespace App\Providers;

use App\Http\Responses\LogoutResponse;
use App\Models\User;
use BezhanSalleh\FilamentLanguageSwitch\LanguageSwitch;
use Illuminate\Support\ServiceProvider;
use Filament\Http\Responses\Auth\Contracts\LogoutResponse as LogoutResponseContract;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Gate;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(LogoutResponseContract::class, LogoutResponse::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Model::unguard();

        Gate::before(function (User $user, string $ability) {
            return $user->is_superman ? true : null;
        });

        LanguageSwitch::configureUsing(function (LanguageSwitch $switch) {
            $switch
                ->locales(['id', 'en'])
                ->flags([
                    'id' => asset('flags/id.svg'),
                    'en' => asset('flags/en.svg'),
                ])
                ->visible(outsidePanels: true);
        });
    }
}
