<?php

namespace App\Filament\Resources;

use App\Filament\Exports\KontakExporter;
use App\Filament\Resources\KontakResource\Pages;
use App\Filament\Resources\KontakResource\RelationManagers;
use App\Models\Kontak;
use Filament\Forms;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Actions\ExportAction;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class KontakResource extends Resource
{
    protected static ?string $model = Kontak::class;

    protected static ?string $navigationIcon = 'heroicon-o-user-group';
    protected static ?string $navigationGroup = 'Master';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('title')
                    ->required()
                    ->placeholder('Masukan Title')
                    ->columnSpanFull()
                    ->maxLength(255),
                Textarea::make('address')
                    ->placeholder('Masukan Alamat')
                    ->required()
                    ->columnSpanFull()
                    ->maxLength(255),
                Repeater::make('email')
                    ->label('Masukan Email')
                    ->schema([
                        TextInput::make('email')
                            ->label('Email')
                            ->placeholder('Masukan Email')
                            ->required()
                            ->email()
                            ->maxLength(255),
                    ])
                    ->minItems(1)
                    ->maxItems(5)
                    ->columns(1)
                    ->required()
                    ->reorderable(false),
                Repeater::make('telp')
                    ->label('Nomor Telepon')
                    ->schema([
                        TextInput::make('nomor')
                            ->label('No. Telp')
                            ->placeholder('Masukan No Telp')
                            ->required()
                            ->maxLength(255),
                    ])
                    ->minItems(1)
                    ->maxItems(5)
                    ->columns(1)
                    ->required()
                    ->reorderable(false),
                Textarea::make('google_maps')
                    ->required()
                    ->columnSpanFull()
                    ->placeholder('Masukan Link Google Maps')
                    ->rows(5),
                Toggle::make('is_active')
                    ->required()
                    ->default(1),
                Toggle::make('is_pusat')
                    ->rule(function () {
                        return function ($attribute, $value, $fail) {
                            if ($value === true && \App\Models\Kontak::where('is_pusat', true)->exists()) {
                                $fail('Sudah ada kontak pusat.');
                            }
                        };
                    })
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('title')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('address')
                    ->searchable()
                    ->sortable()
                    ->limit(50),
                TextColumn::make('email')
                    ->searchable()
                    ->toggleable(isToggledHiddenByDefault: true)
                    ->limit(20),
                TextColumn::make('telp')
                    ->searchable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('google_maps')
                    ->searchable()
                    ->limit(20),
                IconColumn::make('is_active')
                    ->boolean()
                    ->sortable(),
                IconColumn::make('is_pusat')
                    ->boolean()
                    ->sortable(),
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
            ->headerActions([
                ExportAction::make()->exporter(KontakExporter::class)
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
            'index' => Pages\ListKontaks::route('/'),
            // 'create' => Pages\CreateKontak::route('/create'),
            'edit' => Pages\EditKontak::route('/{record}/edit'),
        ];
    }
}
