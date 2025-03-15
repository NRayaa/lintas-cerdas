<?php

namespace App\Filament\Resources\SmpSubjectResource\Widgets;

use App\Models\SmpSubject;
use App\Models\SmpSubSubject;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class SmpSubjectStats extends BaseWidget
{
    protected function getStats(): array
    {
        return [
            Stat::make('Materi SMP', SmpSubject::count())
            ->description('Jumlah Materi SMP')
            ->color('primary'),

            Stat::make('Sub Materi SMP', SmpSubSubject::count())
            ->description('Jumlah Sub Materi SMP')
            ->color('primary'),
        ];
    }

    protected function getColumns(): int
    {
        return 2; // Bagi menjadi 2 kolom (w-1/2 w-1/2)
    }
}
