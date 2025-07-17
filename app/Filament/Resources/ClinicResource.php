<?php

namespace App\Filament\Resources;

use App\Filament\Exports\ClinicExporter;
use App\Filament\Imports\ClinicImporter;
use App\Filament\Resources\ClinicResource\Pages;
use App\Models\Clinic;
use Filament\Tables\Actions\EditAction;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables\Actions\BulkActionGroup;
use Filament\Tables\Actions\DeleteBulkAction;
use Filament\Tables\Actions\ExportAction;
use Filament\Tables\Actions\ImportAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\Filter;
use Filament\Tables\Table;

class ClinicResource extends Resource
{
    protected static ?string $model = Clinic::class;
    protected static ?int $navigationSort = 2;
    protected static ?string $navigationGroup = 'Master';
    protected static ?string $navigationIcon = 'heroicon-o-building-office-2';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('kode_faskes')
                    ->required()
                    ->placeholder('Masukan Kode Faskes')
                    ->maxLength(255),
                Select::make('kota_id')
                    ->label('Kota')
                    ->relationship('kota', 'nama')
                    ->searchable()
                    ->placeholder('Pilih Kota')
                    ->preload()
                    ->required(),
                TextInput::make('nama_mitra')
                    ->required()
                    ->placeholder('Masukan Nama Mitra')
                    ->maxLength(255),
                TextInput::make('alamat')
                    ->required()
                    ->placeholder('Masukan Alamat')
                    ->maxLength(255),
                TextInput::make('telp')
                    ->tel()
                    ->label('Telepon')
                    ->placeholder('Masukan Nomor Telepon')
                    ->required()
                    ->maxLength(255),
                TextInput::make('fasilitas')
                    ->required()
                    ->placeholder('Masukan Fasilitas')
                    ->maxLength(255),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('kode_faskes')
                    ->searchable(),
                TextColumn::make('kota.nama')
                    ->numeric()
                    ->sortable(),
                TextColumn::make('nama_mitra')
                    ->searchable(),
                TextColumn::make('alamat')
                    ->searchable()
                    ->limit(50),
                TextColumn::make('telp')
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
            ->actions([
                EditAction::make(),
            ])
            ->bulkActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ])
            ->headerActions([
                ImportAction::make()->importer(ClinicImporter::class),
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
            'index' => Pages\ListClinics::route('/'),
            // 'create' => Pages\CreateClinic::route('/create'),
            'edit' => Pages\EditClinic::route('/{record}/edit'),
        ];
    }
}
