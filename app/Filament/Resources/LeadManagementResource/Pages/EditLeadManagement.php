<?php

namespace App\Filament\Resources\LeadManagementResource\Pages;

use App\Filament\Resources\LeadManagementResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditLeadManagement extends EditRecord
{
    protected static string $resource = LeadManagementResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
