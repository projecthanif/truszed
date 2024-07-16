<?php

namespace App\Filament\Agent\Pages;

use App\Models\Agent;
use App\Models\User;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Form;
use Filament\Notifications\Notification;
use Filament\Pages\Page;
use Illuminate\Support\Facades\Auth;

class Profile extends Page
{
    protected static ?string $navigationIcon = 'heroicon-o-user';

    protected static string $view = 'filament.agent.pages.profile';

    use InteractsWithForms;

    protected static ?int $navigationSort = 2;


    public ?array $data = [];

    public function mount(): void
    {
        $this->form->fill(
            Agent::where([
                'email' => auth()->user()->email
            ])->get()->first()->toArray()
        );
    }

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make('Profile')
                    ->description('')
                    ->schema([
                        TextInput::make('name')
                            ->disabled(),
                        TextInput::make('email')
                            ->disabled()
                            ->email(),
                        TextInput::make('phone_number')
                            ->disabled(),
                        TextInput::make('address')
                            ->disabled(),
                        TextInput::make('nin')
                            ->disabled(),
                        Toggle::make('approve')
                            ->disabled(),
                    ])->columns(3),
            ])
            ->statePath('data');
    }

//    public function edit(): void
//    {
//        User::query()
//            ->where('id', Auth::id())
//            ->update($this->form->getState());
//
//        Notification::make()
//            ->title('Saved successfully')
//            ->success()
//            ->send();
//    }
}
