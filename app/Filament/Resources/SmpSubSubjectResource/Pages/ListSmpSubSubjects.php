<?php

namespace App\Filament\Resources\SmpSubSubjectResource\Pages;

use App\Filament\Resources\SmpSubSubjectResource;
use App\Models\SmpSubject;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListSmpSubSubjects extends ListRecords
{
    protected static string $resource = SmpSubSubjectResource::class;

    public function getTitle(): string
    {
        $subjectId = request()->route('record'); // Ambil ID dari URL
        $subject = SmpSubject::find($subjectId); // Cari data di database

        return $subject ? 'Materi  ' . $subject->name : 'Sub-Subjects';
    }

    protected function getHeaderActions(): array
    {
        $recordId = request()->route('record'); // Ambil ID SdSubject dari URL

        return [
            Actions\CreateAction::make()
                ->url(fn () => SmpSubSubjectResource::getUrl('create', ['record' => $recordId]))
                ->label('Tambah Sub Materi'), // Tambahkan record ke URL
        ];
    }
}
