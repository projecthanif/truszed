<?php

namespace App\Filament\Resources;

use App\Services\Helpers;
use App\Services\Slugs;
use Filament\Forms;
use Filament\Forms\Components\Hidden;
use Filament\Forms\Components\Select;
use Filament\Tables;
use App\Models\Property;
use Filament\Forms\Form;
use Filament\Tables\Enums\FiltersLayout;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use Illuminate\Database\Eloquent\Builder;
use League\CommonMark\Normalizer\SlugNormalizer;
use App\Filament\Resources\PropertyResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\PropertyResource\RelationManagers;
use App\Models\Agent;
use App\Models\LocalGovernmentArea;
use App\Models\State;
use Filament\Forms\Get;
use Filament\Forms\Set;
use Filament\Support\Colors\Color;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Filters\SelectFilter;
use Illuminate\Support\Facades\Http;

class PropertyResource extends Resource
{
    protected static ?string $model = Property::class;

    protected static ?string $navigationIcon = 'heroicon-o-home-modern';

    protected static ?string $navigationGroup = 'Property';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Hidden::make('slug')
                    ->default(Slugs::slugComponent()),
                Forms\Components\Hidden::make('agent_id')
                    ->default(auth()->user()->id)
                    ->required(),
                Forms\Components\TextInput::make('name')
                    ->string()
                    ->required(),
                Forms\Components\Select::make('listing_type')
                    ->options([
                        'Sale' => 'Sale',
                        'Rent' => 'Rent'
                    ])
                    ->required(),
                Forms\Components\Select::make('status')
                    ->options([
                        'available' => 'Available',
                        'sold' => 'Sold'
                    ])
                    ->required(),
                Forms\Components\Select::make('state')
                    ->live()
                    ->options(State::all()->pluck('name', 'id'))
                    ->afterStateUpdated(function (?string $state, Set $set) {
                        $name = State::where('id', $state)->get('name')->first()->name;
                        $set('state_name', $name);
                    })
                    ->required(),
                Hidden::make('state_name')
                    ->live(),
                Forms\Components\Select::make('city')
                    ->live()
                    ->options(function (Get $get) {
                        $state = $get('state');

                        if ($state !== null) {
                            return LocalGovernmentArea::where([
                                'state_id' => $state
                            ])->get()->pluck('name', 'name');
                        }

                        return [];
                    })
                    ->required(),
                Forms\Components\Textarea::make('address')
                    ->required()
                    ->columnSpanFull(),
                Forms\Components\TextInput::make('price')
                    ->required()
                    ->numeric()
                    ->prefix('NGN'),
                Forms\Components\TextInput::make('square_footing')
                    ->required(),
                Forms\Components\TextInput::make('no_of_bedroom')
                    ->required()
                    ->numeric(),
                Forms\Components\TextInput::make('no_of_bathroom')
                    ->required()
                    ->numeric(),
                Forms\Components\DatePicker::make('year_built')
                    ->required(),
                Forms\Components\FileUpload::make('property_thumbnail')
                    ->hint('You can insert multiple picture')
                    ->hintColor(Color::Red)
                    ->multiple()
                    ->required()
                    ->columnSpanFull(),
                Forms\Components\Textarea::make('description')
                    ->required()
                    ->columnSpanFull(),
                Forms\Components\Toggle::make('admin_permission')
                    ->visible(function () {
                        return auth()->user()->role === 'admin';
                    })
                    ->default(0)
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('id'),
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
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListProperties::route('/'),
            'create' => Pages\CreateProperty::route('/create'),
            'edit' => Pages\EditProperty::route('/{record}/edit'),
            'view' => Pages\ViewProperty::route('/{record}/view'),
            'approved' => Pages\ApprovedProperty::route('/approved'),
            'pending' => Pages\PendingProperty::route('/pending'),
        ];
    }
}
