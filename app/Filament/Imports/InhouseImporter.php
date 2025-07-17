<?php

namespace App\Filament\Imports;

use App\Models\Inhouse;
use Filament\Actions\Imports\ImportColumn;
use Filament\Actions\Imports\Importer;
use Filament\Actions\Imports\Models\Import;

class InhouseImporter extends Importer
{
    protected static ?string $model = Inhouse::class;

    public static function getColumns(): array
    {
        return [
            ImportColumn::make('kota_id')
                ->requiredMapping()
                ->numeric()
                ->rules(['required', 'integer']),
            ImportColumn::make('kode_faskes')
                ->rules(['max:255']),
            ImportColumn::make('nama_mitra')
                ->requiredMapping()
                ->rules(['required', 'max:255']),
            ImportColumn::make('alamat')
                ->requiredMapping()
                ->rules(['required']),
            ImportColumn::make('telepon')
                ->rules(['max:255']),
            ImportColumn::make('fasilitas')
                ->rules(['max:255']),
        ];
    }

    public function resolveRecord(): ?Inhouse
    {
        // return Inhouse::firstOrNew([
        //     // Update existing records, matching them by `$this->data['column_name']`
        //     'email' => $this->data['email'],
        // ]);

        return new Inhouse();
    }

    public static function getCompletedNotificationBody(Import $import): string
    {
        $body = 'Your inhouse import has completed and ' . number_format($import->successful_rows) . ' ' . str('row')->plural($import->successful_rows) . ' imported.';

        if ($failedRowsCount = $import->getFailedRowsCount()) {
            $body .= ' ' . number_format($failedRowsCount) . ' ' . str('row')->plural($failedRowsCount) . ' failed to import.';
        }

        return $body;
    }
}
