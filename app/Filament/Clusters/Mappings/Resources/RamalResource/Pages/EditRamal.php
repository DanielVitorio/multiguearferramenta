<?php

namespace App\Filament\Clusters\Mappings\Resources\RamalResource\Pages;

use App\Filament\Clusters\Mappings\Resources\RamalResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditRamal extends EditRecord
{
    protected static string $resource = RamalResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
