<?php

namespace App\Filament\Clusters\TiAdministration\Resources\TiAdministrationUsersResource\Pages;

use App\Filament\Clusters\TiAdministration\Resources\TiAdministrationUsersResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditTiAdministrationUsers extends EditRecord
{
    protected static string $resource = TiAdministrationUsersResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
