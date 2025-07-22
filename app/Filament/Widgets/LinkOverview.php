<?php

namespace App\Filament\Widgets;

use Filament\Widgets\ChartWidget;

class LinkOverview extends ChartWidget
{
    protected static ?string $pollingInterval = '1s'; //tempo de pooling onde ele ficará buscando de 1 em 1 segundo
    public ?string $filter = 'today'; //deixa pré definido no link como Hoje
    protected static bool $isLazy = true; //para carregar o widget suavemente (já é o padrão)
    protected static ?string $heading = 'Link Quick';

    protected function getData(): array
    {
        return [
            'datasets' => [
                [
                    'label' => 'Latência',
                    'data' => [1,1,1,1,1,1,1,1,1,1,1,4,1,1,1,1,1,1,1,1,15,1,1,1,1,14,14,14,1,1,1,1,69,1,],
                    'backgroundColor' => '#7AFF7A',
                    'borderColor' => 'green',
                    'tension' => 0.1,
                    
                ],
            ],
            'labels' => ['30min', '28min', '26min', '24min', '22min', '20min', '18min', '16min', '14min', '12min', '10min', '8min', '4min', '2min', '1min'],
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

    public function getDescription(): ?string
{
    return 'Monitoramento Link VR/PI';
}

    protected function getType(): string
    {
        return 'line';
    }
}
