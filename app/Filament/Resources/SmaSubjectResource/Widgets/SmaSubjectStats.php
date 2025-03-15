<?php

namespace App\Filament\Resources\SmaSubjectResource\Widgets;

use App\Models\SmaSubject;
use App\Models\SmaSubSubject;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class SmaSubjectStats extends BaseWidget
{
    protected function getStats(): array
    {
        return [
            Stat::make('Materi SMA', SmaSubject::count())
            ->description('Jumlah Materi SMA')
            ->color('primary'),

            Stat::make('Sub Materi SMA', SmaSubSubject::count())
            ->description('Jumlah Sub Materi SMA')
            ->color('primary'),
        ];
    }

    protected function getColumns(): int
    {
        return 2; // Bagi menjadi 2 kolom (w-1/2 w-1/2)
    }
}
