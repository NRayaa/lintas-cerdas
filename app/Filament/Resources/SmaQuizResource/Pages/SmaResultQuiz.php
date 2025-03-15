<?php

namespace App\Filament\Resources\SmaQuizResource\Pages;

use App\Filament\Resources\SmaQuizResource;
use App\Models\SmaQuiz;
use App\Models\SmaScore;
use Filament\Resources\Pages\Page;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Contracts\HasTable;

class SmaResultQuiz extends Page implements HasTable
{
    use Tables\Concerns\InteractsWithTable;

    public function getTitle(): string
    {
        $subjectId = request()->route('record'); // Ambil ID dari URL
        $subject = SmaQuiz::find($subjectId); // Cari data di database

        return $subject ? 'Quiz  ' . $subject->name : 'Sub-Subjects';
    }

    protected static string $resource = SmaQuizResource::class;

    protected static string $view = 'filament.resources.sma-quiz-resource.pages.sma-result-quiz';

    public function getWidgets(): array
    {
        return [
            \App\Filament\Resources\SmaQuizResource\Widgets\SmaResult::class,
        ];
    }

    protected function getTableQuery()
    {
        // Ambil parameter dari URL
        $quizId = request()->route('record');

        return SmaScore::where('sma_quiz_id', $quizId);
    }

    protected function getTableColumns(): array
    {
        return [
            TextColumn::make('id')->label('ID'),
            TextColumn::make('smaUser.name')->label('Nama'), // Pastikan ada relasi ke user
            TextColumn::make('score')->label('Skor')->sortable(),
            TextColumn::make('created_at')->label('Dikumpulkan Pada')->dateTime(),
        ];
    }
}
