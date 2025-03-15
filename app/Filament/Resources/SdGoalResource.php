<?php

namespace App\Filament\Resources;

use App\Filament\Resources\SdGoalResource\Pages;
use App\Filament\Resources\SdGoalResource\RelationManagers;
use App\Models\SdGoal;
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

class SdGoalResource extends Resource
{
    protected static ?string $model = SdGoal::class;

    protected static ?string $navigationLabel = 'Tujuan';

    protected static ?string $navigationGroup = 'Sekolah Dasar';

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
                            ->default(fn() => (SdGoal::withTrashed()->max('external_id') ?? 0) + 1)
                            ->readOnly()
                            ->required(),
                    ]),

                Section::make('Status')
                    ->schema([
                        Toggle::make('is_active')
                            ->label('Aktif')
                            ->default(true)
                            ->afterStateUpdated(
                                fn($state, $set) =>
                                $state ? SdGoal::where('is_active', true)->update(['is_active' => false]) : null
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
                        // Kirim ke API toggle status
                        $response = \Illuminate\Support\Facades\Http::withHeaders([
                            'X-API-KEY' => env('API_KEY'),
                        ])->post(env('API_URL') . '/goal/' . $record->external_id . '/toggle');

                        if ($response->failed()) {
                            throw new \Exception('Gagal mengupdate status di API: ' . $response->body());
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
            'index' => Pages\ListSdGoals::route('/'),
            'create' => Pages\CreateSdGoal::route('/create'),
            'edit' => Pages\EditSdGoal::route('/{record}/edit'),
        ];
    }
}
