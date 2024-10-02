<?php

namespace App\Filament\Superman\Widgets;

use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class StatsOverview extends BaseWidget
{
    protected function getStats(): array
    {
        return [
            Stat::make('Total Jamaah', '192.1k'),
            Stat::make('Total Users', '21%'),
        ];
    }
}
