<?php

namespace App\Providers\Filament;

use Filament\Pages;
use Filament\Panel;
use Filament\Widgets;
use Filament\PanelProvider;
use App\Models\ServicePoint;
use Filament\Navigation\MenuItem;
use Filament\Support\Colors\Color;
use App\Filament\Mechanic\Pages\Contact;
use App\Http\Middleware\ApplyTenantScopes;
use Filament\Http\Middleware\Authenticate;
use App\Http\Middleware\AssignGlobalScopes;
use Filament\SpatieLaravelTranslatablePlugin;
use Illuminate\Session\Middleware\StartSession;
use Illuminate\Cookie\Middleware\EncryptCookies;
use Illuminate\Routing\Middleware\SubstituteBindings;
use Illuminate\Session\Middleware\AuthenticateSession;
use Illuminate\View\Middleware\ShareErrorsFromSession;
use Filament\Http\Middleware\DisableBladeIconComponents;
use Filament\Http\Middleware\DispatchServingFilamentEvent;
use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken;
use Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse;

class MechanicPanelProvider extends PanelProvider
{
    public function panel(Panel $panel): Panel
    {
        return $panel
            ->id('mechanic')
            ->path('mechanic')
            ->tenant(ServicePoint::class)
            ->login()
            ->passwordReset()
            // ->profile() //TODO: Custom profile page
            ->userMenuItems([
                'contact' => MenuItem::make()
                    ->label('Contactgegevens')
                    ->icon('heroicon-o-phone')
                    // This line creates a menu link using the getUrl() method, ensuring the link includes the tenant's ID.
                    ->url(fn (): string => Contact::getUrl()),
            ])
            ->colors([
                'primary' => Color::Orange,
                'danger'  => Color::Red,
                'gray'    => Color::Zinc,
                'info'    => Color::Blue,
                'success' => Color::Green,
                'warning' => Color::Yellow,
            ])
            ->discoverResources(in: app_path('Filament/Mechanic/Resources'), for: 'App\\Filament\\Mechanic\\Resources')
            ->discoverPages(in: app_path('Filament/Mechanic/Pages'), for: 'App\\Filament\\Mechanic\\Pages')
            ->pages([
                Pages\Dashboard::class,
            ])
            ->discoverWidgets(in: app_path('Filament/Mechanic/Widgets'), for: 'App\\Filament\\Mechanic\\Widgets')
            ->widgets([
                Widgets\BikeHubAccountWidget::class,
                Widgets\BikeHubInfoWidget::class,
                Widgets\StatsOverviewWidget::class,
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
            ->tenantMiddleware([
                ApplyTenantScopes::class,
                AssignGlobalScopes::class,
            ], isPersistent: true)
            ->authMiddleware([
                Authenticate::class,
            ])
            ->plugin(
                SpatieLaravelTranslatablePlugin::make()
                    ->defaultLocales(['en', 'nl']),
            )
            ->plugins([

            ]);
    }
}
