<?php

namespace App\Filament\Resources\SdGoalResource\Pages;

use App\Filament\Resources\SdGoalResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListSdGoals extends ListRecords
{
    protected static string $resource = SdGoalResource::class;

    protected static ?string $title = 'Tujuan Pembelajaran SD';

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make()
            ->label('Tambah Tujuan'),
        ];
    }
}
