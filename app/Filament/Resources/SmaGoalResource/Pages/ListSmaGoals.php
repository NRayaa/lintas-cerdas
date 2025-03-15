<?php

namespace App\Filament\Resources\SmaGoalResource\Pages;

use App\Filament\Resources\SmaGoalResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListSmaGoals extends ListRecords
{
    protected static string $resource = SmaGoalResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make()
            ->label('Tambah Tujuan'),
        ];
    }
}
