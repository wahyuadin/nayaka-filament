<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ShortcutResource\Pages;
use App\Filament\Resources\ShortcutResource\RelationManagers;
use App\Models\Shortcut;
use Filament\Forms;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Actions\BulkActionGroup;
use Filament\Tables\Actions\DeleteBulkAction;
use Filament\Tables\Actions\EditAction;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ShortcutResource extends Resource
{
    protected static ?string $model = Shortcut::class;

    protected static ?string $navigationIcon = 'heroicon-o-puzzle-piece';
    protected static ?string $navigationGroup = 'Home';
    protected static ?int $navigationSort = 11;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('title')
                    ->required()
                    ->placeholder('Masukan Judul')
                    ->label('Judul')
                    ->maxLength(255),
                TextInput::make('class')
                    ->required()
                    ->placeholder('Masukan Class CSS')
                    ->label('CSS Class')
                    ->maxLength(255),
                TextInput::make('link')
                    ->required()
                    ->placeholder('Masukan Link')
                    ->label('Link')
                    ->maxLength(255),
                TextInput::make('icon')
                    ->required()
                    ->placeholder('Masukan Icon')
                    ->label('Icon')
                    ->maxLength(255),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('title')
                    ->searchable(),
                TextColumn::make('icon'),
                TextColumn::make('link'),
                TextColumn::make('class')
                    ->label('CSS Class'),
                TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->actions([
                EditAction::make(),
            ])
            ->bulkActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
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
            'index' => Pages\ListShortcuts::route('/'),
            // 'create' => Pages\CreateShortcut::route('/create'),
            'edit' => Pages\EditShortcut::route('/{record}/edit'),
        ];
    }
}
