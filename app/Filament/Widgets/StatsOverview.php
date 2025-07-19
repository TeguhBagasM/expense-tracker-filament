<?php

namespace App\Filament\Widgets;

use App\Models\Transaction;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class StatsOverview extends BaseWidget
{
    protected function getStats(): array
    {
        $pemasukan = Transaction::where('is_expense', false)->sum('amount');
        $pengeluaran = Transaction::where('is_expense', true)->sum('amount');
        $selisih = $pemasukan - $pengeluaran;
        return [
            Stat::make('Total Pemasukan', 'Rp. ' . $pemasukan),
            Stat::make('Total Pengeluaran', 'Rp. ' . $pengeluaran),
            Stat::make('Selisih', 'Rp. ' . $selisih),

        ];
    }
}
