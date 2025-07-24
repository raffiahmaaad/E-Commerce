<?php

namespace App\Filament\Resources\OrderResource\Widgets;

use App\Models\Order;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;
use Illuminate\Support\Number;

class OrderStats extends BaseWidget
{
    private function formatCompactNumber(int|float $number): string
    {
        if ($number < 1000) {
            return (string) $number;
        }

        if ($number < 1000000) {
            // Format ke ribuan (contoh: 1500 -> 1.5K)
            return round($number / 1000, 1) . 'K';
        }

        // Format ke jutaan (contoh: 2425000 -> 2.4M)
        return round($number / 1000000, 1) . 'M';
    }

    protected function getStats(): array
    {
        return [
            Stat::make('New Orders', Order::where('created_at', '>=', now()->subMonth())->count())
                ->description('32k increase')
                ->descriptionIcon('heroicon-m-arrow-trending-up')
                ->color('success'),
            Stat::make('Orders', Order::count())
                ->description('7% increase')
                ->descriptionIcon('heroicon-m-arrow-trending-down')
                ->color('danger'),
            Stat::make('Order Processing', Order::query()->where('status', 'processing')->count()),
            Stat::make('Order Shipped', Order::query()->where('status', 'shipped')->count()),
            Stat::make('Average Price', 'IDR ' . $this->formatCompactNumber(Order::avg('grand_total'))) // <-- PERUBAHAN DI SINI
                ->description('3% increase')
                ->descriptionIcon('heroicon-m-arrow-trending-up')
                ->color('success'),
        ];
    }
}
