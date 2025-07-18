<?php

namespace App\Filament\Resources;

use App\Filament\Resources\TimManagementResource\Pages;
use App\Filament\Resources\TimManagementResource\RelationManagers;
use App\Models\TimManagement;
use Filament\Forms;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Mohamedsabil83\FilamentFormsTinyeditor\Components\TinyEditor;

class TimManagementResource extends Resource
{
    protected static ?string $model = TimManagement::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('title')
                    ->required()
                    ->placeholder('Masukan Title')
                    ->label('Judul')
                    ->maxLength(255),
                TextInput::make('deskripsi')
                    ->required()
                    ->placeholder('Masukan Deskripsi'),
                FileUpload::make('image') // kolom image ganti jadi multiple
                    ->image()
                    // ->multiple()
                    ->directory('tim_management')
                    ->reorderable()
                    // ->avatar()
                    ->imageEditor()
                    ->imageEditorAspectRatios([
                        null,
                        '16:9',
                        '4:3',
                        '1:1',
                    ])
                    ->preserveFilenames()
                    ->columnSpanFull()
                    ->required(),
                TinyEditor::make('komisaris_direksi')
                    ->label('komisaris Direksi')
                    ->required()
                    ->placeholder('Masukan Konten Foto')
                    ->columnSpanFull()
                    ->maxLength(65535),
                TinyEditor::make('senior_manager')
                    ->label('Senior Manager')
                    ->required()
                    ->placeholder('Masukan Konten Foto')
                    ->columnSpanFull()
                    ->maxLength(65535),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('title')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('deskripsi')
                    ->searchable()
                    ->limit(50)
                    ->sortable(),
                ImageColumn::make('image')
                    ->sortable(),
                TextColumn::make('komisaris_direksi')
                    ->html()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('senior_manager')
                    ->html()
                    ->toggleable(isToggledHiddenByDefault: true),
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
            'index' => Pages\ListTimManagement::route('/'),
            'create' => Pages\CreateTimManagement::route('/create'),
            'edit' => Pages\EditTimManagement::route('/{record}/edit'),
        ];
    }
}
