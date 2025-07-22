<?php

namespace App\Filament\Resources\SendNotificationsResource\Pages;

use App\Filament\Resources\SendNotificationsResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListSendNotifications extends ListRecords
{
    protected static string $resource = SendNotificationsResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
