<?php

namespace App\Filament\Resources;

use App\Filament\Resources\LeadManagementResource\Pages;
use App\Filament\Resources\LeadManagementResource\RelationManagers;
use App\Models\LeadManagement;
use Filament\Forms;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Actions\BulkActionGroup;
use Filament\Tables\Actions\DeleteBulkAction;
use Filament\Tables\Actions\EditAction;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;


class LeadManagementResource extends Resource
{
    protected static ?string $model = LeadManagement::class;
    // Di LeadManagementResource.php
    protected static ?string $navigationGroup = 'Home';
    // SlideHomeResource.php
    protected static ?int $navigationSort = 2;
    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                FileUpload::make('image') // kolom image ganti jadi multiple
                    ->image()
                    // ->multiple()
                    // ->avatar()
                    ->imageEditor()
                    ->imageEditorAspectRatios([
                        null,
                        '16:9',
                        '4:3',
                        '1:1',
                    ])
                    ->directory('lead-management')
                    ->reorderable()
                    ->preserveFilenames()
                    ->downloadable()
                    ->disk('public')
                    ->columnSpanFull()
                    ->required(),

                Toggle::make('is_active')
                    ->required()
                    ->default(true),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                ImageColumn::make('image')
                    ->label('Gambar'),
                IconColumn::make('is_active')
                    ->boolean()
                    ->sortable()
                    ->label('is Active'),
                TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: false)
                    ->label('Dibuat Pada'),
                TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->actions([
                EditAction::make()
                    ->label('Edit')
                    ->icon('heroicon-m-pencil'),
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
            'index' => Pages\ListLeadManagement::route('/'),
            // 'create' => Pages\CreateLeadManagement::route('/create'),
            'edit' => Pages\EditLeadManagement::route('/{record}/edit'),
        ];
    }
}
