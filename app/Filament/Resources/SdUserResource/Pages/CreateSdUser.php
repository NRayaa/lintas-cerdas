<?php

namespace App\Filament\Resources\SdUserResource\Pages;

use App\Filament\Resources\SdUserResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateSdUser extends CreateRecord
{
    protected static string $resource = SdUserResource::class;

    protected static ?string $title = 'Buat User (SD)';
}
