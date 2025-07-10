<?php

namespace App\Filament\Resources\WhyusHomeResource\Pages;

use App\Filament\Resources\WhyusHomeResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListWhyusHomes extends ListRecords
{
    protected static string $resource = WhyusHomeResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
