<?php

namespace App\Filament\Resources\SdGoalResource\Pages;

use App\Filament\Resources\SdGoalResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;
use Illuminate\Support\Facades\Http;

class EditSdGoal extends EditRecord
{
    protected static string $resource = SdGoalResource::class;

    protected static ?string $title = 'Edit Tujuan (SD)';

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
