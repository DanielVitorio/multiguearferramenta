<?php

namespace App\Filament\Clusters\Calendar\Resources\CalendarBoardResource\Pages;

use App\Filament\Clusters\Calendar\Resources\CalendarBoardResource;
use App\Filament\Clusters\Calendar\Resources\CalendarBoardResource\Widgets\CalendarWidget;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListCalendarBoards extends ListRecords
{
    protected static string $resource = CalendarBoardResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make()
            ->label('Criar Anotações'),
        ];
    }

    protected function getHeaderWidgets(): array
    {
        return [
            CalendarWidget::class
        ];
    }
}
