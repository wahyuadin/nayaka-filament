<?php

namespace App\Filament\Resources;

use App\Filament\Resources\KontakFormResource\Pages;
use App\Filament\Resources\KontakFormResource\RelationManagers;
use App\Models\KontakForm;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class KontakFormResource extends Resource
{
    protected static ?string $model = KontakForm::class;
    protected static ?string $pluralModelLabel = 'Form Kritik & Saran';
    protected static ?string $navigationLabel = 'Kritik & Saran';
    protected static ?string $navigationIcon = 'heroicon-o-megaphone';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('nama')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('email')
                    ->email()
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('subjek')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('pesan')
                    ->required()
                    ->maxLength(255),
                Forms\Components\Toggle::make('dibaca')
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('nama')
                    ->searchable(),
                Tables\Columns\TextColumn::make('email')
                    ->searchable(),
                Tables\Columns\TextColumn::make('subjek')
                    ->searchable(),
                Tables\Columns\TextColumn::make('pesan')
                    ->searchable(),
                Tables\Columns\IconColumn::make('dibaca')
                    ->boolean(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
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
            'index' => Pages\ListKontakForms::route('/'),
            // 'create' => Pages\CreateKontakForm::route('/create'),
            // 'edit' => Pages\EditKontakForm::route('/{record}/edit'),
        ];
    }

    public static function canCreate(): bool
    {

        return false;
    }
}
