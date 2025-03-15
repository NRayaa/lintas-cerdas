<?php

namespace App\Filament\Resources\SmpSubjectResource\Pages;

use App\Filament\Resources\SmpSubjectResource;
use App\Filament\Resources\SmpSubjectResource\Widgets\SmpSubjectStats;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListSmpSubjects extends ListRecords
{
    protected static string $resource = SmpSubjectResource::class;

    protected function getHeaderWidgets(): array
    {
        return [
            SmpSubjectStats::class,
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
