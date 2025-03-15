<?php

namespace App\Filament\Resources\SmaQuizResource\Pages;

use App\Filament\Resources\SmaQuizResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateSmaQuiz extends CreateRecord
{
    protected static string $resource = SmaQuizResource::class;

    protected static ?string $title = 'Buat Quiz SMA';
}
