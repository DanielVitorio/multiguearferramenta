<?php

namespace App\Filament\Resources\OverWarningResource\Widgets;

use App\Models\User;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class OverWarningOverView extends BaseWidget
{

    protected function getStats(): array
    {
        
        return [

            Stat::make('Média de Horas Trabalhadas', '16:35')
                ->description('Últimos 30 dias')
                ->color('success')
                ->descriptionIcon('heroicon-m-arrow-trending-up')
                ->extraAttributes([
                    'class' => 'cursor-pointer',
                    'wire:click' => "\$dispatch('setStatusFilter', { filter: 'processed' })",
                ])
                ->chart([10,0,15,26]),
            Stat::make('Médias de Chamados', '725')
                ->description('Por Final de Semana')
                ->descriptionIcon('heroicon-m-arrow-trending-down')
                ->color('danger')
                ->extraAttributes([
                    'class' => 'cursor-pointer',
                    'wire:click' => "\$dispatch('setStatusFilter', { filter: 'processed' })",
                ])
                ->chart([30,25,36,2]),

            Stat::make('Total de Chamados', '796')
                ->description('Ultimos 30 dias')
                ->descriptionIcon('heroicon-m-arrow-trending-down')
                ->color('danger')
                ->chart([10,0,15,26]),
        ];
    }
}
