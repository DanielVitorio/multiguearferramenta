<?php

namespace App\Filament\Resources\RedirectedMachineResource\Pages;

use App\Filament\Resources\RedirectedMachineResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditRedirectedMachine extends EditRecord
{
    protected static string $resource = RedirectedMachineResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
