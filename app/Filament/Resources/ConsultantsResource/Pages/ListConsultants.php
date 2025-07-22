<?php

namespace App\Filament\Resources\ConsultantsResource\Pages;

use App\Filament\Resources\ConsultantsResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListConsultants extends ListRecords
{
    protected static string $resource = ConsultantsResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
