<?php

namespace App\Filament\Imports;

use App\Models\Kontak;
use Filament\Actions\Imports\ImportColumn;
use Filament\Actions\Imports\Importer;
use Filament\Actions\Imports\Models\Import;

class KontakImporter extends Importer
{
    protected static ?string $model = Kontak::class;

    public static function getColumns(): array
    {
        return [
            ImportColumn::make('title')
                ->requiredMapping()
                ->rules(['required', 'max:255']),
            ImportColumn::make('address')
                ->requiredMapping()
                ->rules(['required', 'max:255']),
            ImportColumn::make('email')
                ->requiredMapping()
                ->rules(['required', 'email', 'max:255']),
            ImportColumn::make('telp')
                ->requiredMapping()
                ->rules(['required', 'max:255']),
            ImportColumn::make('google_maps')
                ->requiredMapping()
                ->rules(['required', 'max:255']),
            ImportColumn::make('is_active')
                ->requiredMapping()
                ->boolean()
                ->rules(['required', 'boolean']),
            ImportColumn::make('is_pusat')
                ->requiredMapping()
                ->boolean()
                ->rules(['required', 'boolean']),
        ];
    }

    public function resolveRecord(): ?Kontak
    {
        // return Kontak::firstOrNew([
        //     // Update existing records, matching them by `$this->data['column_name']`
        //     'email' => $this->data['email'],
        // ]);

        return new Kontak();
    }

    public static function getCompletedNotificationBody(Import $import): string
    {
        $body = 'Your kontak import has completed and ' . number_format($import->successful_rows) . ' ' . str('row')->plural($import->successful_rows) . ' imported.';

        if ($failedRowsCount = $import->getFailedRowsCount()) {
            $body .= ' ' . number_format($failedRowsCount) . ' ' . str('row')->plural($failedRowsCount) . ' failed to import.';
        }

        return $body;
    }
}
