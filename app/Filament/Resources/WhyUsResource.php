<?php

namespace App\Filament\Resources;

use App\Filament\Resources\WhyUsResource\Pages;
use App\Filament\Resources\WhyUsResource\RelationManagers;
use App\Models\WhyUs;
use Filament\Forms;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Mohamedsabil83\FilamentFormsTinyeditor\Components\TinyEditor;

class WhyUsResource extends Resource
{
    protected static ?string $model = WhyUs::class;
    protected static ?string $navigationGroup = 'Home';
    protected static ?int $navigationSort = 5;
    protected static ?string $navigationIcon = 'heroicon-o-cursor-arrow-ripple';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('title')
                    ->required()
                    ->placeholder('Masukan Judul')
                    ->columnSpanFull()
                    ->maxLength(255),
                TinyEditor::make('content')
                    ->required()
                    ->label('Deskripsi')
                    ->columnSpanFull(),
                FileUpload::make('image')
                    ->image()
                    ->columnSpanFull()
                    ->downloadable()
                    ->directory('why-us')
                    ->imageEditor()
                    ->imageEditorAspectRatios([
                        null,
                        '16:9',
                        '4:3',
                        '1:1',
                    ])
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('title')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('content')
                    ->html()
                    ->searchable()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
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
            'index' => Pages\ListWhyUs::route('/'),
            // 'create' => Pages\CreateWhyUs::route('/create'),
            'edit' => Pages\EditWhyUs::route('/{record}/edit'),
        ];
    }

    public static function canCreate(): bool
    {
        if (WhyUs::count() > 0) {
            return false;
        }

        return true;
    }

    public static function canDelete(Model $record): bool
    {
        return false; // Prevent deletion of WhyUs records
    }
}
