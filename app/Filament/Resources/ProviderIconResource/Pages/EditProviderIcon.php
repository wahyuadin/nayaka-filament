<?php

namespace App\Filament\Resources\ProviderIconResource\Pages;

use App\Filament\Resources\ProviderIconResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditProviderIcon extends EditRecord
{
    protected static string $resource = ProviderIconResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
