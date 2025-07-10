<?php

namespace App\Filament\Exports;

use App\Models\KontakForm;
use Filament\Actions\Exports\ExportColumn;
use Filament\Actions\Exports\Exporter;
use Filament\Actions\Exports\Models\Export;

class KontakFormExporter extends Exporter
{
    protected static ?string $model = KontakForm::class;

    public static function getColumns(): array
    {
        return [
            // ExportColumn::make('id')
            //     ->label('ID'),
            ExportColumn::make('nama'),
            ExportColumn::make('email'),
            ExportColumn::make('subjek'),
            ExportColumn::make('pesan'),
            ExportColumn::make('dibaca')->label('Case Status'),
            ExportColumn::make('created_at')->label('Dibuat Pada'),
            // ExportColumn::make('updated_at'),
        ];
    }

    public static function getCompletedNotificationBody(Export $export): string
    {
        $body = 'Your kontak form export has completed and ' . number_format($export->successful_rows) . ' ' . str('row')->plural($export->successful_rows) . ' exported.';

        if ($failedRowsCount = $export->getFailedRowsCount()) {
            $body .= ' ' . number_format($failedRowsCount) . ' ' . str('row')->plural($failedRowsCount) . ' failed to export.';
        }

        return $body;
    }
}
