<?php

namespace App\Filament\Resources\SmpSubSubjectResource\Pages;

use App\Filament\Resources\SmpSubSubjectResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditSmpSubSubject extends EditRecord
{
    protected static string $resource = SmpSubSubjectResource::class;

    protected static ?string $title = 'Edit Sub Materi';

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
