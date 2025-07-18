<?php

namespace App\Filament\Imports;

use App\Models\Kota;
use Filament\Actions\Imports\ImportColumn;
use Filament\Actions\Imports\Importer;
use Filament\Actions\Imports\Models\Import;

class KotaImporter extends Importer
{
    protected static ?string $model = Kota::class;

    public static function getColumns(): array
    {
        return [
            ImportColumn::make('nama')
                ->requiredMapping()
                ->label('Nama Kota')
                ->rules([
                    'required',
                    'string',
                    'max:255',
                    'unique:kotas,nama',
                ]),
        ];
    }

    public function resolveRecord(): ?Kota
    {
        // return Kota::firstOrNew([
        //     // Update existing records, matching them by `$this->data['column_name']`
        //     'email' => $this->data['email'],
        // ]);

        return new Kota();
    }

    public static function getCompletedNotificationBody(Import $import): string
    {
        $body = 'Your kota import has completed and ' . number_format($import->successful_rows) . ' ' . str('row')->plural($import->successful_rows) . ' imported.';

        if ($failedRowsCount = $import->getFailedRowsCount()) {
            $body .= ' ' . number_format($failedRowsCount) . ' ' . str('row')->plural($failedRowsCount) . ' failed to import.';
        }

        return $body;
    }
}
