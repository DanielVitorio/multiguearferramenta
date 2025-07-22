<?php

namespace App\Filament\Clusters\Calendar\Resources\EventsResource\Pages;

use App\Filament\Clusters\Calendar\Resources\EventsResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateEvents extends CreateRecord
{
    protected static string $resource = EventsResource::class;
}
