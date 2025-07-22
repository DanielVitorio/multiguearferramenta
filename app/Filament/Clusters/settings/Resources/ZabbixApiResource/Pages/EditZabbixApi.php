<?php

namespace App\Filament\Clusters\settings\Resources\ZabbixApiResource\Pages;

use App\Filament\Clusters\settings\Resources\ZabbixApiResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditZabbixApi extends EditRecord
{
    protected static string $resource = ZabbixApiResource::class;

    protected function getHeaderActions(): array
    {
        return [
           
        ];
    }
}
