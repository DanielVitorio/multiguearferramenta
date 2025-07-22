<?php

namespace App\Filament\Widgets;

use Filament\Widgets\ChartWidget;

class LocalADMonitoring extends ChartWidget
{
    protected static ?string $heading = 'Active Directory';
    protected static ?string $pollingInterval = '1s'; //tempo de pooling onde ele ficará buscando de 1 em 1 segundo
    protected static bool $isLazy = true; //para carregar o widget suavemente (já é o padrão)

    protected function getData(): array
    {
        return [
            'datasets' => [
                [
                    'label' => 'DC001',
                    'data' => [1,1,1,1,1,1,1,1,1,1,1,4,1,1,1,1,25,25,1,1,15,1,1,1,1,14,14,14,1,1,1,1,69,1,],
                    'backgroundColor' => '#7AFF7A',
                    'borderColor' => 'green',
                    'tension' => 0.1,
                ],
                [
                    'label' => 'DC002',
                    'data' => [1,1,1,20,1,1,1,1,1,10,1,4,1,1,1,1,1,1,1,1,15,1,1,1,1,14,14,14,1,1,1,1,69,1,],
                    'backgroundColor' => '#FF4A4A',
                    'borderColor' => 'red',
                    'tension' => 0.1,
                ],
            ],
            'labels' => ['30min', '28min', '26min', '24min', '22min', '20min', '18min', '16min', '14min', '12min', '10min', '8min', '4min', '2min', '1min'],
        ];
    }

    public function getDescription(): ?string
{
    return 'Monitoramento Dos ADs Locais';
}

    protected function getType(): string
    {
        return 'line';
    }
}
