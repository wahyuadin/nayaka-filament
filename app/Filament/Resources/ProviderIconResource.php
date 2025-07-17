<?php

namespace App\Filament\Resources;

use App\Filament\Exports\ProviderMitraExporter;
use App\Filament\Resources\ProviderIconResource\Pages;
use App\Filament\Resources\ProviderIconResource\RelationManagers;
use App\Models\ProviderIcon;
use Filament\Forms;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Actions\ExportAction;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ProviderIconResource extends Resource
{
    protected static ?string $model = ProviderIcon::class;

    protected static ?string $navigationIcon = 'heroicon-o-user-group';
    protected static ?string $navigationGroup = 'Home';
    protected static ?int $navigationSort = 5;
    protected static ?string $pluralModelLabel = 'Provider Icon';
    protected static ?string $navigationLabel = 'Provider Icon';
    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                FileUpload::make('image')
                    ->required()
                    // ->avatar()
                    ->imageEditor()
                    ->imageEditorAspectRatios([
                        null,
                        '16:9',
                        '4:3',
                        '1:1',
                    ])
                    ->columnSpanFull()
                    ->reorderable()
                    ->directory('provider')
                    ->image(),
                Toggle::make('is_active')
                    ->required()
                    ->default(true)
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                ImageColumn::make('image'),
                IconColumn::make('is_active')
                    ->boolean(),
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
            'index' => Pages\ListProviderIcons::route('/'),
            // 'create' => Pages\CreateProviderIcon::route('/create'),
            'edit' => Pages\EditProviderIcon::route('/{record}/edit'),
        ];
    }

    // public static function canCreate(): bool
    // {
    //     if (ProviderIcon::count()) {
    //         return false;
    //     }

    //     return true;
    // }
}
