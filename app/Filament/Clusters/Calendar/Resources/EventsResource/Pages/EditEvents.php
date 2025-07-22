<?php

namespace App\Filament\Clusters\Calendar\Resources\EventsResource\Pages;

use App\Filament\Clusters\Calendar\Resources\EventsResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditEvents extends EditRecord
{
    protected static string $resource = EventsResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
