<?php

namespace App\Filament\Resources\PartnerKamiResource\Pages;

use App\Filament\Resources\PartnerKamiResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListPartnerKamis extends ListRecords
{
    protected static string $resource = PartnerKamiResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
