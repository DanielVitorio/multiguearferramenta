<?php

namespace App\Filament\Resources\OverWarningResource\Pages;

use App\Filament\Resources\OverWarningResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditOverWarning extends EditRecord
{
    protected static string $resource = OverWarningResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
