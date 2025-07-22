<?php

namespace App\Filament\TI\Resources\ApprovedResource\Pages;

use App\Filament\TI\Resources\ApprovedResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListApproveds extends ListRecords
{
    protected static string $resource = ApprovedResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
