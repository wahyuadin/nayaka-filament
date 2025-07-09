<?php

namespace App\Filament\Resources\SlideHomeResource\Pages;

use App\Filament\Resources\SlideHomeResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListSlideHomes extends ListRecords
{
    protected static string $resource = SlideHomeResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
