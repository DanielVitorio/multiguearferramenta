<?php

namespace App\Filament\Resources\DeniedResource\Pages;

use App\Filament\Resources\DeniedResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateDenied extends CreateRecord
{
    protected static string $resource = DeniedResource::class;
}
