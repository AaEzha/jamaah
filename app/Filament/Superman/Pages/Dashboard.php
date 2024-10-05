<?php

namespace App\Filament\Superman\Pages;

use App\Filament\Superman\Widgets\StatsOverview;
use Filament\Pages\Dashboard as FilamentDashboard;

class Dashboard extends FilamentDashboard
{
    protected static ?string $navigationIcon = 'heroicon-o-home';
    protected static string $view = 'filament.superman.pages.dashboard';

    protected function getHeaderWidgets(): array
    {
        return [
            StatsOverview::class
        ];
    }
}
