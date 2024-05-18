<?php

namespace App\Filament\Agent\Pages;

use Filament\Pages\Page;
use App\Filament\Agent\Widgets\AgentDashBoardWidget;

class Dashboard extends Page
{
    protected static ?string $navigationIcon = 'heroicon-o-document-text';

    protected static string $view = 'filament.agent.pages.dashboard';

    protected function getHeaderWidgets(): array
    {
        return [
            AgentDashBoardWidget::class
        ];
    }
}
