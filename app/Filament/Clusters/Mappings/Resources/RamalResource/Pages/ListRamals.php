<?php

namespace App\Filament\Clusters\Mappings\Resources\RamalResource\Pages;

use App\Filament\Clusters\Mappings\Resources\RamalResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListRamals extends ListRecords
{
    protected static string $resource = RamalResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make()
            ->label('Adicionar Ramal'),
        ];
    }
}
