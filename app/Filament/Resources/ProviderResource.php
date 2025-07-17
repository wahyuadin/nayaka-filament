<?php

namespace App\Filament\Resources;

use App\Filament\Exports\ClinicExporter;
use App\Filament\Imports\ProviderImporter;
use App\Filament\Resources\ProviderResource\Pages;
use App\Models\Provider;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Filament\Tables\Actions\ExportAction;
use Filament\Tables\Actions\ImportAction;

class ProviderResource extends Resource
{
    protected static ?string $model = Provider::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('nama_mitra')
                    ->required()
                    ->columnSpanFull()
                    ->placeholder('Nama Mitra')
                    ->maxLength(255),
                Textarea::make('alamat')
                    ->required()
                    ->placeholder('Alamat')
                    ->rows(3)
                    ->columnSpanFull()
                    ->maxLength(255),
                Select::make('kota_id')
                    ->required()
                    ->relationship('kota', 'nama')
                    ->searchable()
                    ->preload()
                    ->label('Kota')
                    ->placeholder('Pilih Kota'),
                TextInput::make('telepon')
                    ->tel()
                    ->placeholder('Telepon')
                    ->nullable()
                    ->maxLength(255),
                TextInput::make('fasilitas')
                    ->required()
                    ->placeholder('Fasilitas')
                    ->maxLength(255),
                TextInput::make('pemanfaatan_peserta')
                    ->required()
                    ->placeholder('Pemanfaatan Peserta')
                    ->maxLength(255),
                Toggle::make('cob')
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('nama_mitra')
                    ->searchable(),
                TextColumn::make('kota.nama')
                    ->label('Kota')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('alamat')
                    ->searchable()
                    ->sortable()
                    ->limit(50),
                TextColumn::make('telepon')
                    ->searchable(),
                TextColumn::make('fasilitas')
                    ->sortable()
                    ->searchable(),
                TextColumn::make('pemanfaatan_peserta')
                    ->searchable(),
                IconColumn::make('cob')
                    ->sortable()
                    ->boolean(),
                TextColumn::make('created_at')
                    ->label('Dibuat pada')
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
                ImportAction::make()->importer(ProviderImporter::class),
                ExportAction::make()->exporter(ClinicExporter::class)
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
            'index' => Pages\ListProviders::route('/'),
            // 'create' => Pages\CreateProvider::route('/create'),
            'edit' => Pages\EditProvider::route('/{record}/edit'),
        ];
    }
}
