<?php

namespace App\Filament\Clusters;

use Filament\Clusters\Cluster;

class settings extends Cluster
{
    protected static ?string $navigationIcon = 'heroicon-o-cog-8-tooth';
    protected static ?string $navigationLabel = 'Configurações';
    protected static ?int $navigationSort = 999; // esse valor serve para determinar a posicissão no menu
}
