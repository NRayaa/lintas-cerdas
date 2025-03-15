<?php

namespace App\Filament\Resources\SmpQuizResource\Pages;

use App\Filament\Resources\SmpQuizResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListSmpQuizzes extends ListRecords
{
    protected static string $resource = SmpQuizResource::class;

    protected static ?string $title = 'Quiz SMP';

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make()
            ->label('Tambah Quiz'),
        ];
    }
}
