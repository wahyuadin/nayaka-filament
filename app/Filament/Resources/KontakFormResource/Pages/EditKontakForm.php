<?php

namespace App\Filament\Resources\KontakFormResource\Pages;

use App\Filament\Resources\KontakFormResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditKontakForm extends EditRecord
{
    protected static string $resource = KontakFormResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
