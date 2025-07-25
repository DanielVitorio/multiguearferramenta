<?php

namespace App\Providers\Filament;

use App\Filament\Pages\Auth\EditProfile;
use App\Http\Middleware\FilamentSettings;
use Filament\Http\Middleware\Authenticate;
use Filament\Http\Middleware\DisableBladeIconComponents;
use Filament\Http\Middleware\DispatchServingFilamentEvent;
use Filament\Pages;
use Filament\Panel;
use Filament\PanelProvider;
use Filament\Support\Colors\Color;
use Filament\Widgets;
use Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse;
use Illuminate\Cookie\Middleware\EncryptCookies;
use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken;
use Illuminate\Routing\Middleware\SubstituteBindings;
use Illuminate\Session\Middleware\AuthenticateSession;
use Illuminate\Session\Middleware\StartSession;
use Illuminate\View\Middleware\ShareErrorsFromSession;

class TIPanelProvider extends PanelProvider
{
    public function panel(Panel $panel): Panel
    {
        return $panel
            ->id('ti')
            ->path('ti')
            ->login()
            ->profile(EditProfile::class)
            ->colors([
                'primary' => Color::Violet,
            ])
            ->brandName('MultiGears')
            ->brandLogo(asset('images/LogoLight.png'))
            ->darkModeBrandLogo(asset('images/LogoDark.png'))
            ->brandLogoHeight('4rem')
            ->favicon(asset('images/MultiGears-favicon.ico'))
            ->discoverResources(in: app_path('Filament/TI/Resources'), for: 'App\\Filament\\TI\\Resources')
            ->discoverPages(in: app_path('Filament/TI/Pages'), for: 'App\\Filament\\TI\\Pages')
            ->pages([
                Pages\Dashboard::class,
            ])
            ->discoverWidgets(in: app_path('Filament/TI/Widgets'), for: 'App\\Filament\\TI\\Widgets')
            ->widgets([
            ])
            ->middleware([
                EncryptCookies::class,
                AddQueuedCookiesToResponse::class,
                StartSession::class,
                AuthenticateSession::class,
                ShareErrorsFromSession::class,
                VerifyCsrfToken::class,
                SubstituteBindings::class,
                DisableBladeIconComponents::class,
                DispatchServingFilamentEvent::class,
            ])
            ->authMiddleware([
                Authenticate::class,
                FilamentSettings::class,
            ])
            ->databaseNotifications();
    }

}
