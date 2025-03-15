<?php

namespace App\Filament\Resources;

use App\Filament\Resources\SmpSubSubjectResource\Pages;
use App\Filament\Resources\SmpSubSubjectResource\RelationManagers;
use App\Models\SmpSubject;
use App\Models\SmpSubSubject;
use Filament\Forms;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ToggleColumn;
use Filament\Tables\Filters\Filter;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class SmpSubSubjectResource extends Resource
{
    protected static ?string $model = SmpSubSubject::class;

    protected static bool $shouldRegisterNavigation = false;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        $recordId = request()->query('record'); // Ambil ID dari URL
        $subject = SmpSubject::find($recordId); // Cari data subject berdasarkan ID

        return $form
            ->schema([
                Section::make('General')
                    ->schema([
                        Select::make('smp_subject_id')
                            ->label('Subject')
                            ->options(SmpSubject::pluck('name', 'id'))
                            ->default($subject ? $subject->id : null)
                            ->disabled() // Tidak bisa diubah oleh user
                            ->dehydrated(), // Tetap dikirim ke database
                        TextInput::make('name')
                            ->label('Judul Sub Materi')
                            ->required()
                            ->maxLength(255),

                        TextInput::make('external_id')
                            ->label('External ID')
                            ->numeric()
                            ->default(fn() => (SmpSubSubject::max('external_id') ?? 0) + 1)
                            ->readOnly()
                            ->required(),
                    ]),

                Section::make('Status')
                    ->schema([
                        Toggle::make('is_active')
                            ->label('Status')
                            ->default(true),
                    ]),

                Section::make('Konten')
                    ->schema([
                        RichEditor::make('content')
                            ->label('Isi Sub Materi')
                            ->required(),
                    ]),


                // Repeater untuk upload gambar
                Section::make('Gambar')
                    ->schema([
                        Repeater::make('smpImgSubs')
                            ->label('Upload Gambar Untuk Support Pembelajaran')
                            ->relationship('smpImgSubs') // Sesuai relasi di model
                            ->schema([
                                FileUpload::make('img')
                                    ->label('Image')
                                    ->image()
                                    ->directory('smp-subject-images') // Simpan di folder ini
                                    ->required(),

                                TextInput::make('name')
                                    ->label('Nama Gambar')
                                    ->required()
                                    ->maxLength(255),

                                Textarea::make('content')
                                    ->label('Deskripsi')
                                    ->rows(2)
                                    ->columnSpanFull()
                                    ->nullable(),
                            ])
                            ->defaultItems(1) // Mulai dengan 1 item di repeater
                            ->columns(2), // Layout 1 kolom untuk tiap item
                    ])
            ]);
    }

    public static function table(Table $table): Table
    {
        $subjectId = request()->route('record'); // Ambil ID dari URL

        return $table
            ->query(
                SmpSubSubject::query()->where('smp_subject_id', $subjectId)
            )
            ->columns([
                TextColumn::make('id')
                    ->label('ID')
                    ->sortable(),

                TextColumn::make('name')
                    ->label('Nama Sub-Subject')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('number')
                    ->label('Nomor')
                    ->sortable(),

                ToggleColumn::make('is_active')
                    ->label('Aktif'),
            ])
            ->filters([
                Filter::make('active')
                    ->query(fn(Builder $query): Builder => $query->where('is_active', 1))
                    ->label('Hanya Aktif'),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
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
            'index' => Pages\ListSmpSubSubjects::route('/'),
            'create' => Pages\CreateSmpSubSubject::route('/create'),
            'edit' => Pages\EditSmpSubSubject::route('/{record}/edit'),
        ];
    }
}
