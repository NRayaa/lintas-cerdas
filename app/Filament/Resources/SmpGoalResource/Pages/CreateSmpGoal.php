<?php

namespace App\Filament\Resources\SmpGoalResource\Pages;

use App\Filament\Resources\SmpGoalResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateSmpGoal extends CreateRecord
{
    protected static string $resource = SmpGoalResource::class;

    protected static ?string $title = 'Buat Tujuan (SMP)';
}
