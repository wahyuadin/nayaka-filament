<?php

namespace App\Filament\Resources;

use App\Filament\Exports\DepartemenCarrierExporter;
use App\Filament\Imports\DepartemenCarrierImporter;
use App\Filament\Resources\DepartementCarrierResource\Pages;
use App\Models\DepartementCarrier;
use Filament\Tables\Actions\ImportAction;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Actions\ExportAction;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class DepartementCarrierResource extends Resource
{
    protected static ?string $model = DepartementCarrier::class;

    protected static ?string $navigationIcon = 'heroicon-o-building-office-2';
    protected static ?string $navigationGroup = 'Master';
    protected static ?string $label = 'Departement';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')
                    ->required()
                    ->maxLength(255)
                    ->columnSpanFull()
                    ->placeholder('Masukan Nama Departement'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->searchable(),
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
                    // Tables\Actions\DeleteBulkAction::make(),

                ]),
            ])
            ->headerActions([
                ExportAction::make()->exporter(DepartemenCarrierExporter::class),
                ImportAction::make()->importer(DepartemenCarrierImporter::class)
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function canDelete(Model $record): bool
    {
        return  false;
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListDepartementCarriers::route('/'),
            // 'create' => Pages\CreateDepartementCarrier::route('/create'),
            'edit' => Pages\EditDepartementCarrier::route('/{record}/edit'),
        ];
    }
}
