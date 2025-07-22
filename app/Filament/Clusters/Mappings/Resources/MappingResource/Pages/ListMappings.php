<?php

namespace App\Filament\Clusters\Mappings\Resources\MappingResource\Pages;

use App\Filament\Clusters\Mappings\Resources\MappingResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListMappings extends ListRecords
{
    protected static string $resource = MappingResource::class;

    protected function getHeaderActions(): array
    {
        return [
        ];
    }
}
