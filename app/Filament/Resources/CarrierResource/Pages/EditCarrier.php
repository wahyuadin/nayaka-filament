<?php

namespace App\Filament\Resources\CarrierResource\Pages;

use App\Filament\Resources\CarrierResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditCarrier extends EditRecord
{
    protected static string $resource = CarrierResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
