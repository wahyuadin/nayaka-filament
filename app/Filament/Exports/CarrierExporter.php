<?php

namespace App\Filament\Exports;

use App\Models\Carrier;
use Filament\Actions\Exports\ExportColumn;
use Filament\Actions\Exports\Exporter;
use Filament\Actions\Exports\Models\Export;

class CarrierExporter extends Exporter
{
    protected static ?string $model = Carrier::class;

    public static function getColumns(): array
    {
        return [
            // ExportColumn::make('id')
            //     ->label('ID'),
            ExportColumn::make('title')
                ->label('Jabatan'),
            ExportColumn::make('departement.name')
                ->label('Departemen'),
            ExportColumn::make('location.name')
                ->label('Lokasi'),
            ExportColumn::make('pengalaman.name')
                ->label('Pengalaman'),
            ExportColumn::make('created_at')
            ->label('Dibuat Pada'),
            // ExportColumn::make('updated_at'),
        ];
    }

    public static function getCompletedNotificationBody(Export $export): string
    {
        $body = 'Your carrier export has completed and ' . number_format($export->successful_rows) . ' ' . str('row')->plural($export->successful_rows) . ' exported.';

        if ($failedRowsCount = $export->getFailedRowsCount()) {
            $body .= ' ' . number_format($failedRowsCount) . ' ' . str('row')->plural($failedRowsCount) . ' failed to export.';
        }

        return $body;
    }
}
