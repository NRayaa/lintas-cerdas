<?php

namespace App\Filament\Resources\SmpGoalResource\Pages;

use App\Filament\Resources\SmpGoalResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditSmpGoal extends EditRecord
{
    protected static string $resource = SmpGoalResource::class;

    protected static ?string $title = 'Edit Tujuan (SMP)';

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
