<?php

namespace App\Filament\Resources\SmpSubjectResource\Pages;

use App\Filament\Resources\SmpSubjectResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditSmpSubject extends EditRecord
{
    protected static string $resource = SmpSubjectResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
