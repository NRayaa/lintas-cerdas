<?php

namespace App\Filament\Resources\SmaGoalResource\Pages;

use App\Filament\Resources\SmaGoalResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditSmaGoal extends EditRecord
{
    protected static string $resource = SmaGoalResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
