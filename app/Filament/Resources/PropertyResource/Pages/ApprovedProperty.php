<?php

namespace App\Filament\Resources\PropertyResource\Pages;

use App\Models\State;
use Filament\Tables\Table;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Enums\FiltersLayout;
use Filament\Resources\Pages\ListRecords;
use Filament\Tables;
use Filament\Tables\Filters\SelectFilter;
use App\Filament\Resources\PropertyResource;
use App\Models\Property;

class ApprovedProperty extends ListRecords
{
    protected static string $resource = PropertyResource::class;

    protected static ?string $navigationIcon = 'heroicon-o-home-modern';

    protected ?string $heading = 'Approved Properties';

    protected static ?string $navigationGroup = 'Property';


    protected static ?int $navigationSort = 1;

    public function table(Table $table): Table
    {
        return $table
            ->columns([
                ImageColumn::make('property_thumbnail.0')
                    ->square()
                    ->label('Image'),
                Tables\Columns\TextColumn::make('listing_type')
                    ->badge()
                    ->searchable(),
                Tables\Columns\TextColumn::make('city')
                    ->searchable(),
                Tables\Columns\TextColumn::make('state')
                    ->searchable(),
                Tables\Columns\TextColumn::make('price')
                    ->money('NGN'),
                //                    ->sortable(),
                Tables\Columns\TextColumn::make('square_footing')
                    ->searchable(),
                Tables\Columns\TextColumn::make('no_of_bedroom')
                    ->numeric(),
                //                    ->sortable(),
                Tables\Columns\TextColumn::make('no_of_bathroom')
                    ->numeric(),
                //                    ->sortable(),
                Tables\Columns\TextColumn::make('status')
                    ->searchable()
                    ->badge(),
                Tables\Columns\TextColumn::make('year_built')
                    ->searchable(),
                Tables\Columns\TextColumn::make('user.name'),
            ])
            ->filters([
                SelectFilter::make('agent')
                    ->relationship('agent', 'name')
                    ->searchable(),
                SelectFilter::make('State')
                    ->options(State::all()->pluck('name', 'name'))
                    ->searchable(),
                SelectFilter::make('listing_type')
                    ->label('Property Type')
                    ->options([
                        'Sale' => 'Sale',
                        'Rent' => 'Rent'
                    ]),
                SelectFilter::make('no_of_bedroom')
                    ->label('Beds')
                    ->options([
                        '1' => '1',
                        '2' => '2',
                        '3' => '3',
                        '4' => '4',
                        '5' => '5',
                        '6' => '6',
                        '7' => '7',
                    ])
            ], layout: FiltersLayout::AboveContent)
            ->filtersFormMaxHeight('50px')
            ->hiddenFilterIndicators()
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\ViewAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ])
            ->query(function () {
                return Property::where([
                    'admin_permission' => 1
                ]);
            });
    }
}
