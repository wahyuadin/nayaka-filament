<?php

namespace App\Filament\Resources\ClientDetailResource\Pages;

use App\Filament\Resources\ClientDetailResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListClientDetails extends ListRecords
{
    protected static string $resource = ClientDetailResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
