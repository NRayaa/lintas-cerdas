<?php

namespace App\Filament\Resources\SmpQuizResource\Pages;

use App\Filament\Resources\SmpQuizResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateSmpQuiz extends CreateRecord
{
    protected static string $resource = SmpQuizResource::class;

    protected static ?string $title = 'Buat Quiz SMP';
}
