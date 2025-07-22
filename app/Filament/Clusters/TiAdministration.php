<?php

namespace App\Filament\Clusters;

use Filament\Clusters\Cluster;

class TiAdministration extends Cluster
{
    protected static ?string $navigationIcon = 'heroicon-o-cpu-chip';
    protected static ?int $navigationSort = 5; // esse valor serve para determinar a posicissão no menu
    protected static ?string $navigationGroup = 'Aplicativos e Conexões';
}
