<?php

namespace App\Filament\Clusters\Mappings\Resources\MappingResource\Pages;

use App\Filament\Clusters\Mappings\Resources\MappingResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditMapping extends EditRecord
{
    protected static string $resource = MappingResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
