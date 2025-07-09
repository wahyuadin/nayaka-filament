<?php

namespace App\Filament\Resources\AboutHomeResource\Pages;

use App\Filament\Resources\AboutHomeResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditAboutHome extends EditRecord
{
    protected static string $resource = AboutHomeResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
