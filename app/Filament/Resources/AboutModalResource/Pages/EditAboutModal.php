<?php

namespace App\Filament\Resources\AboutModalResource\Pages;

use App\Filament\Resources\AboutModalResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditAboutModal extends EditRecord
{
    protected static string $resource = AboutModalResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
