<?php

namespace App\Filament\Resources\AboutModalResource\Pages;

use App\Filament\Resources\AboutModalResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListAboutModals extends ListRecords
{
    protected static string $resource = AboutModalResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
