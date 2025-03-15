<?php

namespace App\Filament\Resources\SdSubSubjectResource\Pages;

use App\Filament\Resources\SdSubSubjectResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditSdSubSubject extends EditRecord
{
    protected static string $resource = SdSubSubjectResource::class;

    protected static ?string $title = 'Edit Sub Materi';

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
