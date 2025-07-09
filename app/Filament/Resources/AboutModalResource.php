<?php

namespace App\Filament\Resources;

use App\Filament\Resources\AboutModalResource\Pages;
use App\Filament\Resources\AboutModalResource\RelationManagers;
use App\Models\AboutModal;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Mohamedsabil83\FilamentFormsTinyeditor\Components\TinyEditor;

class AboutModalResource extends Resource
{
    protected static ?string $model = AboutModal::class;

    protected static ?string $navigationIcon = 'heroicon-o-document-duplicate';
    protected static ?string $navigationGroup = 'About';
    protected static ?int $navigationSort = 4;
    protected static ?string $pluralModelLabel = 'Page About Modal';
    protected static ?string $navigationLabel = 'Modal';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TinyEditor::make('content')
                    ->required()
                    ->label('Konten')
                    ->columnSpanFull(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('content')->limit(50),
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
            'index' => Pages\ListAboutModals::route('/'),
            'create' => Pages\CreateAboutModal::route('/create'),
            'edit' => Pages\EditAboutModal::route('/{record}/edit'),
        ];
    }

    public static function canCreate(): bool
    {
        if (AboutModal::count()) {
            return false;
        }

        return true;
    }
}
