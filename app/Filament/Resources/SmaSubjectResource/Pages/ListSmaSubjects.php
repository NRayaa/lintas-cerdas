<?php

namespace App\Filament\Resources\SmaSubjectResource\Pages;

use App\Filament\Resources\SmaSubjectResource;
use App\Filament\Resources\SmaSubjectResource\Widgets\SmaSubjectStats;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListSmaSubjects extends ListRecords
{
    protected static string $resource = SmaSubjectResource::class;

    protected static ?string $title = 'Materi SMA';

    protected function getHeaderWidgets(): array
    {
        return [
            SmaSubjectStats::class,
        ];
    }

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make()
            ->label('Tambah Materi'),
        ];
    }
}
