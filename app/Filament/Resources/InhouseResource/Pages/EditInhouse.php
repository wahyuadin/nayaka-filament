<?php

namespace App\Filament\Resources\InhouseResource\Pages;

use App\Filament\Resources\InhouseResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditInhouse extends EditRecord
{
    protected static string $resource = InhouseResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
