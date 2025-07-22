<?php

namespace App\Filament\Clusters\Calendar\Resources\CalendarBoardResource\Pages;

use App\Filament\Clusters\Calendar\Resources\CalendarBoardResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditCalendarBoard extends EditRecord
{
    protected static string $resource = CalendarBoardResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
