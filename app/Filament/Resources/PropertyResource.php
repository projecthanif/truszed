<?php

namespace App\Filament\Resources;

use Filament\Forms;
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
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Filters\SelectFilter;
use Illuminate\Support\Facades\Http;

class PropertyResource extends Resource
{
    protected static ?string $model = Property::class;

    protected static ?string $navigationIcon = 'heroicon-o-home-modern';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                self::slugComponent(),
                Forms\Components\Hidden::make('agent_id')
                    ->default(self::search())
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
                    ->options(State::all()->pluck('name', 'name'))
                    ->required(),
                Forms\Components\Select::make('city')
                    ->live()
                    ->options(function (Get $get) {
                        $state = $get('state');

                        if ($state !== null) {
                            $stateId = State::where([
                                'name' => $state
                            ])->get('id')->first()->id;


                            return LocalGovernmentArea::where([
                                'state_id' => $stateId
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
                Forms\Components\TextInput::make('square_footing'),
                Forms\Components\TextInput::make('no_of_bedroom')
                    ->numeric(),
                Forms\Components\TextInput::make('no_of_bathroom')
                    ->numeric(),
                Forms\Components\DatePicker::make('year_built'),
                Forms\Components\FileUpload::make('property_thumbnail')
                    ->multiple()
                    ->columnSpanFull(),
                Forms\Components\Textarea::make('description')
                    ->required()
                    ->columnSpanFull(),
                Forms\Components\Hidden::make('admin_permission')
                    ->default(1)
            ]);
    }

    public static function table(Table $table): Table
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
                Tables\Columns\TextColumn::make('agent.name')
                    ->numeric()
                    ->sortable(),
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
        ];
    }

    private static function search(): int
    {
        $userEmail = auth()->user()->email;

        $id = Agent::where([
            'email' => $userEmail
        ])->get()->first();

        return $id->id;
    }

    private static function slugComponent(): Forms\Components\Hidden
    {

        $random = uuid_create();
        $slug = new SlugNormalizer();
        $slug = $slug->normalize($random);
        // dd(Http::get('https://nga-states-lga.onrender.com/fetch')->json());

        return Forms\Components\Hidden::make('slug')
            ->default($slug)
            ->required();
    }
}
