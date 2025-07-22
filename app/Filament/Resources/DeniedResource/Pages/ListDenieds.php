<?php

namespace App\Filament\Resources\DeniedResource\Pages;

use App\Filament\Resources\DeniedResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListDenieds extends ListRecords
{
    protected static string $resource = DeniedResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
