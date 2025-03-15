<?php

namespace App\Filament\Resources;

use App\Filament\Resources\SmpUserResource\Pages;
use App\Filament\Resources\SmpUserResource\RelationManagers;
use App\Models\SmpUser;
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

class SmpUserResource extends Resource
{
    protected static ?string $model = SmpUser::class;

    protected static ?string $navigationLabel = 'User SMP';

    protected static ?string $navigationGroup = 'Sekolah Menengah Pertama';

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
                        ->unique('smp_users', 'email', ignoreRecord: true)
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
            'index' => Pages\ListSmpUsers::route('/'),
            'create' => Pages\CreateSmpUser::route('/create'),
            'edit' => Pages\EditSmpUser::route('/{record}/edit'),
        ];
    }
}
