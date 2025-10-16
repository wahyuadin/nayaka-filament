<?php

namespace App\Filament\Imports;

use App\Models\DepartemenCarrier;
use App\Models\DepartementCarrier;
use Filament\Actions\Imports\ImportColumn;
use Filament\Actions\Imports\Importer;
use Filament\Actions\Imports\Models\Import;

class DepartemenCarrierImporter extends Importer
{
    protected static ?string $model = DepartementCarrier::class;

    public static function getColumns(): array
    {
        return [
            ImportColumn::make('name')
                ->requiredMapping()
                ->rules(['required']),
        ];
    }

    public function resolveRecord(): ?DepartementCarrier
    {
        // return DepartementCarrier::firstOrNew([
        //     // Update existing records, matching them by `$this->data['column_name']`
        //     'email' => $this->data['email'],
        // ]);

        return new DepartementCarrier();
    }

    public static function getCompletedNotificationBody(Import $import): string
    {
        $body = 'Your departemen carrier import has completed and ' . number_format($import->successful_rows) . ' ' . str('row')->plural($import->successful_rows) . ' imported.';

        if ($failedRowsCount = $import->getFailedRowsCount()) {
            $body .= ' ' . number_format($failedRowsCount) . ' ' . str('row')->plural($failedRowsCount) . ' failed to import.';
        }

        return $body;
    }
}
