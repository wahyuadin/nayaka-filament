<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ProdukResource\Pages;
use App\Models\Produk;
use Filament\Forms;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Filament\Forms\Components\Toggle;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\ToggleColumn;
use Mohamedsabil83\FilamentFormsTinyeditor\Components\TinyEditor;

class ProdukResource extends Resource
{
    protected static ?string $model = Produk::class;
    protected static ?string $navigationGroup = 'Home';
    protected static ?int $navigationSort = 7;
    protected static ?string $navigationIcon = 'heroicon-o-table-cells';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('title')
                    ->required()
                    ->columnSpanFull()
                    ->label('Judul')
                    ->placeholder('Masukkan judul produk')
                    ->maxLength(255),
                TinyEditor::make('description')
                    ->required()
                    ->label('Deskripsi')
                    ->placeholder('Masukkan deskripsi produk')
                    ->columnSpanFull(),
                FileUpload::make('image')
                    ->image()
                    ->required()
                    ->label('Gambar Produk')
                    ->placeholder('Unggah gambar produk')
                    ->acceptedFileTypes(['image/*'])
                    ->maxSize(3072) // 3MB
                    ->preserveFilenames()
                    ->directory('produk')
                    ->imageEditor()
                    ->imageEditorAspectRatios([
                        null,
                        '16:9',
                        '4:3',
                        '1:1',
                    ])
                    ->columnSpanFull(),
                TextInput::make('width_image')
                    ->label('Lebar Gambar')
                    ->placeholder('Masukkan lebar gambar produk')
                    ->numeric()
                    ->minValue(0)
                    ->maxValue(10000)
                    ->default(800)
                    ->helperText('Lebar gambar dalam piksel.'),
                TextInput::make('height_image')
                    ->label('Tinggi Gambar')
                    ->placeholder('Masukkan tinggi gambar produk')
                    ->numeric()
                    ->minValue(0)
                    ->maxValue(10000)
                    ->default(600)
                    ->helperText('Tinggi gambar dalam piksel.'),
                TinyEditor::make('content')
                    ->required()
                    ->label('Konten')
                    ->placeholder('Masukkan konten produk')
                    ->columnSpanFull(),
                Toggle::make('is_active')
                    ->required()
                    ->default(true)
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('title')
                    ->searchable()
                    ->sortable()
                    ->label('Judul Produk'),
                TextColumn::make('description')
                    ->toggleable(isToggledHiddenByDefault: true)
                    ->html(),
                IconColumn::make('is_active')
                    ->boolean()
                    ->sortable(),
                ImageColumn::make('image'),
                TextColumn::make('created_at')
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
            'index' => Pages\ListProduks::route('/'),
            'create' => Pages\CreateProduk::route('/create'),
            'edit' => Pages\EditProduk::route('/{record}/edit'),
        ];
    }

    public static function canDelete($record = null): bool
    {
        return true;
    }
}
