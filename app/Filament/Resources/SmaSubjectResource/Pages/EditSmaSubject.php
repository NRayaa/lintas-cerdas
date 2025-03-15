<?php

namespace App\Filament\Resources\SmaSubjectResource\Pages;

use App\Filament\Resources\SmaSubjectResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditSmaSubject extends EditRecord
{
    protected static string $resource = SmaSubjectResource::class;

    protected static ?string $title = 'Edit Materi SMA';

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
