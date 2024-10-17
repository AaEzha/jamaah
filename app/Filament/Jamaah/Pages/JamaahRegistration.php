<?php

namespace App\Filament\Jamaah\Pages;

use App\Models\Jamaah;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Pages\Tenancy\RegisterTenant;
use Illuminate\Support\Facades\Auth;

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
                TextInput::make('name')->required(),
                TextInput::make('website')
                    ->suffix('.jamaah.com')
                    ->prefixIcon('heroicon-m-globe-alt')
                    ->required()
                    ->alphaDash()
                    ->unique(table: Jamaah::class, column: "website"),


                Select::make("type")->options([
                    'masjid' => 'Masjid',
                    'majelis' => 'Majelis',
                ])
                    ->default('masjid')
                    ->selectablePlaceholder(false)
                    ->required()
            ]);
    }

    protected function handleRegistration(array $data): Jamaah
    {
        $user = Auth::user();
        $jamaah = Jamaah::create($data);
        $jamaah->users()->attach($user);

        setPermissionsTeamId($jamaah->id);
        $user->assignRole('admin');

        return $jamaah;
    }
}
