<?php

namespace App\Filament\Resources\DepartementCarrierResource\Pages;

use App\Filament\Resources\DepartementCarrierResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditDepartementCarrier extends EditRecord
{
    protected static string $resource = DepartementCarrierResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
