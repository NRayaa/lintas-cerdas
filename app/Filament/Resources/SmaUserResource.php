<?php

namespace App\Filament\Resources;

use App\Filament\Resources\SmaUserResource\Pages;
use App\Filament\Resources\SmaUserResource\RelationManagers;
use App\Models\SmaUser;
use App\Models\User;
use Filament\Forms;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class SmaUserResource extends Resource
{
    protected static ?string $model = SmaUser::class;

    protected static ?string $navigationLabel = 'User SMA';

    protected static ?string $navigationGroup = 'Sekolah Menengah Atas';

    protected static ?string $navigationIcon = 'heroicon-o-users';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make('User Details')
                ->schema([
                    TextInput::make('name')
                        ->label('Nama')
                        ->required()
                        ->maxLength(255),

                    TextInput::make('email')
                        ->label('Email')
                        ->email()
                        ->unique('sma_users', 'email', ignoreRecord: true)
                        ->required(),

                    TextInput::make('external_id')
                        ->label('External ID')
                        ->numeric()
                        ->default(fn() => (User::max('id') ?? 0) + 1)
                        ->readOnly()
                        ->required(),
                ]),

            Section::make('Security')
                ->schema([
                    TextInput::make('password')
                        ->label('Password')
                        ->password()
                        ->required()
                    //->hiddenOn('edit'), Sembunyikan saat edit agar tidak mengubah password tanpa sengaja
                ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('external_id')->label('External ID')->sortable(),
                TextColumn::make('name')->label('Nama')->searchable(),
                TextColumn::make('email')->label('Email')->searchable(),
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
            'index' => Pages\ListSmaUsers::route('/'),
            'create' => Pages\CreateSmaUser::route('/create'),
            'edit' => Pages\EditSmaUser::route('/{record}/edit'),
        ];
    }
}
