<?php

namespace App\Filament\Resources;

use App\Filament\Resources\CarrierResource\Pages;
use App\Filament\Resources\CarrierResource\RelationManagers;
use App\Models\Carrier;
use Filament\Forms;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ToggleColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Mohamedsabil83\FilamentFormsTinyeditor\Components\TinyEditor;

class CarrierResource extends Resource
{
    protected static ?string $model = Carrier::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('title')
                    ->required()
                    ->label('Job title')
                    ->placeholder('Masukan Job Title')
                    ->maxLength(255),
                Select::make('departement_id')
                    ->label('Departemen')
                    ->relationship('departement', 'name') // asumsi ada relasi 'departement'
                    ->searchable()
                    ->preload()
                    ->createOptionForm([
                        TextInput::make('name')
                            ->label('Nama Departemen')
                            ->unique()
                            ->validationMessages([
                                'unique' => 'Data sudah ada.',
                            ])
                            ->required(),
                    ])
                    ->required(),

                Select::make('location_id')
                    ->label('Penempatan')
                    ->relationship('location', 'name')
                    ->searchable()
                    ->preload()
                    ->createOptionForm([
                        TextInput::make('name')
                            ->label('Nama Penempatan')
                            ->unique()
                            ->validationMessages([
                                'unique' => 'Data sudah ada.',
                            ])
                            ->required(),
                    ])
                    ->required(),

                Select::make('pengalaman_id')
                    ->label('Pengalaman')
                    ->relationship('pengalaman', 'name')
                    ->searchable()
                    ->preload()
                    ->createOptionForm([
                        TextInput::make('name')
                            ->label('Jenis Pengalaman')
                            ->unique()
                            ->validationMessages([
                                'unique' => 'Data sudah ada.',
                            ])
                            ->required(),
                    ])
                    ->required(),
                TinyEditor::make('description')
                    ->label('Deskripsi Pekerjaan')
                    ->required()
                    ->placeholder('Masukan Deskripsi Pekerjaan')
                    ->columnSpanFull()
                    ->maxLength(65535),
                Forms\Components\Toggle::make('is_active')
                    ->label('Aktif')
                    ->default(true)
                    ->inline(false)
                    ->helperText('Tandai jika lowongan ini aktif.'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('title')
                    ->searchable(),
                TextColumn::make('departement.name')
                    ->numeric()
                    ->sortable(),
                TextColumn::make('location.name')
                    ->numeric()
                    ->sortable(),
                TextColumn::make('pengalaman.name')
                    ->numeric()
                    ->sortable(),
                TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                ToggleColumn::make('is_active')
                    ->label('Aktif')
                    ->sortable()
                    ->toggleable(),
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
            'index' => Pages\ListCarriers::route('/'),
            'create' => Pages\CreateCarrier::route('/create'),
            'edit' => Pages\EditCarrier::route('/{record}/edit'),
        ];
    }
}
