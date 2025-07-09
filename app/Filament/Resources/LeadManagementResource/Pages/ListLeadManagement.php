<?php

namespace App\Filament\Resources\LeadManagementResource\Pages;

use App\Filament\Resources\LeadManagementResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListLeadManagement extends ListRecords
{
    protected static string $resource = LeadManagementResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
