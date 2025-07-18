<?php

namespace App\Filament\Imports;

use App\Models\Kategori;
use Filament\Actions\Imports\ImportColumn;
use Filament\Actions\Imports\Importer;
use Filament\Actions\Imports\Models\Import;

class KategoriImporter extends Importer
{
    protected static ?string $model = Kategori::class;

    public static function getColumns(): array
    {
        return [
            ImportColumn::make('nama_kategori')
                ->requiredMapping()
                ->rules(['required', 'max:255']),
            ImportColumn::make('description')
                ->rules(['max:255']),
        ];
    }

    public function resolveRecord(): ?Kategori
    {
        return new Kategori([
            'nama_kategori' => $this->data['nama_kategori'] ?? null,
            'description' => $this->data['description'] ?? null,
        ]);

        return new Kategori();
    }

    public static function getCompletedNotificationBody(Import $import): string
    {
        $body = 'Your kategori import has completed and ' . number_format($import->successful_rows) . ' ' . str('row')->plural($import->successful_rows) . ' imported.';

        if ($failedRowsCount = $import->getFailedRowsCount()) {
            $body .= ' ' . number_format($failedRowsCount) . ' ' . str('row')->plural($failedRowsCount) . ' failed to import.';
        }

        return $body;
    }
}
