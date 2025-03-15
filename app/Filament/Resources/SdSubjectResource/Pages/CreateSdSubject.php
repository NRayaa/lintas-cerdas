<?php

namespace App\Filament\Resources\SdSubjectResource\Pages;

use App\Filament\Resources\SdSubjectResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;
use Illuminate\Support\Facades\Http;

class CreateSdSubject extends CreateRecord
{
    protected static string $resource = SdSubjectResource::class;

    protected static ?string $title = 'Buat Materi (SD)';

}
