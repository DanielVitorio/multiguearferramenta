<?php

namespace App\Filament\Resources\OverWarningResource\Pages;

use App\Filament\Resources\OverWarningResource;
use App\Filament\Resources\OverWarningResource\Widgets\OverWarningOverView;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListOverWarnings extends ListRecords
{
    protected static string $resource = OverWarningResource::class;

    protected function getHeaderWidgets(): array
    {
        return [
            OverWarningOverView::class,
        ];
    }//essa funlção chama os widgets para o list

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
