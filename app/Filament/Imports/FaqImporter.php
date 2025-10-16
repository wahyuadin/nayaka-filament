<?php

namespace App\Filament\Imports;

use App\Models\Faq;
use Filament\Actions\Imports\ImportColumn;
use Filament\Actions\Imports\Importer;
use Filament\Actions\Imports\Models\Import;

class FaqImporter extends Importer
{
    protected static ?string $model = Faq::class;

    public static function getColumns(): array
    {
        return [
            ImportColumn::make('pertanyaan')
                ->requiredMapping()
                ->rules(['required']),
            ImportColumn::make('jawaban')
                ->requiredMapping()
                ->rules(['required']),
        ];
    }

    public function resolveRecord(): ?Faq
    {
        // return Faq::firstOrNew([
        //     // Update existing records, matching them by `$this->data['column_name']`
        //     'email' => $this->data['email'],
        // ]);

        return new Faq();
    }

    public static function getCompletedNotificationBody(Import $import): string
    {
        $body = 'Your faq import has completed and ' . number_format($import->successful_rows) . ' ' . str('row')->plural($import->successful_rows) . ' imported.';

        if ($failedRowsCount = $import->getFailedRowsCount()) {
            $body .= ' ' . number_format($failedRowsCount) . ' ' . str('row')->plural($failedRowsCount) . ' failed to import.';
        }

        return $body;
    }
}
