<?php

namespace App\Filament\Jamaah\Pages;

use App\Models\Jamaah;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Pages\Tenancy\EditTenantProfile;

class JamaahProfile extends EditTenantProfile
{
    protected static ?string $navigationIcon = 'heroicon-o-document-text';

    public static function getLabel(): string
    {
        return __("common.jamaah_profile");
    }

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('name'),
                TextInput::make('website')
                    ->suffix('.jamaah.com')
                    ->prefixIcon('heroicon-m-globe-alt')
                    ->required()
                    ->alphaDash()
                    ->unique(table: Jamaah::class, column: "website"),
            ]);
    }
}
