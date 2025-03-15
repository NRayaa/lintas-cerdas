<?php

namespace App\Filament\Resources\SdGoalResource\Pages;

use App\Filament\Resources\SdGoalResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;
use Illuminate\Support\Facades\Http;

class CreateSdGoal extends CreateRecord
{
    protected static string $resource = SdGoalResource::class;

    protected static ?string $title = 'Buat Tujuan (SD)';


}
