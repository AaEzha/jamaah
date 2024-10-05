<?php

namespace App\Filament\Jamaah\Pages;

use App\Models\Jamaah;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Pages\Tenancy\RegisterTenant;

class JamaahRegistration extends RegisterTenant
{
    public static function getLabel(): string
    {
        return 'Register Jamaah';
    }

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('name'),
                TextInput::make('slug'),
            ]);
    }

    protected function handleRegistration(array $data): Jamaah
    {
        $jamaah = Jamaah::create($data);

        $jamaah->users()->attach(auth()->user());

        return $jamaah;
    }
}
