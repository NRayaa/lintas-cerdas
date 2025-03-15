<?php

namespace App\Filament\Resources;

use App\Filament\Resources\SmpGoalResource\Pages;
use App\Filament\Resources\SmpGoalResource\RelationManagers;
use App\Models\SmpGoal;
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

class SmpGoalResource extends Resource
{
    protected static ?string $model = SmpGoal::class;

    protected static ?string $navigationLabel = 'Tujuan';

    protected static ?string $navigationGroup = 'Sekolah Menengah Pertama';

    protected static ?string $navigationIcon = 'heroicon-o-academic-cap';

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
                            ->default(fn() => (SmpGoal::max('external_id') ?? 0) + 1)
                            ->readOnly()
                            ->required(),
                    ]),

                Section::make('Status')
                    ->schema([
                        Toggle::make('is_active')
                        ->label('Aktif')
                        ->default(true)
                        ->afterStateUpdated(fn ($state, $set) =>
                            $state ? SmpGoal::where('is_active', true)->update(['is_active' => false]) : null
                        )

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
        ->columns([
            TextColumn::make('name')
                ->label('Judul')
                ->sortable()
                ->searchable(),

            ToggleColumn::make('is_active')
                ->label('Aktif')
                ->afterStateUpdated(function ($record, $state) {
                    if ($state) {
                        // Menonaktifkan semua entri lain sebelum mengaktifkan yang baru
                        SmpGoal::where('id', '!=', $record->id)->update(['is_active' => false]);
                    }
                }),

            TextColumn::make('created_at')
                ->label('Dibuat Pada')
                ->dateTime('d M Y H:i')
                ->sortable(),
        ])


            ->filters([
                //
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
            'index' => Pages\ListSmpGoals::route('/'),
            'create' => Pages\CreateSmpGoal::route('/create'),
            'edit' => Pages\EditSmpGoal::route('/{record}/edit'),
        ];
    }
}
