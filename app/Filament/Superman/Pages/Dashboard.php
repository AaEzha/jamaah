<?php

namespace App\Filament\Superman\Pages;

use App\Filament\Superman\Widgets\StatsOverview;
use Filament\Pages\Page;

class Dashboard extends Page
{
    protected static ?string $navigationIcon = 'heroicon-o-home';
    protected static string $view = 'filament.superman.pages.dashboard';

    protected int | string | array $columnSpan = 'full';
    public function getColumns(): int | string | array
    {
        return 2;
    }

    protected function getHeaderWidgets(): array
    {
        return [
            StatsOverview::class
        ];
    }
}
