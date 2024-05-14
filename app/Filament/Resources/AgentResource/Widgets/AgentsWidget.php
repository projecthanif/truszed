<?php

namespace App\Filament\Resources\AgentResource\Widgets;

use App\Models\Agent;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class AgentsWidget extends BaseWidget
{
    protected function getStats(): array
    {
        return [
            Stat::make('Total Agents', $this->agentsCount())
                ->icon('heroicon-o-users')
        ];
    }

    private function agentsCount(): int
    {
        return Agent::all()->count();
    }
}
