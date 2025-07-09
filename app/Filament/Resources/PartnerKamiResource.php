<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PartnerKamiResource\Pages;
use App\Filament\Resources\PartnerKamiResource\RelationManagers;
use App\Models\PartnerKami;
use Filament\Forms;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class PartnerKamiResource extends Resource
{
    protected static ?string $model = PartnerKami::class;

    protected static ?string $navigationIcon = 'heroicon-o-hand-raised';
    protected static ?string $pluralModelLabel = 'Data Slide Awal';
    protected static ?string $navigationLabel = 'Partner';
    protected static ?string $navigationGroup = 'Home';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                FileUpload::make('image') // kolom image ganti jadi multiple
                    ->image()
                    ->multiple()
                    ->directory('lead-management')
                    ->reorderable()
                    ->preserveFilenames()
                    ->disk('public')
                    ->required(),

                Toggle::make('is_active')
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                ImageColumn::make('image'),
                IconColumn::make('is_active')
                    ->boolean(),
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
            'index' => Pages\ListPartnerKamis::route('/'),
            'create' => Pages\CreatePartnerKami::route('/create'),
            'edit' => Pages\EditPartnerKami::route('/{record}/edit'),
        ];
    }
}
