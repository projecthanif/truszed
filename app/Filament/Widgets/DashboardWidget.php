<?php

namespace App\Filament\Widgets;

use App\Models\Agent;
use App\Models\Property;
use App\Models\View;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class DashboardWidget extends BaseWidget
{
//    protected int | string | array $columnSpan = 'full';
    protected function getStats(): array
    {
        return [
            Stat::make('Total Agents', $this->agentsCount())
                ->icon('heroicon-o-users'),
            Stat::make('Total Properties', $this->propertyCount('Total'))
                ->icon('heroicon-o-home-modern'),
            Stat::make('Total Properties for Rent', $this->propertyCount('Rent'))
                ->icon('heroicon-o-home-modern'),
            Stat::make('Total Properties for Sale', $this->propertyCount('Sale'))
                ->icon('heroicon-o-home-modern'),
            Stat::make('Overview', $this->overview())
                ->icon('heroicon-o-eye')
        ];
    }

    private function agentsCount(): int
    {
        return Agent::all()->count();
    }

    private function propertyCount(string $for): int
    {
        if ($for === 'Rent') {
            return Property::where([
                'listing_type' => 'Rent'
            ])->count();
        }

        if ($for === 'Sale') {
            return Property::where([
                'listing_type' => 'Rent'
            ])->count();
        }
        return Property::all()->count();
    }

    private function overview(): int
    {
        return View::all()->count();
    }
}
