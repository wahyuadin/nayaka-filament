<?php

namespace App\Filament\Resources\DepartementCarrierResource\Pages;

use App\Filament\Resources\DepartementCarrierResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListDepartementCarriers extends ListRecords
{
    protected static string $resource = DepartementCarrierResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
