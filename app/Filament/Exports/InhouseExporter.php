<?php

namespace App\Filament\Exports;

use App\Models\Inhouse;
use Filament\Actions\Exports\ExportColumn;
use Filament\Actions\Exports\Exporter;
use Filament\Actions\Exports\Models\Export;

class InhouseExporter extends Exporter
{
    protected static ?string $model = Inhouse::class;

    public static function getColumns(): array
    {
        return [
            ExportColumn::make('id')
                ->label('ID'),
            ExportColumn::make('kota_id'),
            ExportColumn::make('kode_faskes'),
            ExportColumn::make('nama_mitra'),
            ExportColumn::make('alamat'),
            ExportColumn::make('telepon'),
            ExportColumn::make('fasilitas'),
            ExportColumn::make('created_at'),
            ExportColumn::make('updated_at'),
        ];
    }

    public static function getCompletedNotificationBody(Export $export): string
    {
        $body = 'Your inhouse export has completed and ' . number_format($export->successful_rows) . ' ' . str('row')->plural($export->successful_rows) . ' exported.';

        if ($failedRowsCount = $export->getFailedRowsCount()) {
            $body .= ' ' . number_format($failedRowsCount) . ' ' . str('row')->plural($failedRowsCount) . ' failed to export.';
        }

        return $body;
    }
}
