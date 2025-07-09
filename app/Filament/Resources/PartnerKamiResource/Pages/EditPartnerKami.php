<?php

namespace App\Filament\Resources\PartnerKamiResource\Pages;

use App\Filament\Resources\PartnerKamiResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditPartnerKami extends EditRecord
{
    protected static string $resource = PartnerKamiResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
