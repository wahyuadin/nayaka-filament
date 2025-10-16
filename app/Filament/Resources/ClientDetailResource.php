<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ClientDetailResource\Pages;
use App\Models\ClientDetail;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Model;

class ClientDetailResource extends Resource
{
    protected static ?string $model = ClientDetail::class;

    protected static ?string $navigationIcon = 'heroicon-o-document-magnifying-glass';
    protected static ?string $pluralModelLabel = 'Data Slide Awal';
    protected static ?string $navigationLabel = 'Client Detail';
    protected static ?string $navigationGroup = 'Home';
    protected static ?int $navigationSort = 4;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                FileUpload::make('image') // kolom image ganti jadi multiple
                    ->image()
                    ->multiple()
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
                Toggle::make('is_active')
                    ->required()
                    ->columnSpanFull()
                    ->helperText('Gambar bisa diupload secara multiple')
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
                    // Tables\Actions\DeleteBulkAction::make(),
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
            'index' => Pages\ListClientDetails::route('/'),
            // 'create' => Pages\CreateClientDetail::route('/create'),
            'edit' => Pages\EditClientDetail::route('/{record}/edit'),
        ];
    }

    public static function canCreate(): bool
    {
        if (ClientDetail::count()) {
            return false;
        }

        return true;
    }
}
