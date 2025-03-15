<?php

namespace App\Filament\Resources\SdSubSubjectResource\Pages;

use App\Filament\Resources\SdSubSubjectResource;
use App\Models\SdSubject;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Storage;

class CreateSdSubSubject extends CreateRecord
{
    protected static string $resource = SdSubSubjectResource::class;

    protected function beforeCreate(): void
    {
        $subjectId = request()->query('record'); // Ambil ID dari query string

        if ($subjectId) {
            $this->data['sd_subject_id'] = $subjectId; // Isi otomatis sd_subject_id
        }
    }

    public function getTitle(): string
    {
        $subjectId = request()->query('record'); // Ambil ID dari query string
        $subject = SdSubject::find($subjectId); // Cari subject berdasarkan ID

        return $subject ? 'Tambah Sub Materi  ' . $subject->name : 'Tambah Sub-Subject';
    }

}
