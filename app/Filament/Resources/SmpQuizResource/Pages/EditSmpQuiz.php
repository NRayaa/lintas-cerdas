<?php

namespace App\Filament\Resources\SmpQuizResource\Pages;

use App\Filament\Resources\SmpQuizResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditSmpQuiz extends EditRecord
{
    protected static string $resource = SmpQuizResource::class;

    protected static ?string $title = 'Edit Quiz SMP';

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
