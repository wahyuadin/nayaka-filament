<?php

namespace App\Filament\Resources\TimManagementResource\Pages;

use App\Filament\Resources\TimManagementResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditTimManagement extends EditRecord
{
    protected static string $resource = TimManagementResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
