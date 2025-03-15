<?php

namespace App\Filament\Resources\SdSubSubjectResource\Pages;

use App\Filament\Resources\SdSubjectResource;
use App\Filament\Resources\SdSubSubjectResource;
use App\Models\SdSubject;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListSdSubSubjects extends ListRecords
{
    protected static string $resource = SdSubSubjectResource::class;

    public function getTitle(): string
    {
        $subjectId = request()->route('record'); // Ambil ID dari URL
        $subject = SdSubject::find($subjectId); // Cari data di database

        return $subject ? 'Materi  ' . $subject->name : 'Sub-Subjects';
    }

    protected function getHeaderActions(): array
    {
        $recordId = request()->route('record'); // Ambil ID SdSubject dari URL

        return [
            Actions\CreateAction::make()
                ->url(fn () => SdSubSubjectResource::getUrl('create', ['record' => $recordId]))
                ->label('Tambah Sub Materi') // Tambahkan record ke URL
        ];
    }

}
