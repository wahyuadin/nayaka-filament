<?php

namespace App\Filament\Exports;

use App\Models\DepartemenCarrier;
use App\Models\DepartementCarrier;
use Filament\Actions\Exports\ExportColumn;
use Filament\Actions\Exports\Exporter;
use Filament\Actions\Exports\Models\Export;

class DepartemenCarrierExporter extends Exporter
{
    protected static ?string $model = DepartementCarrier::class;

    public static function getColumns(): array
    {
        return [
            ExportColumn::make('name')
                ->formatStateUsing(fn(string $state): string => strip_tags($state)),
            ExportColumn::make('created_at'),
        ];
    }

    public static function getCompletedNotificationBody(Export $export): string
    {
        $body = 'Your departemen carrier export has completed and ' . number_format($export->successful_rows) . ' ' . str('row')->plural($export->successful_rows) . ' exported.';

        if ($failedRowsCount = $export->getFailedRowsCount()) {
            $body .= ' ' . number_format($failedRowsCount) . ' ' . str('row')->plural($failedRowsCount) . ' failed to export.';
        }

        return $body;
    }
}
