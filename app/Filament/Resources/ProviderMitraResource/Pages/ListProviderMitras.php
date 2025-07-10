<?php

namespace App\Filament\Resources\ProviderMitraResource\Pages;

use App\Filament\Resources\ProviderMitraResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListProviderMitras extends ListRecords
{
    protected static string $resource = ProviderMitraResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
