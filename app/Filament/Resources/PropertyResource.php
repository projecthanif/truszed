<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use App\Models\Property;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use Illuminate\Database\Eloquent\Builder;
use League\CommonMark\Normalizer\SlugNormalizer;
use App\Filament\Resources\PropertyResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\PropertyResource\RelationManagers;
use App\Models\Agent;
use Filament\Forms\Get;
use Filament\Forms\Set;
use Illuminate\Support\Facades\Http;

class PropertyResource extends Resource
{
    protected static ?string $model = Property::class;

    protected static ?string $navigationIcon = 'heroicon-o-home-modern';

    public static function form(Form $form): Form
    {
        $random = uuid_create();
        $slug = new SlugNormalizer();
        $slug = $slug->normalize($random);
        // dd(Http::get('https://nga-states-lga.onrender.com/fetch')->json());
        return $form
            ->schema([
                Forms\Components\Hidden::make('slug')
                    ->default($slug)
                    ->required(),
                Forms\Components\Hidden::make('agent_id')
                    ->default(self::search())
                    ->required(),
                Forms\Components\Select::make('listing_type')
                    ->options([
                        'Sale' => 'Sale',
                        'Rent' => 'Rent'
                    ])
                    ->required(),
                Forms\Components\TextInput::make('status')
                    ->required(),
                Forms\Components\Select::make('state')
                    ->live()
                    ->options(Http::get('https://nga-states-lga.onrender.com/fetch')->json())
                    ->afterStateUpdated(function (?string $state, Set $set) {
                        dump($state);
                        $all = Http::get('https://nga-states-lga.onrender.com/fetch')->json();
                        $lga = Http::get("https://nga-states-lga.onrender.com/state?={$all[$state]}")->json();
                        dump($lga);
                        $set('city', $lga);
                    })
                    ->required(),
                Forms\Components\Select::make('city')
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
                    ->json()
                    ->columnSpanFull(),
                Forms\Components\Textarea::make('description')
                    ->required()
                    ->columnSpanFull(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('agent.name')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('listing_type')
                    ->badge()
                    ->searchable(),
                Tables\Columns\TextColumn::make('status')
                    ->searchable(),
                Tables\Columns\TextColumn::make('city')
                    ->searchable(),
                Tables\Columns\TextColumn::make('state')
                    ->searchable(),
                Tables\Columns\TextColumn::make('price')
                    ->money('NGN')
                    ->sortable(),
                Tables\Columns\TextColumn::make('square_footing')
                    ->searchable(),
                Tables\Columns\TextColumn::make('no_of_bedroom')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('no_of_bathroom')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('year_built')
                    ->searchable(),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\ViewAction::make(),
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
}
