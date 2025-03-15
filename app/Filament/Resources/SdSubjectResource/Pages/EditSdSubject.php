<?php

namespace App\Filament\Resources\SdSubjectResource\Pages;

use App\Filament\Resources\SdSubjectResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;
use Illuminate\Support\Facades\Http;

class EditSdSubject extends EditRecord
{
    protected static string $resource = SdSubjectResource::class;

    protected static ?string $title = 'Edit Materi (SD)';

    protected function mutateFormDataBeforeSave(array $data): array
    {
        // Kirim data ke API eksternal sebelum update di database lokal
        $response = Http::withHeaders([
            'X-API-KEY' => env('API_KEY'),
        ])->post(env('API_URL') . '/subject/' . $this->record->external_id, $data);

        if ($response->failed()) {
            throw new \Exception('Gagal mengupdate data di API: ' . $response->body());
        }

        return $data; // Data tetap diupdate di database lokal
    }

    // protected function beforeDelete(): void
    // {
    //     $response = Http::withHeaders([
    //         'X-API-KEY' => env('API_KEY'),
    //     ])->delete(env('API_URL') . '/goal/' . $this->record->external_id);

    //     if ($response->failed()) {
    //         throw new \Exception('Gagal menghapus data di API: ' . $response->body());
    //     }
    // }

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
