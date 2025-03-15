<?php

namespace App\Filament\Resources\SmpQuizResource\Pages;

use App\Filament\Resources\SmpQuizResource;
use App\Models\SmpQuiz;
use App\Models\SmpScore;
use Filament\Resources\Pages\Page;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Contracts\HasTable;

class SmpResultQuiz extends Page implements HasTable
{
    use Tables\Concerns\InteractsWithTable;

    public function getTitle(): string
    {
        $subjectId = request()->route('record'); // Ambil ID dari URL
        $subject = SmpQuiz::find($subjectId); // Cari data di database

        return $subject ? 'Quiz  ' . $subject->name : 'Sub-Subjects';
    }

    protected static string $resource = SmpQuizResource::class;

    protected static string $view = 'filament.resources.smp-quiz-resource.pages.smp-result-quiz';

    public function getWidgets(): array
    {
        return [
            \App\Filament\Resources\SmpQuizResource\Widgets\SmpResult::class,
        ];
    }

    protected function getTableQuery()
    {
        // Ambil parameter dari URL
        $quizId = request()->route('record');

        return SmpScore::where('smp_quiz_id', $quizId);
    }

    protected function getTableColumns(): array
    {
        return [
            TextColumn::make('id')->label('ID'),
            TextColumn::make('smpUser.name')->label('Nama'), // Pastikan ada relasi ke user
            TextColumn::make('score')->label('Skor')->sortable(),
            TextColumn::make('created_at')->label('Dikumpulkan Pada')->dateTime(),
        ];
    }
}
