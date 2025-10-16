<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PartnerKamiResource\Pages;
use App\Models\PartnerKami;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class PartnerKamiResource extends Resource
{
    protected static ?string $model = PartnerKami::class;

    protected static ?string $navigationIcon = 'heroicon-o-hand-raised';
    protected static ?string $pluralModelLabel = 'Data Slide Awal';
    protected static ?string $navigationLabel = 'Partner';
    protected static ?string $navigationGroup = 'Home';
    protected static ?int $navigationSort = 4;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                FileUpload::make('image') // kolom image ganti jadi multiple
                    ->image()
                    // ->multiple()
                    ->directory('partner')
                    ->reorderable()
                    // ->avatar()
                    ->imageEditor()
                    ->imageEditorAspectRatios([
                        null,
                        '16:9',
                        '4:3',
                        '1:1',
                    ])
                    ->downloadable()
                    ->maxSize(1024)
                    ->preserveFilenames()
                    ->columnSpanFull()
                    ->required(),
                TextInput::make('widht')
                    ->label('Lebar Gambar')
                    ->placeholder('Masukkan lebar gambar produk')
                    ->minValue(0)
                    ->maxValue(10000)
                    ->required()
                    ->default('-')
                    ->helperText('Lebar gambar dalam piksel.'),
                TextInput::make('height')
                    ->label('Tinggi Gambar')
                    ->placeholder('Masukkan tinggi gambar produk')
                    ->minValue(0)
                    ->required()
                    ->maxValue(10000)
                    ->default('-')
                    ->helperText('Tinggi gambar dalam piksel.'),
                Toggle::make('is_active')
                    ->required()
                    ->columnSpanFull()
                    ->helperText('Lebar Gambar Portrait Rekomendasi Lebar: - Panjang: 68px. Landscape Lebar: 50px Lebar: -')
                    ->default(true),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                ImageColumn::make('image'),
                IconColumn::make('is_active')
                    ->boolean()
                    ->sortable(),
                TextColumn::make('height'),
                TextColumn::make('widht'),
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
            // 'create' => Pages\CreatePartnerKami::route('/create'),
            'edit' => Pages\EditPartnerKami::route('/{record}/edit'),
        ];
    }
}
