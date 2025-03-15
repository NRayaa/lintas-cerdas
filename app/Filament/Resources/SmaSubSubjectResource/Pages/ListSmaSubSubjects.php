<?php

namespace App\Filament\Resources\SmaSubSubjectResource\Pages;

use App\Filament\Resources\SmaSubSubjectResource;
use App\Models\SmaSubject;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListSmaSubSubjects extends ListRecords
{
    protected static string $resource = SmaSubSubjectResource::class;

    public function getTitle(): string
    {
        $subjectId = request()->route('record'); // Ambil ID dari URL
        $subject = SmaSubject::find($subjectId); // Cari data di database

        return $subject ? 'Materi  ' . $subject->name : 'Sub-Subjects';
    }

    protected function getHeaderActions(): array
    {
        $recordId = request()->route('record'); // Ambil ID SdSubject dari URL

        return [
            Actions\CreateAction::make()
                ->url(fn () => SmaSubSubjectResource::getUrl('create', ['record' => $recordId]))
                ->label('Tambah Sub Materi') // Tambahkan record ke URL
        ];
    }
}
