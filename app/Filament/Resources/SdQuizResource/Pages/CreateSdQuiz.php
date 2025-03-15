<?php

namespace App\Filament\Resources\SdQuizResource\Pages;

use App\Filament\Resources\SdQuizResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateSdQuiz extends CreateRecord
{
    protected static string $resource = SdQuizResource::class;

    protected static ?string $title = 'Buat Quiz SD';
}
