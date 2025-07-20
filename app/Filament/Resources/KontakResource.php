<?php

namespace App\Filament\Resources;

use App\Filament\Resources\KontakResource\Pages;
use App\Filament\Resources\KontakResource\RelationManagers;
use App\Models\Kontak;
use Filament\Forms;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class KontakResource extends Resource
{
    protected static ?string $model = Kontak::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('title')
                    ->required()
                    ->placeholder('Masukan Title')
                    ->maxLength(255),
                TextInput::make('email')
                    ->email()
                    ->placeholder('Masukan Email')
                    ->required()
                    ->maxLength(255),
                Textarea::make('address')
                    ->required()
                    ->columnSpanFull()
                    ->rows(5)
                    ->placeholder('Masukan Address')
                    ->maxLength(255),
                Repeater::make('telp')
                    ->label('Nomor Telepon')
                    ->columnSpanFull()
                    ->schema([
                        TextInput::make('nomor')
                            ->label('No. Telp')
                            ->placeholder('Masukan No Telp')
                            ->required()
                            ->maxLength(255),
                    ])
                    ->minItems(1)
                    ->maxItems(5)
                    ->columns(1)
                    ->required()
                    ->reorderable(false),
                Textarea::make('google_maps')
                    ->required()
                    ->columnSpanFull()
                    ->placeholder('Masukan Link Google Maps')
                    ->rows(5),
                Toggle::make('is_active')
                    ->required()
                    ->default(1),
                Toggle::make('is_pusat')
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('title')
                    ->searchable(),
                Tables\Columns\TextColumn::make('address')
                    ->searchable(),
                Tables\Columns\TextColumn::make('email')
                    ->searchable(),
                Tables\Columns\TextColumn::make('telp')
                    ->searchable(),
                Tables\Columns\TextColumn::make('google_maps')
                    ->searchable(),
                Tables\Columns\IconColumn::make('is_active')
                    ->boolean(),
                Tables\Columns\IconColumn::make('is_pusat')
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
            'index' => Pages\ListKontaks::route('/'),
            // 'create' => Pages\CreateKontak::route('/create'),
            'edit' => Pages\EditKontak::route('/{record}/edit'),
        ];
    }
}
