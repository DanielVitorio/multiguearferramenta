<?php

namespace App\Filament\Resources\ConsultantsResource\Pages;

use App\Filament\Resources\ConsultantsResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditConsultants extends EditRecord
{
    protected static string $resource = ConsultantsResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
