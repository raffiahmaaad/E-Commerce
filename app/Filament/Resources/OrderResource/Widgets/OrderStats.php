<?php

namespace App\Filament\Resources\OrderResource\Widgets;

use App\Models\Order;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;
use Illuminate\Support\Facades\DB;

class OrderStats extends BaseWidget
{
    /**
     * Membuat seluruh widget (angka dan grafik) diperbarui otomatis setiap 15 detik.
     */
    protected static ?string $pollingInterval = '15s';

    /**
     * Fungsi asli Anda, dengan sedikit perbaikan untuk menangani jika belum ada data.
     */
    private function formatCompactNumber(int|float|null $number): string
    {
        // Jika angka null atau 0, kembalikan '0' untuk mencegah error
        if (is_null($number) || $number == 0) {
            return '0';
        }

        if ($number < 1000) {
            return (string) $number;
        }

        if ($number < 1000000) {
            return round($number / 1000, 1) . 'K';
        }

        return round($number / 1000000, 15) . 'JT';
    }

    protected function getStats(): array
    {
        // --- PENAMBAHAN: Mengambil data untuk semua grafik 7 hari terakhir ---

        // Grafik untuk Total Pesanan Harian
        $totalOrdersData = Order::query()
            ->select(DB::raw('DATE(created_at) as date'), DB::raw('count(*) as count'))
            ->groupBy('date')
            ->orderBy('date', 'asc')
            ->where('created_at', '>=', now()->subDays(7))
            ->pluck('count')
            ->toArray();

        // Grafik untuk Pesanan Diproses
        $processingData = Order::query()
            ->where('status', 'processing')
            ->select(DB::raw('DATE(created_at) as date'), DB::raw('count(*) as count'))
            ->groupBy('date')
            ->orderBy('date', 'asc')
            ->where('created_at', '>=', now()->subDays(7))
            ->pluck('count')
            ->toArray();

        // Grafik untuk Pesanan Dikirim
        $shippedData = Order::query()
            ->where('status', 'shipped')
            ->select(DB::raw('DATE(created_at) as date'), DB::raw('count(*) as count'))
            ->groupBy('date')
            ->orderBy('date', 'asc')
            ->where('created_at', '>=', now()->subDays(7))
            ->pluck('count')
            ->toArray();

        // Grafik untuk Rata-rata Harga Harian
        $avgPriceData = Order::query()
            ->select(DB::raw('DATE(created_at) as date'), DB::raw('avg(grand_total) as average'))
            ->groupBy('date')
            ->orderBy('date', 'asc')
            ->where('created_at', '>=', now()->subDays(7))
            ->pluck('average')
            ->toArray();


        return [
            Stat::make('Orders', Order::count())
                ->description('Total semua pesanan')
                ->descriptionIcon('heroicon-m-shopping-bag')
                ->color('primary')
                ->chart($totalOrdersData), // GRAFIK DITAMBAHKAN

            Stat::make('Order Processing', Order::query()->where('status', 'processing')->count())
                ->description('Pesanan sedang diproses')
                ->descriptionIcon('heroicon-m-arrow-path')
                ->color('warning')
                ->chart($processingData),

            Stat::make('Order Shipped', Order::query()->where('status', 'shipped')->count())
                ->description('Pesanan telah dikirim')
                ->descriptionIcon('heroicon-m-truck')
                ->color('success')
                ->chart($shippedData),

            Stat::make('Average Price', 'IDR ' . $this->formatCompactNumber(Order::avg('grand_total')))
                ->description('Rata-rata harga pesanan')
                ->descriptionIcon('heroicon-m-banknotes')
                ->color('success')
                ->chart($avgPriceData), // GRAFIK DITAMBAHKAN
        ];
    }
}
