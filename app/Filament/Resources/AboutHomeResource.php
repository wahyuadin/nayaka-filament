<?php

namespace App\Filament\Resources;

use App\Filament\Resources\AboutHomeResource\Pages;
use App\Filament\Resources\AboutHomeResource\RelationManagers;
use App\Models\AboutHome;
use Filament\Forms;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Split;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Mohamedsabil83\FilamentFormsTinyeditor\Components\TinyEditor;

class AboutHomeResource extends Resource
{
    protected static ?string $model = AboutHome::class;

    protected static ?string $navigationIcon = 'heroicon-o-home-modern';
    protected static ?string $navigationGroup = 'About';
    protected static ?int $navigationSort = 3;
    protected static ?string $pluralModelLabel = 'Page About Home';
    protected static ?string $navigationLabel = 'Home';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make([
                    TextInput::make('label')
                        ->required()
                        ->maxLength(255)
                        ->placeholder('Masukan Thumbnail')
                        ->label('Thumbnail'),

                    TextInput::make('title')
                        ->required()
                        ->maxLength(255)
                        ->placeholder('Masukan Judul')
                        ->label('Judul'),
                    TinyEditor::make('description')
                        ->required()
                        ->label('Deskripsi')
                ]),
                Section::make([
                    FileUpload::make('image')
                        ->image()
                        ->required()
                        ->label('Gambar'),
                ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('label')
                    ->searchable()
                    ->label('Thumnail'),
                TextColumn::make('title')
                    ->searchable(),
                TextColumn::make('description')
                    ->limit(100),
                ImageColumn::make('image'),
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
            'index' => Pages\ListAboutHomes::route('/'),
            'create' => Pages\CreateAboutHome::route('/create'),
            'edit' => Pages\EditAboutHome::route('/{record}/edit'),
        ];
    }

    public static function canCreate(): bool
    {
        if (AboutHome::count()) {
            return false;
        }

        return true;
    }
}
