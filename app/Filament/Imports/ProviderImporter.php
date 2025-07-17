<?php

namespace App\Filament\Imports;

use App\Models\Provider;
use Filament\Actions\Imports\ImportColumn;
use Filament\Actions\Imports\Importer;
use Filament\Actions\Imports\Models\Import;

class ProviderImporter extends Importer
{
    protected static ?string $model = Provider::class;

    public static function getColumns(): array
    {
        return [
            ImportColumn::make('nama_mitra')
                ->requiredMapping()
                ->rules(['required', 'max:255']),
            ImportColumn::make('kota_id')
                ->requiredMapping()
                ->numeric()
                ->rules(['required', 'integer']),
            ImportColumn::make('alamat')
                ->requiredMapping()
                ->rules(['required', 'max:255']),
            ImportColumn::make('telepon')
                ->rules(['max:255']),
            ImportColumn::make('fasilitas')
                ->requiredMapping()
                ->rules(['required', 'max:255']),
            ImportColumn::make('pemanfaatan_peserta')
                ->rules(['nullable', 'max:255']),
            ImportColumn::make('cob')
                ->boolean()
                ->rules(['boolean', 'nullable']),
        ];
    }

    public function resolveRecord(): ?Provider
    {
        // return Provider::firstOrNew([
        //     // Update existing records, matching them by `$this->data['column_name']`
        //     'email' => $this->data['email'],
        // ]);

        return new Provider();
    }

    public static function getCompletedNotificationBody(Import $import): string
    {
        $body = 'Your provider import has completed and ' . number_format($import->successful_rows) . ' ' . str('row')->plural($import->successful_rows) . ' imported.';

        if ($failedRowsCount = $import->getFailedRowsCount()) {
            $body .= ' ' . number_format($failedRowsCount) . ' ' . str('row')->plural($failedRowsCount) . ' failed to import.';
        }

        return $body;
    }
}
