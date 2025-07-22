<?php

namespace App\Filament\TI\Resources\DeniedResource\Pages;

use App\Filament\TI\Resources\DeniedResource;
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
