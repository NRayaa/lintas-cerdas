<?php

namespace App\Filament\Resources\SmpUserResource\Pages;

use App\Filament\Resources\SmpUserResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditSmpUser extends EditRecord
{
    protected static string $resource = SmpUserResource::class;

    protected static ?string $title = 'Edit User (SMP)';

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
