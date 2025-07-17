<?php

namespace App\Filament\Resources;

use App\Filament\Exports\InhouseExporter;
use App\Filament\Imports\InhouseImporter;
use App\Filament\Resources\InhouseResource\Pages;
use App\Models\Inhouse;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables\Actions\BulkActionGroup;
use Filament\Tables\Actions\DeleteBulkAction;
use Filament\Tables\Actions\EditAction;
use Filament\Tables\Actions\ExportAction;
use Filament\Tables\Actions\ImportAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\Filter;
use Filament\Tables\Table;

class InhouseResource extends Resource
{
    protected static ?string $model = Inhouse::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('kode_faskes')
                    ->maxLength(255)
                    ->required()
                    ->unique(Inhouse::class, 'kode_faskes')
                    ->placeholder('Masukan Kode Faskes'),
                Select::make('kota_id')
                    ->required()
                    ->relationship('kota', 'nama')
                    ->searchable()
                    ->placeholder('Pilih Kota')
                    ->preload(),
                TextInput::make('nama_mitra')
                    ->required()
                    ->placeholder('Masukan Nama Mitra')
                    ->columnSpanFull()
                    ->maxLength(255),
                Textarea::make('alamat')
                    ->placeholder('Masukan Alamat')
                    ->required()
                    ->columnSpanFull(),
                TextInput::make('telepon')
                    ->tel()
                    ->placeholder('Masukan Telepon')
                    ->maxLength(255),
                TextInput::make('fasilitas')
                    ->placeholder('Masukan Fasilitas')
                    ->maxLength(255),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('kota.nama')
                    ->sortable(),
                TextColumn::make('kode_faskes')
                    ->searchable(),
                TextColumn::make('nama_mitra')
                    ->searchable(),
                TextColumn::make('telepon')
                    ->searchable(),
                TextColumn::make('fasilitas')
                    ->searchable(),
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
                Filter::make('kota')
                    ->form([
                        TextInput::make('nama')
                            ->label('Cari Nama Kota')
                            ->placeholder('Masukkan nama kota')
                            ->maxLength(255),
                    ])
                    ->query(function ($query, array $data) {
                        return $query->when($data['nama'], function ($q) use ($data) {
                            return $q->whereHas('kota', function ($q2) use ($data) {
                                $q2->where('nama', 'like', '%' . $data['nama'] . '%');
                            });
                        });
                    }),


                Filter::make('created_from')
                    ->form([
                        DatePicker::make('created_from')->label('Dari Tanggal'),
                        DatePicker::make('created_until')->label('Sampai Tanggal'),
                    ])
                    ->query(function ($query, array $data) {
                        return $query
                            ->when($data['created_from'], fn($q) => $q->whereDate('created_at', '>=', $data['created_from']))
                            ->when($data['created_until'], fn($q) => $q->whereDate('created_at', '<=', $data['created_until']));
                    }),
            ])
            ->headerActions([
                ImportAction::make()->importer(InhouseImporter::class),
                ExportAction::make()->exporter(InhouseExporter::class)
            ])
            ->actions([
                EditAction::make(),
            ])
            ->bulkActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
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
            'index' => Pages\ListInhouses::route('/'),
            // 'create' => Pages\CreateInhouse::route('/create'),
            'edit' => Pages\EditInhouse::route('/{record}/edit'),
        ];
    }
}
