<?php

namespace App\Filament\Resources;

use App\Filament\Resources\SlideHomeResource\Pages;
use App\Filament\Resources\SlideHomeResource\RelationManagers;
use App\Models\SlideHome;
use Filament\Actions\Action;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class SlideHomeResource extends Resource
{
    protected static ?string $model = SlideHome::class;

    protected static ?string $navigationIcon = 'heroicon-o-photo'; // atau 'heroicon-o-presentation-chart-bar'
    protected static ?string $modelLabel = 'Slider';
    protected static ?string $pluralModelLabel = 'Data Slide Awal';
    protected static ?string $navigationLabel = 'Slide';
    protected static ?string $navigationGroup = 'Home';
    protected static ?int $navigationSort = 1;


    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('nama')
                    ->required()
                    ->maxLength(255),
                Forms\Components\FileUpload::make('image')
                    ->image()
                    ->required(),
                Forms\Components\Toggle::make('is_active')
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('nama')
                    ->searchable(),
                Tables\Columns\ImageColumn::make('image'),
                Tables\Columns\IconColumn::make('is_active')
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
            'index' => Pages\ListSlideHomes::route('/'),
            'create' => Pages\CreateSlideHome::route('/create'),
            'edit' => Pages\EditSlideHome::route('/{record}/edit'),
        ];
    }
}
