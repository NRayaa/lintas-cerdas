<?php

namespace App\Filament\Resources\SmaSubSubjectResource\Pages;

use App\Filament\Resources\SmaSubSubjectResource;
use App\Models\SmaSubject;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateSmaSubSubject extends CreateRecord
{
    protected static string $resource = SmaSubSubjectResource::class;

    protected function beforeCreate(): void
    {
        $subjectId = request()->query('record'); // Ambil ID dari query string

        if ($subjectId) {
            $this->data['sma_subject_id'] = $subjectId; // Isi otomatis sd_subject_id
        }
    }

    public function getTitle(): string
    {
        $subjectId = request()->query('record'); // Ambil ID dari query string
        $subject = SmaSubject::find($subjectId); // Cari subject berdasarkan ID

        return $subject ? 'Tambah Sub Materi  ' . $subject->name : 'Tambah Sub-Subject';
    }
}
