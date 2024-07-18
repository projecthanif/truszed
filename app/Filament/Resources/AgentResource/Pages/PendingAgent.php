<?php

namespace App\Filament\Resources\AgentResource\Pages;

use Filament\Actions;
use Filament\Tables\Table;
use Filament\Tables;
use App\Filament\Resources\AgentResource;
use App\Models\Agent;
use Filament\Resources\Pages\ListRecords;

class PendingAgent extends ListRecords
{
    protected static string $resource = AgentResource::class;
    protected static ?string $navigationIcon = 'heroicon-o-user-group';

    protected static ?string $navigationGroup = 'Agents';

    protected ?string $heading = 'Pending Agents';


    protected static ?int $navigationSort = 3;

    public function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make('agent_thumbnail')
                    ->label('Image'),
                Tables\Columns\TextColumn::make('name')
                    ->searchable(),
                Tables\Columns\TextColumn::make('email')
                    ->searchable(),
                Tables\Columns\TextColumn::make('phone_number')
                    ->searchable(),
                Tables\Columns\TextColumn::make('address')
                    ->searchable(),
                Tables\Columns\TextColumn::make('nin')
                    ->label('NIN')
                    ->searchable(),
                Tables\Columns\ImageColumn::make('nin_thumbnail1')
                    ->label('NIN Image'),
                Tables\Columns\IconColumn::make('approve')
                    ->boolean(),
                Tables\Columns\IconColumn::make('suspend')
                    ->boolean(),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ])
            ->query(function () {
                return Agent::where([
                    'approve' => 0
                ]);
            });
    }


    public static function getNavigationBadge(): ?string
    {
        return Agent::where([
            'approve' => 0
        ])->count();
    }

}
