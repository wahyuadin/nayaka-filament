<?php

namespace App\Filament\Imports;

use App\Models\ProviderMitra;
use Filament\Actions\Imports\ImportColumn;
use Filament\Actions\Imports\Importer;
use Filament\Actions\Imports\Models\Import;

class ProviderMitraImporter extends Importer
{
    protected static ?string $model = ProviderMitra::class;

    public static function getColumns(): array
    {
        return [
            ImportColumn::make('kota_id')
                ->requiredMapping()
                ->numeric()
                ->rules(['required', 'integer']),
            ImportColumn::make('nama_mitra')
                ->requiredMapping()
                ->rules(['required', 'max:255']),
            ImportColumn::make('alamat')
                ->requiredMapping()
                ->rules(['required']),
            ImportColumn::make('telp')
                ->requiredMapping()
                ->rules(['required', 'max:255']),
            ImportColumn::make('fasilitas')
                ->requiredMapping()
                ->rules(['required', 'max:255']),
            ImportColumn::make('pemanfaatan_peserta')
                ->requiredMapping()
                ->rules(['required', 'max:255']),
            ImportColumn::make('cob')
                ->requiredMapping()
                ->rules(['required', 'max:255']),
        ];
    }

    public function resolveRecord(): ?ProviderMitra
    {
        // return ProviderMitra::firstOrNew([
        //     // Update existing records, matching them by `$this->data['column_name']`
        //     'email' => $this->data['email'],
        // ]);

        return new ProviderMitra();
    }

    public static function getCompletedNotificationBody(Import $import): string
    {
        $body = 'Your provider mitra import has completed and ' . number_format($import->successful_rows) . ' ' . str('row')->plural($import->successful_rows) . ' imported.';

        if ($failedRowsCount = $import->getFailedRowsCount()) {
            $body .= ' ' . number_format($failedRowsCount) . ' ' . str('row')->plural($failedRowsCount) . ' failed to import.';
        }

        return $body;
    }
}
