<?php

namespace App\Filament\Resources\PropertyResource\Widgets;

use App\Models\Property;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class PropertyWidget extends BaseWidget
{
    protected function getStats(): array
    {
        return [
            Stat::make('Total Properties', $this->propertyCount())
                ->icon('heroicon-o-home-modern')
        ];
    }

    private function propertyCount(): int
    {
        return Property::all()->count();
    }
}
