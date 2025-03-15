<?php

namespace App\Filament\Resources\SdSubjectResource\Widgets;

use App\Models\SdSubject;
use App\Models\SdSubSubject;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class SdSubjectStats extends BaseWidget
{
    protected function getStats(): array
    {
        return [
            Stat::make('Materi SD', SdSubject::count())
            ->description('Jumlah Materi SD')
            ->color('primary'),

            Stat::make('Sub Materi SD', SdSubSubject::count())
            ->description('Jumlah Sub Materi SD')
            ->color('primary'),
        ];
    }

    protected function getColumns(): int
    {
        return 2; // Bagi menjadi 2 kolom (w-1/2 w-1/2)
    }
}
