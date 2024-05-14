<?php

namespace App\Filament\Pages;

use App\Filament\Resources\AgentResource\Widgets\AgentsWidget;
use App\Filament\Resources\PropertyResource\Widgets\PropertyWidget;
use App\Filament\Widgets\DashboardWidget;
use Filament\Pages\Page;

class Dashboard extends Page
{
    protected static ?string $navigationIcon = 'heroicon-o-squares-2x2';

    protected static string $view = 'filament.pages.dashboard';

    protected function getHeaderWidgets(): array
    {
        return [
          DashboardWidget::class
        ];
    }
}
