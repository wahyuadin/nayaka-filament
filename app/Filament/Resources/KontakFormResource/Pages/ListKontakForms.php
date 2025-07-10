<?php

namespace App\Filament\Resources\KontakFormResource\Pages;

use App\Filament\Resources\KontakFormResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListKontakForms extends ListRecords
{
    protected static string $resource = KontakFormResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
