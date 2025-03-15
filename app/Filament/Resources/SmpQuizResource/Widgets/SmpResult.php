<?php

namespace App\Filament\Resources\SmpQuizResource\Widgets;

use App\Models\SmpScore;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class SmpResult extends BaseWidget
{
    protected static ?string $pollingInterval = null; // Matikan polling otomatis

    protected function getStats(): array
    {
        $quizId = request()->route('record');

        if (!$quizId) {
            return [
                Stat::make('Total Pengumpulan', 0)->description('Siswa yang mengumpulkan')->color('primary'),
                Stat::make('Nilai Tertinggi', 0)->description('Nilai tertinggi yang dicapai')->color('success'),
            ];
        }

        $totalPengumpulan = SmpScore::where('smp_quiz_id', $quizId)->count();
        $nilaiTertinggi = SmpScore::where('smp_quiz_id', $quizId)->max('score') ?? 0;

        return [
            Stat::make('Total Pengumpulan', $totalPengumpulan)
                ->description('Siswa yang mengumpulkan')
                ->color('primary'),

            Stat::make('Nilai Tertinggi', $nilaiTertinggi)
                ->description('Nilai tertinggi yang dicapai')
                ->color('success'),
        ];
    }

    protected function getColumns(): int
    {
        return 2; // Bagi menjadi 2 kolom (w-1/2 w-1/2)
    }
}
