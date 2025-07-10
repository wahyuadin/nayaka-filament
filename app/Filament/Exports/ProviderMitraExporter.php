<?php

namespace App\Filament\Exports;

use App\Models\ProviderMitra;
use Filament\Actions\Exports\ExportColumn;
use Filament\Actions\Exports\Exporter;
use Filament\Actions\Exports\Models\Export;

class ProviderMitraExporter extends Exporter
{
    protected static ?string $model = ProviderMitra::class;

    public static function getColumns(): array
    {
        return [
            ExportColumn::make('kota.nama')->label('Kota'),
            ExportColumn::make('nama_mitra'),
            ExportColumn::make('alamat'),
            ExportColumn::make('telp'),
            ExportColumn::make('fasilitas'),
            ExportColumn::make('pemanfaatan_peserta'),
            ExportColumn::make('cob'),
            ExportColumn::make('created_at'),
        ];
    }

    public static function getCompletedNotificationBody(Export $export): string
    {
        $body = 'Your provider mitra export has completed and ' . number_format($export->successful_rows) . ' ' . str('row')->plural($export->successful_rows) . ' exported.';

        if ($failedRowsCount = $export->getFailedRowsCount()) {
            $body .= ' ' . number_format($failedRowsCount) . ' ' . str('row')->plural($failedRowsCount) . ' failed to export.';
        }

        return $body;
    }
}
