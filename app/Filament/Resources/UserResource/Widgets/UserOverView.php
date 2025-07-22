<?php

namespace App\Filament\Resources\UserResource\Widgets;

use App\Models\User;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class UserOverView extends BaseWidget
{

    
    protected function getStats(): array
    {

        $usersTotal = User::count('id'); //verifica o total de ids
        $usersAdmTotal = User::where('hierarchy', 'ADM')->count(); //verica o total de usuarios cujo a hierarquia é ADM
        $usersCoAdmTotal = User::where('hierarchy', 'COADM')->count(); //verica o total de usuarios cujo a hierarquia é CO-ADM
        $totalPorcent = $usersAdmTotal * 100; //pega o tanto de Adm e multiplica por 100
        $totalPorcentCoAdm = $usersCoAdmTotal * 100; //pega o tanto de CoAdm e multiplica por 100
        $admPorcent = $totalPorcent / $usersTotal; //aqui ele calcula o valor da porcentagem através da divisão entre os adms multiplicados por 100 e o total de usuarios, logo teremos o valor da porcentagem
        $coAdmPorcent = $totalPorcentCoAdm / $usersTotal; //aqui ele calcula o valor da porcentagem através da divisão entre os Coadms multiplicados por 100 e o total de usuarios, logo teremos o valor da porcentagem
        $colorAdmin = $admPorcent < 50 ? 'danger' : 'success'; //cria uma condição para determinar a cor do admin
        $iconAdmin = $admPorcent < 50 ? 'heroicon-m-arrow-trending-down' : 'heroicon-m-arrow-trending-up'; //cria uma condição para determinar o icone do admin
        $colorCOAdmin = $coAdmPorcent < 50 ? 'danger' : 'success'; //cria uma condição para determinar a cor do admin
        $iconCOAdmin = $coAdmPorcent < 50 ? 'heroicon-m-arrow-trending-down' : 'heroicon-m-arrow-trending-up'; //cria uma condição para determinar o icone do admin

        return [
            Stat::make('Total de Usuários', $usersTotal)
                ->description('Usuários Totais do Sistema')
                ->color('success')
                ->chart([$usersCoAdmTotal, $usersAdmTotal, $usersTotal])
                ->extraAttributes([
                    'class' => 'cursor-pointer',
                    'wire:click' => "\$dispatch('setStatusFilter', { filter: 'processed' })",
                ]),

            Stat::make('Total Administradores', $usersAdmTotal)
                ->description(round($admPorcent, 2) . '%') //round serve para limitar o numero de decimal para 2
                ->color($colorAdmin)
                ->chart([$usersTotal, $usersCoAdmTotal, $usersAdmTotal])
                ->descriptionIcon($iconAdmin)
                ->extraAttributes([
                    'class' => 'cursor-pointer',
                    'wire:click' => "\$dispatch('setStatusFilter', { filter: 'processed' })",
                ]),

            Stat::make('Total CO-Administradores', $usersCoAdmTotal)
                ->description(round($coAdmPorcent, 2) . '%') //round serve para limitar o numero de decimal para 2
                ->color($colorCOAdmin)
                ->chart([$usersTotal, $usersAdmTotal, $usersCoAdmTotal])
                ->descriptionIcon($iconCOAdmin)
                ->extraAttributes([
                    'class' => 'cursor-pointer',
                    'wire:click' => "\$dispatch('setStatusFilter', { filter: 'processed' })",
                ])
        ];
    }
}
