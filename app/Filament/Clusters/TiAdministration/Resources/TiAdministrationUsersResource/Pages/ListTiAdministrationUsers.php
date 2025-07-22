<?php

namespace App\Filament\Clusters\TiAdministration\Resources\TiAdministrationUsersResource\Pages;

use App\Filament\Clusters\TiAdministration\Resources\TiAdministrationUsersResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListTiAdministrationUsers extends ListRecords
{
    protected static string $resource = TiAdministrationUsersResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make()
            ->label('Cadastrar Usuário'),
        ];
    }
}
