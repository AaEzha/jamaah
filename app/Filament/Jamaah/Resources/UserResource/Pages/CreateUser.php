<?php

namespace App\Filament\Jamaah\Resources\UserResource\Pages;

use App\Filament\Jamaah\Resources\UserResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateUser extends CreateRecord
{
    protected static string $resource = UserResource::class;
}
