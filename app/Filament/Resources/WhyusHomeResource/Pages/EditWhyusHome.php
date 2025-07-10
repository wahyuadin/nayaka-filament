<?php

namespace App\Filament\Resources\WhyusHomeResource\Pages;

use App\Filament\Resources\WhyusHomeResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditWhyusHome extends EditRecord
{
    protected static string $resource = WhyusHomeResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
