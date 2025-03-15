<?php

namespace App\Filament\Resources\SmpGoalResource\Pages;

use App\Filament\Resources\SmpGoalResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListSmpGoals extends ListRecords
{
    protected static string $resource = SmpGoalResource::class;

    protected static ?string $title = 'Tujuan Pembelajaran SMP';

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make()
            ->label('Tambah Tujuan'),
        ];
    }
}
