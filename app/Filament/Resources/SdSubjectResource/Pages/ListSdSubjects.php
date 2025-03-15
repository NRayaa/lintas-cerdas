<?php

namespace App\Filament\Resources\SdSubjectResource\Pages;

use App\Filament\Resources\SdSubjectResource;
use App\Filament\Resources\SdSubjectResource\Widgets\SdSubjectStats;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListSdSubjects extends ListRecords
{
    protected static string $resource = SdSubjectResource::class;

    protected function getHeaderWidgets(): array
    {
        return [
            SdSubjectStats::class,
        ];
    }

    public function getWidgets(): array
    {
        return [
            SdSubjectStats::class,
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
