<?php

namespace App\Filament\Resources;

use App\Filament\Resources\SlideHomeResource\Pages;
use App\Models\SlideHome;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Actions\BulkActionGroup;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Model;

class SlideHomeResource extends Resource
{
    protected static ?string $model = SlideHome::class;

    protected static ?string $navigationIcon = 'heroicon-o-photo'; // atau 'heroicon-o-presentation-chart-bar'
    protected static ?string $modelLabel = 'Slider';
    protected static ?string $pluralModelLabel = 'Data Slide Awal';
    protected static ?string $navigationLabel = 'Slide';
    protected static ?string $navigationGroup = 'Home';
    protected static ?int $navigationSort = 1;


    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('nama')
                    ->required()
                    ->columnSpanFull()
                    ->placeholder('Masukan Nama')
                    ->maxLength(255),
                FileUpload::make('image')
                    ->image()
                    ->columnSpanFull()
                    ->downloadable()
                    ->directory('slide')
                    ->imageEditor()
                    ->imageEditorAspectRatios([
                        null,
                        '16:9',
                        '4:3',
                        '1:1',
                    ])
                    ->required(),
                Toggle::make('first_slide')
                    ->label('Tampilan Slide Pertama')
                    ->helperText('Aktifkan untuk menampilkan slide ini di halaman beranda')
                    ->default(true)
                    ->disabled(function ($state, $get, $set, $livewire) {
                        $recordId = method_exists($livewire, 'getRecord') && $livewire->getRecord()
                            ? $livewire->getRecord()->id
                            : null;

                        return \App\Models\SlideHome::where('first_slide', true)
                            ->when($recordId, function ($query) use ($recordId) {
                                $query->where('id', '!=', $recordId);
                            })
                            ->exists();
                    }),
                Toggle::make('is_active')
                    ->label('Is Active')
                    ->helperText('Aktifkan untuk menampilkan slide ini di halaman beranda')
                    ->required()
                    ->default(true),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('nama')
                    ->searchable()
                    ->sortable(),
                ImageColumn::make('image')
                    ->label('Image'),
                IconColumn::make('is_active')
                    ->boolean()
                    ->sortable(),
                IconColumn::make('first_slide')
                    ->boolean()
                    ->sortable(),
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
                BulkActionGroup::make([
                    // DeleteBulkAction::make(),
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
            'index' => Pages\ListSlideHomes::route('/'),
            // 'create' => Pages\CreateSlideHome::route('/create'),
            'edit' => Pages\EditSlideHome::route('/{record}/edit'),
        ];
    }

    public static function canDelete(Model $record): bool
    {
        return false;
    }
}
