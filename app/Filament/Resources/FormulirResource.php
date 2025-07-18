<?php

namespace App\Filament\Resources;

use App\Filament\Resources\FormulirResource\Pages\EditFormulir;
use App\Filament\Resources\FormulirResource\Pages\ListFormulirs;
use App\Models\Formulir;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class FormulirResource extends Resource
{
    protected static ?string $model = Formulir::class;
    protected static ?string $navigationGroup = 'Master';
    protected static ?int $navigationSort = 3;
    protected static ?string $navigationIcon = 'heroicon-o-folder-open';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('nama_formulir')
                    ->required()
                    ->label('Nama Formulir')
                    ->placeholder('Masukan Nama Formulir')
                    ->maxLength(255),
                TextInput::make('icon')
                    ->required()
                    ->label('Nama Icon')
                    ->placeholder('Masukan Nama Icon')
                    ->default('bi bi-filetype-pdf')
                    ->maxLength(255),

                FileUpload::make('file_path')
                    ->required()
                    ->label('File Path')
                    ->placeholder('Pilih file formulir...')
                    ->directory('formulir')
                    ->visibility('public')
                    ->downloadable()
                    ->columnSpanFull()
                    ->preserveFilenames()
                    ->maxSize(10240)
                    ->acceptedFileTypes(['application/pdf', 'image/jpeg', 'image/png'])
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('nama_formulir')
                    ->searchable(),
                TextColumn::make('icon')
                    ->searchable(),
                TextColumn::make('file_path')
                    ->searchable(),
                TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: false),
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
            'index' => ListFormulirs::route('/'),
            // 'create' => CreateFormulir::route('/create'),
            'edit' => EditFormulir::route('/{record}/edit'),
        ];
    }
}
