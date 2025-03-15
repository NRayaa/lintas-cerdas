<?php

namespace App\Filament\Resources\SdQuizResource\Pages;

use App\Filament\Resources\SdQuizResource;
use App\Models\SdQuiz;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListSdQuizzes extends ListRecords
{
    protected static string $resource = SdQuizResource::class;

    protected static ?string $title = 'Quiz SD';

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make()
                ->label('Tambah Quiz'),
        ];
    }
}
