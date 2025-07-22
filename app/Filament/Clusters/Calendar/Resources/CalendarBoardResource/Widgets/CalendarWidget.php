<?php

namespace App\Filament\Clusters\Calendar\Resources\CalendarBoardResource\Widgets;

use App\Filament\Clusters\Calendar\Resources\EventsResource;
use App\Models\Events;
use Saade\FilamentFullCalendar\Widgets\FullCalendarWidget;
use Symfony\Component\Translation\Catalogue\TargetOperation;

class CalendarWidget extends FullCalendarWidget
{
    public function fetchEvents(array $fetchInfo): array
    {
        return Events::query()
            ->where('start_at', '>=', $fetchInfo['start'])
            ->where('end_at', '<=', $fetchInfo['end'])
            ->get()
            ->map(
                fn (Events $event) => [
                    'id' => $event->id,
                    'title' => $event->title,
                    'color' => $event->color,
                    'start' => $event->start_at,
                    'end' => $event->end_at,
                    'url' => EventsResource::getUrl(name: 'view', parameters: ['record' => $event]),
                    'shouldOpenUrlInNewTab' => false
                ]
            )
            ->all();
    }
}
