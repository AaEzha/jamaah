<?php

namespace App\Filament\Jamaah\Widgets;

use Filament\Widgets\ChartWidget;

class TransactionsChart extends ChartWidget
{
    // protected static ?string $heading = 'Transaction Chart';
    protected int | string | array $columnSpan = 'full';

    protected function getData(): array
    {
        return [
            'datasets' => [
                [
                    'label' => 'Income',
                    'data' => [0, 10, 5, 2, 21, 32, 45, 74, 65, 45, 77, 89],
                ],
                [
                    'borderColor' => '#9BD0F5',
                    'label' => 'Spending',
                    'data' => [10, 5, 2, 21, 32, 45, 74, 65, 45, 77, 89, 20],
                ],
            ],
            'labels' => ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
        ];
    }

    protected function getType(): string
    {
        return 'line';
    }

    public function getHeading(): string
    {
        return __("widget.transaction_chart");
    }
}
