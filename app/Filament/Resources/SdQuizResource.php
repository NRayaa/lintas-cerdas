<?php

namespace App\Filament\Resources;

use App\Filament\Resources\SdQuizResource\Pages;
use App\Filament\Resources\SdQuizResource\RelationManagers;
use App\Models\SdQuestion;
use App\Models\SdQuiz;
use Carbon\Carbon;
use Filament\Forms;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Repeater;
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
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class SdQuizResource extends Resource
{
    protected static ?string $model = SdQuiz::class;

    protected static ?string $navigationLabel = 'Quiz';

    protected static ?string $navigationGroup = 'Sekolah Dasar';

    protected static ?string $navigationIcon = 'heroicon-o-trophy';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make('General')
                    ->schema([
                        TextInput::make('name')
                            ->label('Judul Quiz')
                            ->required(),

                        TextInput::make('external_id')
                            ->label('External ID')
                            ->numeric()
                            ->default(fn() => (SdQuiz::max('external_id') ?? 0) + 1)
                            ->readOnly()
                            ->required(),
                    ]),

                Section::make('Deskripsi')
                    ->schema([
                        Textarea::make('content')
                            ->label('Isi Deskripsi')
                            ->columnSpanFull(),
                    ]),

                Section::make('Status')
                    ->schema([
                        Toggle::make('is_active')
                            ->label('Active')
                            ->default(true),
                    ]),

                Section::make('Waktu Pengerjaan')
                    ->schema([
                        DatePicker::make('start_date')
                            ->label('Tanggal Mulai')
                            ->nullable(),

                        DatePicker::make('end_date')
                            ->label('Tanggal Selesai')
                            ->nullable(),
                    ])
                    ->columns(2),

                // Repeater untuk pertanyaan (SdQuestion)
                Section::make('Pertanyaan')
                    ->schema([
                        Repeater::make('sdQuestions')
                            ->relationship('sdQuestions')
                            ->schema([
                                TextInput::make('name')
                                    ->label('Pertanyaan')
                                    ->required()
                                    ->columnSpanFull(),

                                Select::make('answer')
                                    ->label('Jawaban Benar')
                                    ->helperText('Pilih jawaban yang benar')
                                    ->options([
                                        'A' => 'A',
                                        'B' => 'B',
                                        'C' => 'C',
                                        'D' => 'D',
                                    ])
                                    ->required()
                                    ->searchable()
                                    ->columnSpanFull(),

                                TextInput::make('a')
                                    ->label('Option A')
                                    ->required(),

                                TextInput::make('b')
                                    ->label('Option B')
                                    ->required(),

                                TextInput::make('c')
                                    ->label('Option C')
                                    ->required(),

                                TextInput::make('d')
                                    ->label('Option D')
                                    ->required(),
                            ])
                            ->columns(2)
                            // ->orderable()
                            ->collapsible(),
                    ])
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')
                    ->label('Nama Quiz')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('total_questions')
                    ->label('Total Question')
                    ->getStateUsing(fn($record) => SdQuestion::where('sd_quiz_id', $record->id)->count())
                    ->sortable(),

                ToggleColumn::make('is_active')
                    ->label('Active'),

                TextColumn::make('start_date')
                    ->label('Start Date')
                    ->sortable()
                    ->formatStateUsing(
                        fn($record) =>
                        $record->getAttribute('start_date')
                            ? Carbon::parse($record->getAttribute('start_date'))->format('Y-m-d')
                            : 'Tidak ada batas mulai'
                    ),

                TextColumn::make('end_date')
                    ->label('End Date')
                    ->sortable()
                    ->formatStateUsing(
                        fn($record) =>
                        $record->getAttribute('end_date')
                            ? Carbon::parse($record->getAttribute('end_date'))->format('Y-m-d')
                            : 'Tidak ada batas akhir'
                    ),

            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\Action::make('Result')
                ->label('List Hasil Siswa')
                ->url(fn ($record) => SdQuizResource::getUrl('hasil', ['record' => $record->id])),
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
            'index' => Pages\ListSdQuizzes::route('/'),
            'create' => Pages\CreateSdQuiz::route('/create'),
            'edit' => Pages\EditSdQuiz::route('/{record}/edit'),
            'hasil' => Pages\ResultQuiz::route('/{record}/result'),
        ];
    }
}
