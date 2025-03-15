<?php

namespace App\Filament\Resources\SmpSubSubjectResource\Pages;

use App\Filament\Resources\SmpSubSubjectResource;
use App\Models\SmpSubject;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateSmpSubSubject extends CreateRecord
{
    protected static string $resource = SmpSubSubjectResource::class;

    protected function beforeCreate(): void
    {
        $subjectId = request()->query('record'); // Ambil ID dari query string

        if ($subjectId) {
            $this->data['smp_subject_id'] = $subjectId; // Isi otomatis sd_subject_id
        }
    }

    public function getTitle(): string
    {
        $subjectId = request()->query('record'); // Ambil ID dari query string
        $subject = SmpSubject::find($subjectId); // Cari subject berdasarkan ID

        return $subject ? 'Tambah Sub Materi  ' . $subject->name : 'Tambah Sub-Subject';
    }
}
