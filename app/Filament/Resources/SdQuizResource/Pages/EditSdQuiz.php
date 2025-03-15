<?php

namespace App\Filament\Resources\SdQuizResource\Pages;

use App\Filament\Resources\SdQuizResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditSdQuiz extends EditRecord
{
    protected static string $resource = SdQuizResource::class;

    protected static ?string $title = 'Edit Quiz SD';

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
