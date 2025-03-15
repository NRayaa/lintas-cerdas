<?php

namespace App\Filament\Resources\SdUserResource\Pages;

use App\Filament\Resources\SdUserResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListSdUsers extends ListRecords
{
    protected static string $resource = SdUserResource::class;

    protected static ?string $title = 'User (SD)';

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make()
            ->label('Tambah User'),
        ];
    }
}
