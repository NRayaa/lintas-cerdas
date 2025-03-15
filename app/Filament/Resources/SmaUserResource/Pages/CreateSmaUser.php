<?php

namespace App\Filament\Resources\SmaUserResource\Pages;

use App\Filament\Resources\SmaUserResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateSmaUser extends CreateRecord
{
    protected static string $resource = SmaUserResource::class;

    protected static ?string $title = 'Buat User (SD)';
}
