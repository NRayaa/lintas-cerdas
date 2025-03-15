<?php

namespace App\Filament\Resources;

use App\Filament\Resources\SmaSubjectResource\Pages;
use App\Filament\Resources\SmaSubjectResource\RelationManagers;
use App\Filament\Resources\SmaSubSubjectResource\Pages\ListSmaSubSubjects;
use App\Filament\Resources\SmpSubSubjectResource\Pages\CreateSmpSubSubject;
use App\Models\SmaSubject;
use App\Models\SmaSubSubject;
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

class SmaSubjectResource extends Resource
{
    protected static ?string $model = SmaSubject::class;

    protected static ?string $navigationLabel = 'Materi';

    protected static ?string $navigationGroup = 'Sekolah Menengah Atas';

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
                            ->default(fn() => (SmaSubject::max('external_id') ?? 0) + 1)
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
                            ->label('Isi Tujuan')
                            ->required(),
                    ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->query(SmaSubject::query()->orderBy('number'))
            ->columns([
                TextColumn::make('name')
                    ->label('Judul')
                    ->sortable()
                    ->searchable(),

                ToggleColumn::make('is_active')
                    ->label('Aktif'),

                TextColumn::make('total_sub_materi')
                    ->label('Sub Materi')
                    ->getStateUsing(fn($record) => SmaSubSubject::where('sma_subject_id', $record->id)->count())
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
                    ->url(fn($record) => SmaSubjectResource::getUrl('sub.index', ['record' => $record->id])),

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
            'index' => Pages\ListSmaSubjects::route('/'),
            'create' => Pages\CreateSmaSubject::route('/create'),
            'edit' => Pages\EditSmaSubject::route('/{record}/edit'),
            'sub.index' => ListSmaSubSubjects::route('/{record}/sub'),
            'sub.create' => CreateSmpSubSubject::route('/{record}/sub/create'),
        ];
    }
}
