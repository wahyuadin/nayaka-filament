<?php

namespace App\Filament\Resources;

use App\Filament\Resources\KegiatanResource\Pages;
use App\Models\Kegiatan;
use Filament\Forms;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Filament\Forms\Components\Hidden;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ToggleColumn;
use Mohamedsabil83\FilamentFormsTinyeditor\Components\TinyEditor;

class KegiatanResource extends Resource
{
    protected static ?string $model = Kegiatan::class;
    protected static ?string $navigationGroup = 'Home';
    protected static ?int $navigationSort = 8;
    protected static ?string $navigationIcon = 'heroicon-o-camera';

    public static function form(Form $form): Form
    {
        return $form->schema([
            Hidden::make('user_id')->default(Auth::id()),

            Select::make('kategori_id')
                ->label('Kategori')
                ->relationship(
                    name: 'kategori',
                    titleAttribute: 'nama_kategori',
                    modifyQueryUsing: fn($query) => $query->orderBy('nama_kategori')
                )
                ->searchable()
                ->preload()
                ->required()
                ->createOptionForm([
                    TextInput::make('nama_kategori')
                        ->label('Nama Kategori')
                        ->required()
                        ->maxLength(255)
                        ->live(onBlur: true)
                        ->afterStateUpdated(function ($state, Forms\Set $set) {
                            $set('slug', Str::slug($state));
                        }),

                    TextInput::make('slug')
                        ->required()
                        ->live()
                        ->maxLength(255)
                        ->disabled()
                        ->dehydrated(),
                ]),
            TextInput::make('title')
                ->label('Judul')
                ->required()
                ->placeholder('Masukan Judul')
                ->maxLength(255)
                ->live(onBlur: true)
                ->afterStateUpdated(function (string $operation, $state, Forms\Set $set) {
                    $set('slug', Str::slug($state));
                }),

            TextInput::make('slug')
                ->required()
                ->maxLength(255)
                ->disabled()
                ->placeholder('Slug Akan Terisi Otomatis Dari Title')
                ->live()
                ->dehydrated(),
            DatePicker::make('date')
                ->label('Tanggal')
                ->default(now())
                ->disabled()
                ->dehydrated()
                ->required(),

            Select::make('tags')
                ->label('Tag')
                ->relationship('tags', 'title')
                ->searchable()
                ->preload()
                ->multiple()
                ->createOptionForm([
                    TextInput::make('title')
                        ->label('Nama Tag')
                        ->required()
                        ->maxLength(255),
                ])
                ->columnSpanFull(),

            Textarea::make('description')
                ->label('Deskripsi')
                ->required()
                ->rows(5)
                ->columnSpanFull(),

            TinyEditor::make('content')
                ->label('Konten')
                ->required()
                ->columnSpanFull(),

            FileUpload::make('image')
                ->label('Gambar')
                ->image()
                ->directory('kegiatan')
                ->required()
                ->columnSpanFull(),
            TextInput::make('width')
                ->label('Lebar Gambar')
                ->default('auto')
                ->placeholder('Masukkan lebar gambar dalam pixel')
                ->required(),
            TextInput::make('height')
                ->label('Panjang Gambar')
                ->default('auto')
                ->placeholder('Masukkan panjang gambar dalam pixel')
                ->required(),

            Toggle::make('is_active')
                ->label('Aktif')
                ->default(true),
        ]);
    }


    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('user.name')
                    ->label('User')
                    ->sortable()
                    ->searchable(),

                TextColumn::make('kategori.nama_kategori')
                    ->label('Kategori')
                    ->sortable()
                    ->searchable(),

                TextColumn::make('title')
                    ->label('Judul')
                    ->searchable(),

                TextColumn::make('kategori.nama_kategori')
                    ->label('Kategori')
                    ->sortable(),

                TextColumn::make('tags.title')
                    ->label('Tag')
                    ->badge() // tampilkan sebagai badge
                    ->separator(', ') // pisahkan dengan koma
                    ->limit(3) // maksimal 3 tag ditampilkan
                    ->sortable(),

                TextColumn::make('date')
                    ->label('Tanggal')
                    ->date()
                    ->sortable(),

                ToggleColumn::make('is_active')
                    ->label('Aktif')
                    ->sortable(),

                TextColumn::make('created_at')
                    ->label('Dibuat')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),

                TextColumn::make('updated_at')
                    ->label('Diperbarui')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListKegiatans::route('/'),
            'create' => Pages\CreateKegiatan::route('/create'),
            'edit' => Pages\EditKegiatan::route('/{record}/edit'),
        ];
    }
}
