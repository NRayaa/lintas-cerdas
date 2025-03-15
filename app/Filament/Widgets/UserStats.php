<?php

namespace App\Filament\Widgets;

use App\Models\SdUser;
use App\Models\SmaUser;
use App\Models\SmpUser;
use Filament\Forms\Components\Card;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class UserStats extends BaseWidget
{
    protected function getStats(): array
    {
        return [
            Stat::make('Total SD', SdUser::count())
                ->description('Jumlah siswa SD')
                ->color('primary'),

            Stat::make('Total SMP', SmpUser::count())
                ->description('Jumlah siswa SMP')
                ->color('primary'),

            Stat::make('Total SMA', SmaUser::count())
                ->description('Jumlah siswa SMA')
                ->color('primary'),
        ];
    }
}
