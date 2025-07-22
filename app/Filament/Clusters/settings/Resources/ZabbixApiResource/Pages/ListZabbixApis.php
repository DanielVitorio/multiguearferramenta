<?php

namespace App\Filament\Clusters\settings\Resources\ZabbixApiResource\Pages;

use App\Filament\Clusters\settings\Resources\ZabbixApiResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListZabbixApis extends ListRecords
{
    protected static string $resource = ZabbixApiResource::class;

    protected function getHeaderActions(): array
    {
        return [

        ];
    }
}
