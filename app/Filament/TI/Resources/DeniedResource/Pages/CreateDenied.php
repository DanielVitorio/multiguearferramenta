<?php

namespace App\Filament\TI\Resources\DeniedResource\Pages;

use App\Filament\TI\Resources\DeniedResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateDenied extends CreateRecord
{
    protected static string $resource = DeniedResource::class;
}
