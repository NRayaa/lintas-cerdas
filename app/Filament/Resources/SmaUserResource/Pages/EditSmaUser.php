<?php

namespace App\Filament\Resources\SmaUserResource\Pages;

use App\Filament\Resources\SmaUserResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditSmaUser extends EditRecord
{
    protected static string $resource = SmaUserResource::class;

    protected static ?string $title = 'Edit User (SD)';

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
