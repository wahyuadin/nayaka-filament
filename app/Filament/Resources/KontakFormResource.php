<?php

namespace App\Filament\Resources;

use App\Filament\Exports\KontakFormExporter;
use App\Filament\Resources\KontakFormResource\Pages;
use App\Filament\Resources\KontakFormResource\RelationManagers;
use App\Models\KontakForm;
use Filament\Forms;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Actions\ExportAction;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\Filter;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class KontakFormResource extends Resource
{
    protected static ?string $model = KontakForm::class;
    protected static ?string $pluralModelLabel = 'Form Kritik & Saran';
    protected static ?string $navigationLabel = 'Kritik & Saran';
    protected static ?string $navigationIcon = 'heroicon-o-megaphone';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('nama')
                    ->disabled()
                    ->maxLength(255),
                Forms\Components\TextInput::make('email')
                    ->email()
                    ->disabled()
                    ->maxLength(255),
                Forms\Components\TextInput::make('subjek')
                    ->disabled()
                    ->maxLength(255),
                Forms\Components\TextInput::make('pesan')
                    ->disabled()
                    ->maxLength(255),
                Forms\Components\Toggle::make('dibaca')
                    ->required()
                    ->label('Selesai'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('nama')
                    ->searchable(),
                TextColumn::make('email')
                    ->searchable(),
                TextColumn::make('subjek')
                    ->searchable(),
                TextColumn::make('pesan')
                    ->searchable(),
                IconColumn::make('dibaca')
                    ->boolean()
                    ->label('Case Status')
                    ->sortable(),
                TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->label('Dibuat Pada')
                    ->toggleable(isToggledHiddenByDefault: false),
                TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                Filter::make('nama')
                ->form([
                    TextInput::make('nama')->label('Cari Nama')->placeholder('Masukan Nama'),
                ])
                ->query(function ($query, array $data) {
                    return $query->when($data['nama'], fn($q) => $q->where('nama', 'like', "%{$data['nama']}%"));
                }),
                Filter::make('email')
                ->form([
                    TextInput::make('email')->label('Cari email')->placeholder('Masukan Email'),
                ])
                ->query(function ($query, array $data) {
                    return $query->when($data['email'], fn($q) => $q->where('email', 'like', "%{$data['email']}%"));
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
                ExportAction::make()->exporter(KontakFormExporter::class),
                // ImportAction::make()->importer(KotaImporter::class)
            ]);;
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
            'index' => Pages\ListKontakForms::route('/'),
            // 'create' => Pages\CreateKontakForm::route('/create'),
            'edit' => Pages\EditKontakForm::route('/{record}/edit'),
        ];
    }

    public static function canCreate(): bool
    {
        return false;
    }

    public static function canDelete(Model $record): bool
    {
        return false;
    }

}
