<?php

namespace App\Filament\Resources\SdUserResource\Pages;

use App\Filament\Resources\SdUserResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditSdUser extends EditRecord
{
    protected static string $resource = SdUserResource::class;

    protected static ?string $title = 'Edit User (SD)';

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
