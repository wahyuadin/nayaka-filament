<?php

namespace App\Filament\Resources;

use App\Filament\Exports\ProviderMitraExporter;
use App\Filament\Imports\ProviderMitraImporter;
use App\Filament\Resources\ProviderMitraResource\Pages;
use App\Filament\Resources\ProviderMitraResource\RelationManagers;
use App\Models\ProviderMitra;
use Filament\Forms;
use Filament\Forms\Components\Select;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Actions\ExportAction;
use Filament\Tables\Actions\ImportAction;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ProviderMitraResource extends Resource
{
    protected static ?string $model = ProviderMitra::class;
    protected static ?string $navigationGroup = 'Provider';
    protected static ?int $navigationSort = 7;
    protected static ?string $navigationIcon = 'heroicon-o-users';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Select::make('kota_id')
                    ->relationship('kota', 'nama')
                    ->label('Kota')
                    ->searchable()
                    ->preload()
                    ->required(),
                Forms\Components\TextInput::make('nama_mitra')
                    ->required()
                    ->maxLength(255),
                Forms\Components\Textarea::make('alamat')
                    ->required()
                    ->columnSpanFull(),
                Forms\Components\TextInput::make('telp')
                    ->tel()
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('fasilitas')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('pemanfaatan_peserta')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('cob')
                    ->required()
                    ->maxLength(255),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('kota.nama')
                    ->label('Kota')
                    ->sortable(),
                Tables\Columns\TextColumn::make('nama_mitra')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('telp')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('fasilitas')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('pemanfaatan_peserta')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('cob')
                    ->searchable()
                    ->sortable(),
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
            ])
            ->headerActions([
                ExportAction::make()->exporter(ProviderMitraExporter::class),
                ImportAction::make()->importer(ProviderMitraImporter::class)
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
            'index' => Pages\ListProviderMitras::route('/'),
            // 'create' => Pages\CreateProviderMitra::route('/create'),
            'edit' => Pages\EditProviderMitra::route('/{record}/edit'),
        ];
    }
}
