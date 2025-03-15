<?php

namespace App\Filament\Resources\SmaSubSubjectResource\Pages;

use App\Filament\Resources\SmaSubSubjectResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditSmaSubSubject extends EditRecord
{
    protected static string $resource = SmaSubSubjectResource::class;

    protected static ?string $title = 'Edit Sub Materi';

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
