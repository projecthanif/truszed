<?php

namespace App\Filament\Agent\Widgets;

use App\Models\View;
use App\Models\Agent;
use App\Models\Property;
use Filament\Widgets\StatsOverviewWidget\Stat;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;

class AgentDashBoardWidget extends BaseWidget
{
    protected function getStats(): array
    {
        return [
            Stat::make('Total Properties', $this->propertyCount('Total'))
                ->icon('heroicon-o-home-modern'),
            Stat::make('Total Properties for Rent', $this->propertyCount('Rent'))
                ->icon('heroicon-o-home-modern'),
            Stat::make('Total Properties for Sale', $this->propertyCount('Sale'))
                ->icon('heroicon-o-home-modern'),
            // Stat::make('Overview', $this->overview())
            //     ->icon('heroicon-o-eye')
        ];
    }

    private function propertyCount(string $for): int
    {
        if ($for === 'Rent') {
            return Property::where([
                'agent_id' => auth()->user()->id,
                'listing_type' => 'Rent'
            ])->count();
        }

        if ($for === 'Sale') {
            return Property::where([
                'agent_id' => auth()->user()->id,
                'listing_type' => 'Rent'
            ])->count();
        }
        return Property::where([
            'agent_id' => auth()->user()->id,
        ])->count();
    }

    // private function overview(): int
    // {
    //     return View::all()->count();
    // }
}
