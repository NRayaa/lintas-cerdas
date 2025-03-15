<?php

namespace App\Filament\Resources\SmaQuizResource\Pages;

use App\Filament\Resources\SmaQuizResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListSmaQuizzes extends ListRecords
{
    protected static string $resource = SmaQuizResource::class;

    protected static ?string $title = 'Buat Quiz SMA';

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make()
            ->label('Tambah Quiz'),
        ];
    }
}
