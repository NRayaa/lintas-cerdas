<?php

namespace App\Filament\Resources\SmpUserResource\Pages;

use App\Filament\Resources\SmpUserResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListSmpUsers extends ListRecords
{
    protected static string $resource = SmpUserResource::class;

    protected static ?string $title = 'User (SMP)';

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make()
            ->label('Tambah User'),
        ];
    }
}
