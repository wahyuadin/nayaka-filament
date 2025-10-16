<?php

namespace App\Filament\Resources\ClientDetailResource\Pages;

use App\Filament\Resources\ClientDetailResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditClientDetail extends EditRecord
{
    protected static string $resource = ClientDetailResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
