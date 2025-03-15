<?php

namespace App\Filament\Resources;

use App\Filament\Resources\SdSubjectResource\Pages;
use App\Filament\Resources\SdSubjectResource\Pages\ListSdSubjects;
use App\Filament\Resources\SdSubjectResource\RelationManagers;
use App\Filament\Resources\SdSubSubjectResource\Pages\CreateSdSubSubject;
use App\Filament\Resources\SdSubSubjectResource\Pages\ListSdSubSubjects;
use App\Models\SdSubject;
use App\Models\SdSubSubject;
use Filament\Forms;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ToggleColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Tables\Actions\Action;

class SdSubjectResource extends Resource
{
    protected static ?string $model = SdSubject::class;

    protected static ?string $navigationLabel = 'Materi';

    protected static ?string $navigationGroup = 'Sekolah Dasar';

    protected static ?string $navigationIcon = 'heroicon-o-newspaper';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make('General')
                    ->schema([
                        TextInput::make('name')
                            ->label('Judul')
                            ->required()
                            ->maxLength(255),

                        TextInput::make('external_id')
                            ->label('External ID')
                            ->numeric()
                            ->default(fn() => (SdSubject::withTrashed()->max('external_id') ?? 0) + 1)
                            ->readOnly()
                            ->required(),
                        TextInput::make('number')
                            ->label('Nomor Urutan')
                            ->numeric()
                            ->default(fn() => (SdSubject::max('number') ?? 0) + 1)
                            ->readOnly()
                            ->required(),
                    ]),

                Section::make('Status')
                    ->schema([
                        Toggle::make('is_active')
                            ->label('Aktif')
                            ->default(true)
                    ]),

                Section::make('Konten')
                    ->schema([
                        RichEditor::make('content')
                            ->label('Deskripsi Materi')
                            ->required(),
                    ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->query(SdSubject::query()->orderBy('number'))
            ->columns([
                TextColumn::make('name')
                    ->label('Judul')
                    ->sortable()
                    ->searchable(),

                ToggleColumn::make('is_active')
                    ->label('Aktif')
                    ->afterStateUpdated(function ($record, $state) {
                        // Kirim ke API toggle status
                        $response = \Illuminate\Support\Facades\Http::withHeaders([
                            'X-API-KEY' => env('API_KEY'),
                        ])->post(env('API_URL') . '/subject/' . $record->external_id . '/toggle');

                        if ($response->failed()) {
                            throw new \Exception('Gagal mengupdate status di API: ' . $response->body());
                        }
                    }),

                TextColumn::make('total_sub_materi')
                    ->label('Sub Materi')
                    ->getStateUsing(fn($record) => SdSubSubject::where('sd_subject_id', $record->id)->count())
                    ->sortable(),

                TextColumn::make('created_at')
                    ->label('Dibuat Pada')
                    ->dateTime('d M Y H:i')
                    ->sortable(),
            ])
            ->reorderable('number')


            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\Action::make('view_sub_subjects')
                    ->label('Sub Materi')
                    ->icon('heroicon-m-pencil-square')
                    ->url(fn($record) => SdSubjectResource::getUrl('sub.index', ['record' => $record->id])),
            ])
            ->bulkActions([
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListSdSubjects::route('/'),
            'create' => Pages\CreateSdSubject::route('/create'),
            'edit' => Pages\EditSdSubject::route('/{record}/edit'),
            'sub.index' => ListSdSubSubjects::route('/{record}/sub'),
            'sub.create' => CreateSdSubSubject::route('/{record}/sub/create'),
        ];
    }
}
