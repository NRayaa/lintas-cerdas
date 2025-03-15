<?php

namespace App\Filament\Resources\SmpUserResource\Pages;

use App\Filament\Resources\SmpUserResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateSmpUser extends CreateRecord
{
    protected static string $resource = SmpUserResource::class;

    protected static ?string $title = 'Buat User (SMP)';
}
