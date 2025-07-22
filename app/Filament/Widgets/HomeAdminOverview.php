<?php

namespace App\Filament\Widgets;

use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class HomeAdminOverview extends BaseWidget
{
    protected function getStats(): array
    {
        return [
            Stat::make('Maquinas Ligadas', '1.1k')
                ->description('De 1.9K')
                ->color('success')
                ->descriptionIcon('heroicon-m-arrow-trending-up')
                ->extraAttributes([
                    'class' => 'cursor-pointer',
                    'wire:click' => "\$dispatch('setStatusFilter', { filter: 'processed' })",
                ])
                ->chart([10,0,15,26]),
            Stat::make('Maquinas Desligadas', '725')
                ->description('De 1.9K')
                ->descriptionIcon('heroicon-m-arrow-trending-down')
                ->color('danger')
                ->extraAttributes([
                    'class' => 'cursor-pointer',
                    'wire:click' => "\$dispatch('setStatusFilter', { filter: 'processed' })",
                ])
                ->chart([30,25,36,2]),
            Stat::make('Usuários Logados', '3.5K')
                ->chart([10,0,15,26]),
        ];
    }

    protected function getFilters(): ?array
    {
        return [
            'today' => 'Hoje',
            'week' => 'Ultimos 7 dias',
            'month' => 'Ultimos 30 dias',
        ];
    } //adiciona um filtro no gráfico
}
