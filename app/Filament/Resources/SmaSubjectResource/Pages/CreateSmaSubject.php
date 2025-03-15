<?php

namespace App\Filament\Resources\SmaSubjectResource\Pages;

use App\Filament\Resources\SmaSubjectResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateSmaSubject extends CreateRecord
{
    protected static string $resource = SmaSubjectResource::class;

    protected static ?string $title = 'Buat Materi SMA';
}
