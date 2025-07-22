<?php

namespace App\Filament\Resources\ApprovedResource\Pages;

use App\Filament\Resources\ApprovedResource;
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
