<?php

namespace App\Filament\Resources\SmaUserResource\Pages;

use App\Filament\Resources\SmaUserResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListSmaUsers extends ListRecords
{
    protected static string $resource = SmaUserResource::class;

    protected static ?string $title = 'User (SMA)';

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make()
            ->label('Tambah User'),
        ];
    }
}
