<?php

namespace App\Filament\Clusters\Ticonnect\Resources\TiconnectUpdateResource\Pages;

use App\Filament\Clusters\Ticonnect\Resources\TiconnectUpdateResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditTiconnectUpdate extends EditRecord
{
    protected static string $resource = TiconnectUpdateResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
