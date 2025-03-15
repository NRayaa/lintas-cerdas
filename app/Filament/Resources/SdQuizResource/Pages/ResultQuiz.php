<?php

namespace App\Filament\Resources\SdQuizResource\Pages;

use App\Filament\Resources\SdQuizResource;
use App\Filament\Resources\SdQuizResource\Widgets\Result;
use App\Models\SdQuiz;
use App\Models\SdScore;
use Filament\Resources\Pages\Page;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Contracts\HasTable;

class ResultQuiz extends Page implements HasTable
{
    use Tables\Concerns\InteractsWithTable;

    public function getTitle(): string
    {
        $subjectId = request()->route('record'); // Ambil ID dari URL
        $subject = SdQuiz::find($subjectId); // Cari data di database

        return $subject ? 'Quiz  ' . $subject->name : 'Sub-Subjects';
    }

    protected static string $resource = SdQuizResource::class;
    protected static string $view = 'filament.resources.sd-quiz-resource.pages.result-quiz';


    public function getWidgets(): array
    {
        return [
            \App\Filament\Resources\SdQuizResource\Widgets\Result::class,
        ];
    }


    protected function getTableQuery()
    {
        // Ambil parameter dari URL
        $quizId = request()->route('record');

        return SdScore::where('sd_quiz_id', $quizId);
    }

    protected function getTableColumns(): array
    {
        return [
            TextColumn::make('id')->label('ID'),
            TextColumn::make('sdUser.name')->label('Nama'), // Pastikan ada relasi ke user
            TextColumn::make('score')->label('Skor')->sortable(),
            TextColumn::make('created_at')->label('Dikumpulkan Pada')->dateTime(),
        ];
    }
}
