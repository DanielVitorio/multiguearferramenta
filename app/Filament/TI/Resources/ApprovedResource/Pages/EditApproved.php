<?php

namespace App\Filament\TI\Resources\ApprovedResource\Pages;

use App\Filament\TI\Resources\ApprovedResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditApproved extends EditRecord
{
    protected static string $resource = ApprovedResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
